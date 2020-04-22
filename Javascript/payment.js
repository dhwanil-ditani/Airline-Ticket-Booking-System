function BookTicket(passenger_id, flight_id, seat_no, payment_id) {

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