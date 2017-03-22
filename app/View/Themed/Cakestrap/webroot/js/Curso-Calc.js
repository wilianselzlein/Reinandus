$(document).ready( function() {

    $('#CursoDesconto').change(function(){
        var subtotal = parseFloat($('#CursoValor').val().replace(".", "").replace(",", ".")) || 0.00;
        var desconto = parseFloat($('#CursoDesconto').val().replace(".", "").replace(",", ".")) || 0.00;
        var total = desconto / subtotal * 100;

        //$('#CursoLiquido').val(total.toFixed(2));
        $('#CursoPercentual').val(total.toFixed(2),2);
        var total = $('#CursoPercentual').val();
        $('#CursoPercentual').val(total.replace(".",","));
    });

    $('.percentage').change(function(){
        var subtotal = parseFloat($('#CursoValor').val().replace(".", "").replace(",", ".")) || 0.00;
        var percentual = parseFloat($('#CursoPercentual').val().replace(".", "").replace(",", ".")) || 0.00;
        var total = subtotal * percentual / 100;

        //$('#CursoLiquido').val(total.toFixed(2));
        $('#CursoDesconto').val(total.toFixed(2),2);
        var total = $('#CursoDesconto').val();
        $('#CursoDesconto').val(total.replace(".",","));
    });

    $('.calc').change(function(){
        var subtotal = parseFloat($('#CursoValor').val().replace(".", "").replace(",", ".")) || 0.00;
        var desconto = parseFloat($('#CursoDesconto').val().replace(".", "").replace(",", ".")) || 0.00;
        var total = subtotal - desconto;

        //$('#CursoLiquido').val(total.toFixed(2));
        $('#CursoLiquido').val(total.toFixed(2),2);
        var total = $('#CursoLiquido').val();
        $('#CursoLiquido').val(total.replace(".",","));
    });

});
