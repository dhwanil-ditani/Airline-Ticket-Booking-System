function BookTicket(F_id) {
    for (var i = 0; i < n_passengers; i++) {
        $.post("BookTickets.php",
        {
            passenger_id: passenger_ids[i],
            flight_id: F_id,
            payment_id: payment_id
        },
        function (data) {
            $("div.result").append(data);
        });
    }
}

$(document).ready(function () {
    $("input[name='amount']").attr('value', amount);
    $("input[name='user_id']").attr('value', user_id);
    $("#pay").click(function () {
        $.post("payment.php",
        {
            mode : $("#mode option:selected").val(),
            amount : $("input[name='amount']").val(),
            user_id : $("input[name='user_id']").val()
        },
        function (data) {
            $("div.result").html(data);
            // BookTicket(flight_go);
            // if (trip_type == "return") {
            //     BookTicket(flight_ret);
            // }
        });
    });
});