$(document).ready( function() {

    $('.calc').change(function(){
        var subtotal = parseFloat($('#ContratoValor').val().replace(".", "").replace(",", ".")) || 0.00;
        var bolsa = parseFloat($('#ContratoBolsa').val().replace(".", "").replace(",", ".")) || 0.00;
        var desconto = parseFloat($('#ContratoDesconto').val().replace(".", "").replace(",", ".")) || 0.00;
        var total = subtotal - bolsa - desconto;

        //$('#MensalidadeLiquido').val(total.toFixed(2));
        $('#ContratoLiquido').val(total.toFixed(2),2);
        var total = $('#ContratoLiquido').val();
        $('#ContratoLiquido').val(total.replace(".",","));
    });

});
