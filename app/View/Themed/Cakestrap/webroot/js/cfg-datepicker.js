$(document).ready(function(){
          var datepickerOptions = {
               format: "dd/mm/yyyy",
               todayBtn: "linked",
               language: "pt-BR",
               calendarWeeks: true,
               autoclose: true,
               todayHighlight: true
         };
         $('.datepicker-start').datepicker(datepickerOptions);
         $('.datepicker-end').datepicker(datepickerOptions);
   
   var handler = function() {
      $(this).datepicker(datepickerOptions);
   }
   $('#dynamic-content').on('focus', '.datepicker-start', handler);
   $('#dynamic-content').on('focus', '.datepicker-end', handler);
});
$('.datepicker-start').mask('00/00/0000', {reverse: true});
$('.datepicker-end').mask('00/00/0000', {reverse: true});
