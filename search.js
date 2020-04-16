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
            if ($(this).prop("id") != thisID) {
                $("option[value='" + selected_des + "']", $(this)).prop("disabled", true);
            }
        });
        $("#des").each(function() {
            if ($(this).prop("id") != thisID) {
                $("option[value='" + selected_src + "']", $(this)).prop("disabled", true);
            }
        });

    });
    $("#submit_button").click(function () {
        console.log($("input[name='trip_type']:checked").val());
        console.log($("input[name='depart_date']").val());
        console.log($("input[name='return_date']").val());
        $.post("search.php",
        {
            depart_date: $("input[name='depart_date']").val(),
            src: $("select[name='src']").val(),
            des: $("select[name='des']").val()
        },
        function (data) {
            $("div.result").html(data);
        });
    });
});
