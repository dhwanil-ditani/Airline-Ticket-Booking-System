var username = "";
var password = "";
var amount = 0;
var passenger_ids = [];
var flight_go = 0;
var flight_ret = 0;

function loadSearch() {
    $.get("search.html", function(data) {
        $("div.body").html(data);
    });
}
function loadUser() {
    if (username.length === 0) {
        $("div.logout").hide();
        $("#display_username").hide();
        $("div.login").show();
        $("div.signup").show();
    }
    else {
        $("div.logout").show();
        $("#display_username").show();
        $("div.login").hide();
        $("div.signup").hide();
    }
    $("#display_username").text(username);
}
function loadlogin() {
    $.get("login.html", function(data) {
        $("div.body").html(data);
    });
}
function loadsignup() {
    $.get("SignUp.html", function(data) {
        $("div.body").html(data);
    });
}

$(document).ready(function () {
    $.get("logo.html", function(data) {
        $("div.logo").html(data);
    });
    loadSearch();
    loadUser();
    $("#login").click(function() {
        loadlogin();
        loadUser();
    });
    $("#signup").click(function() {
        loadsignup();
        loadUser();
    });

    $("#logout").click(function() {
        username = "";
        loadUser();
    });
});