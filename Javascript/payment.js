function BookTicket(F_id, seat_no) {
    for (var i = 0; i < n_passengers; i++) {
        $.post("BookTickets.php",
        {
            passenger_id: passenger_ids[i],
            flight_id: F_id,
            seat_no: seat_no,
            payment_id: payment_id
        },
        function (data) {
            $("body").append(data);
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
        });
    });
});