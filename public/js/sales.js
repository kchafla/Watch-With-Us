$("#otras").hide();

$("#otrassalas").click(function() {
    $("#missalas").attr("class", "nav-link border border-white bg-dark rounded text-secondary");
    $("#otrassalas").attr("class", "nav-link bg-dark rounded active text-light");

    $("#tuyas").slideUp();
    $("#otras").slideDown();
});

$("#missalas").click(function() {
    $("#missalas").attr("class", "nav-link active bg-dark text-light rounded");
    $("#otrassalas").attr("class", "nav-link border border-white bg-dark rounded text-secondary");

    $("#tuyas").slideDown();
    $("#otras").slideUp();
});