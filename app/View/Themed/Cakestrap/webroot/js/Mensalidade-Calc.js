$(document).ready( function() {

    $('.calc').change(function(){
        var subtotal = parseFloat($('#MensalidadeValor').val().replace(".", "").replace(",", ".")) || 0.00;
        var acrescimo = 0.00;
        if( $('#MensalidadeAcrescimo').length)
            acrescimo = parseFloat($('#MensalidadeAcrescimo').val().replace(".", "").replace(",", ".")) || 0.00;

        var bolsa = 0.00;
        if( $('#MensalidadeBolsa').length)
            bolsa = parseFloat($('#MensalidadeBolsa').val().replace(".", "").replace(",", ".")) || 0.00;

        var desconto = parseFloat($('#MensalidadeDesconto').val().replace(".", "").replace(",", ".")) || 0.00;
        var total = subtotal + acrescimo - bolsa - desconto;

        //$('#MensalidadeLiquido').val(total.toFixed(2));
        $('#MensalidadeLiquido').val(total.toFixed(2),2);
        var total = $('#MensalidadeLiquido').val();
        $('#MensalidadeLiquido').val(total.replace(".",","));
    });

});