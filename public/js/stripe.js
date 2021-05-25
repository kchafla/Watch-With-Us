$("#errors").hide();
$("#correcto").hide();

const stripe = Stripe('pk_test_51IuPyUAjWB0ChZlOo91RMzIjWymOuejV71HxZs9P1UgHJxZgK0u1rFIYorPiehB5JD5m7EwqWaha7kyhlv2hZUw700j28MLkJ3');

const elements = stripe.elements();
const cardElement = elements.create('card');

cardElement.mount('#card-element');

const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');

cardButton.addEventListener('click', async (e) => {
    e.preventDefault();

    if (cardHolderName.value === "" || $("#donation-quantity").val() === "") {
        $("#errors").show().children().text("Tienes que rellenar todos los campos!");
        setTimeout(function(){ $("#errors").fadeOut(); }, 3000);
    } else {
        if ($("#donation-quantity").val() < 1) {
            $("#donation-quantity").val(1);
            MostrarError("Ingresa una cantidad mayor a 1€!");
        } else if ($("#donation-quantity").val() > 20) {
            $("#donation-quantity").val(20);
            MostrarError("Ingresa una cantidad menor a 20€!");
        } else {
            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: { name: cardHolderName.value }
                }
            );
        
            if (error) {
                $("#errors").show().children().text(error.message);
                setTimeout(function(){ $("#errors").fadeOut(); }, 3000);
            } else {
                $.post("pagar", { _token: $("meta[name='csrf-token']").attr("content"), quantity: ($("#donation-quantity").val() * 100).toFixed(0), paymentMethodId: paymentMethod.id })
                .done(function() {
                    $("#correcto").show();
                    setTimeout(function(){ $("#correcto").fadeOut(); }, 3000);
                });
            }
        }
    }
});

function MostrarError(mensaje) {
    $("#errors").show().children().text(mensaje);
    setTimeout(function(){ $("#errors").fadeOut(); }, 3000);
}