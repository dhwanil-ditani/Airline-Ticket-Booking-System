function loadAddFlights() {
    $.get("add_flights.html", function(data) {
        $("#container").html(data);
    });
}

function loadRemoveFlights() {
    $.get("remove_flights.html", function(data) {
        $("#container").html(data);
    });
}

function loadChangePrices() {
    $.get("change_prices.html", function(data) {
        $("#container").html(data);
    });
}

$(document).ready(function() {
    $.get("logo.html", function(data) {
        $("div.logo").html(data);
    });

    $("#add_flights_button").click(function() {
        loadAddFlights();
    });

    $("#remove_flights_button").click(function() {
        loadRemoveFlights();
    });

    $("#change_prices_button").click(function() {
        loadChangePrices();
    });
});