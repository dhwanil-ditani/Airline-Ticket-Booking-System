function InsertPassenger(index) {
    var c = "passenger" + index;
    var div = document.createElement("div");
    div.className = c;
    $("div.passengers").append(div);
    var first_name = document.createElement("input");
    first_name.type = "text";
    first_name.name = "first_name";
    first_name.className = c;
    var last_name = document.createElement("input");
    last_name.type = "text";
    last_name.name = "last_name";
    last_name.className = c;
    var Phone_No = document.createElement("input");
    Phone_No.type = "text";
    Phone_No.name = "Phone_No";
    Phone_No.className = c;
    $("div." + c).append("first_name: ", first_name, "last_name: ", last_name, "Phone_No: ", Phone_No);
}
$("document").ready(function() {
    $("#return_date").prop('disabled', true);
    $('input[type="radio"]').change(function() {
        if($(this).val() == "one_way"){
             $("#return_date").prop("disabled", true);
        }
        else {
            $("#return_date").prop("disabled", false);
        }
    });

    $(".src_des").change(function() {
        var selected_src = $("#src option:selected").val();
        var selected_des = $("#des option:selected").val();
        var thisID = $(this).prop("id");
        $(".src_des option").each(function() {
            $(this).prop("disabled", false);
        });
        $("#src").each(function() {
            // if ($(this).prop("id") != thisID) {
                $("option[value='" + selected_des + "']", $(this)).prop("disabled", true);
            // }
        });
        $("#des").each(function() {
            // if ($(this).prop("id") != thisID) {
                $("option[value='" + selected_src + "']", $(this)).prop("disabled", true);
            // }
        });
    });
    $("#submit_button").click(function () {
        // console.log($("input[name='trip_type']:checked").val());
        // console.log($("input[name='depart_date']").val());
        // console.log($("input[name='return_date']").val());
        $.post("search.php",
        {
            depart_date: $("input[name='depart_date']").val(),
            src: $("select[name='src']").val(),
            des: $("select[name='des']").val(),
            trip_type: $("input[name='trip_type']:checked").val(),
            return_date: $("input[name='return_date']").val()
        },
        function (data) {
            $("div.result").html("");
            $("div.passengers").html("");
            $("div.result").html(data);
            var trip_type = $("input[name='trip_type']:checked").val();
            $("input[name='flight_go']").click(function () {
                if (trip_type == "return") {
                    if($("input[name='flight_ret']:checked").length > 0) {
                        var n_passengers = $("select[name='passengers']").val();
                        for (var i=0; i<n_passengers; i++) {
                            InsertPassenger(String(i));
                        }
                    }
                }
                else {
                    var n_passengers = $("select[name='passengers']").val();
                    for (var i=0; i<n_passengers; i++) {
                        InsertPassenger(String(i));
                    }
                    // console.log($("input[name='flight_go']:checked").length);
                }
            });

            $("input[name='flight_ret']").click(function () {
                if($("input[name='flight_go']:checked").length > 0) {
                    var n_passengers = $("select[name='passengers']").val();
                    for (var i=0; i<n_passengers; i++) {
                        InsertPassenger(String(i));
                    }
                }
            });
            // var n_passengers = $("select[name='passengers']").val();
            // for (var i=0; i<n_passengers; i++) {
            //     InsertPassenger(String(i));
            // }
            // console.log($("input[name='flight_go']:checked").length);

        });
    });
});
