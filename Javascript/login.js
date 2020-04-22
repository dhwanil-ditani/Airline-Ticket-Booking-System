$("#submit").click(function() {
    $.post("login.php",
    {
        username: $("#username").val(),
        password: $("#password").val()
    },
    function(data) {
        $("div.result").html(data);
        username = $("#username").val();
        password = $("#password").val();
        loadUser();
    });
});
$("#back").click(function () {
    loadSearch();
});