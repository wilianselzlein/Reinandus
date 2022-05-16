/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    $('.datetimepickerStart').datetimepicker({
    	format: 'dd/mm/yyyy hh:ii',
        todayBtn: true,
        pickerPosition: 'top-right',
        autoclose: true,
        empty:true,
        language: 'pt-BR'

	});
	$('.datetimepickerEnd').datetimepicker({
    	format: 'dd/mm/yyyy hh:ii',
        todayBtn: true,
        pickerPosition: 'top-right',
        autoclose: true,
        language: 'pt-BR'
	});
    
});

