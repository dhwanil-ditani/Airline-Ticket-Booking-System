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
                $("option[value='" + selected_des + "']", $(this)).prop("disabled", true);
        });
        $("#des").each(function() {
                $("option[value='" + selected_src + "']", $(this)).prop("disabled", true);
        });
    });

    date1 = $("#depart_date").val();
    date2 = $("#return_date").val();
    document.getElementById("submit_button").disabled = true; 
    $(".dates").change(function() {
        date1 = $("#depart_date").val();
        date2 = $("#return_date").val();
        ret_disabled = $("#return_date").prop("disabled");
        if(Date.parse(date1) > Date.parse(date2) && !ret_disabled) {
            alert("Invalid dates. Please try again.");
            document.getElementById("submit_button").disabled = true; 
        } else {
            document.getElementById("submit_button").disabled = false; 
        }
    });

    $("#submit_button").click(function () {
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