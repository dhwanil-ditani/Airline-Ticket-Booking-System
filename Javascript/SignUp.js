$("#submit").click(function () {
    $.post("SignUp.php",
    {
        username: $("#username").val(),
        password: $("#password").val(),
        email_id: $("#email_id").val()
    },
    function(data) {
        $("div.result").html(data);
        username = $("#username").val();
        loadUser();
    });
});
$("#back").click(function () {
    loadSearch();
});