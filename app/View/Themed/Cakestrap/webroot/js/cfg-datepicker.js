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
});