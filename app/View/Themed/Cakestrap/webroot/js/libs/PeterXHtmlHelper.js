/**
 * Created with PeterX ResourcesJS.
 * User: Pedro Escobar
 * Date: 2014-09-19
 * Time: 05:54 PM
 * To change this template use Tools | Templates.
 */

function Draw(id, type, field, alias, modelo) {
   var component = '';
   this.id = id;
   this.type = type;
   this.field = field;
   this.alias = alias;
   this.modelo = modelo;
   render = function() {
      return component;
   }
   this.openDiv = function() {
      //component += "<div class='form-group' filter-type='" + this.type + "' filter-id='" + this.type + this.field + "'>";
      component += "<div class='form-group' filter-type='" + this.type + "' filter-id='" +this.type+","+ this.field + "'>";
      //component += "<div class='form-group' filter-type='" + this.type + "' filter-id='"+ this.field + "'>";
   }
   this.closeDiv = function() {
      component += "</div>";
   }
   this.label = function() {
      var labelAlias = arguments[0];
      if(typeof labelAlias == "undefined" || labelAlias == "") labelAlias = this.alias;
      component += "<label for='" + this.type + "_string'>" + labelAlias + "</label>";
   }
   this.labelex = function() {
      component += "<small><label for='" + this.type + "_string'>Separado por ','. Exemplo: 1,2,3,4 </label></small>";
   }
   this.space = function(){
      component += "<br>";
   }
   this.inputNumber = function() {
      component += "<input  id='" + this.type + "_number' type='number' class='form-control comp' field-label='" + this.alias + "' field-value>";
   }
   this.inputNumberStart = function() {
      component += "<input  id='" + this.type + "_start' type='number' class='form-control comp' field-label='" + this.alias + "' field-value field-position='0'>";
   }
   this.inputNumberEnd = function() {
      component += "<input  id='" + this.type + "_end' type='number' class='form-control comp' field-label='" + this.alias + "' field-value>";
   }
   this.inputText = function() {
      component += "<input  id='" + this.type + "_string' type='text' class='form-control comp' field-label='" + this.alias + "' field-value>";
   }
   this.inputSelect = function() {
      component += 
         "<input  id='" + this.type + "_number' type='hidden' class='form-control comp' field-label='" + this.alias + "' field-value>"
         +
         "<select multiple id='select_dados' size=15 class='form-control comp' field-label='" + this.alias + "'>" +
         //"<option value='-1'>Todos(as)</option>" +
         //"<option value='1'>" + this.modelo + "</option>" +
         "</select>";
   }
   this.inputTextStart = function() {
      component += "<input  id='" + this.type + "_start' type='text' class='form-control comp' field-label='" + this.alias + "' field-value field-position='0'>";
   }
   this.inputTextEnd = function() {
      component += "<input  id='" + this.type + "_end' type='text' class='form-control comp' field-label='" + this.alias + "' field-value>";
   }
   this.inputCheck = function() {
      component += "<input  id='" + this.type + "_check' type='checkbox' class='comp' field-label='" + this.alias + "' field-value>";
   }
   this.inputDate = function() {
      component += "<input  id='" + this.type + "_date' type='text' class='form-control comp datepicker-start' placeholder='Data' field-label='Data' field-value field-position='0'>";
   }
   this.inputDateStart = function() {
      component += "<input  id='" + this.type + "_start' type='text' class='form-control comp datepicker-start' placeholder='Data inicial' field-label='Data inicial' field-value field-position='0'>";
   }
   this.inputDateEnd = function() {
      component += "<input  id='" + this.type + "_end' type='text' class='form-control comp datepicker-end' placeholder='Data final' field-label='Data final' field-value>";
   }
   
   //FAIXAS_NUMERACAO: 1,
   this.getFaixasNumeracao = function() {
      this.openDiv();
      this.label('Entre');
      this.inputNumberStart();
      this.closeDiv();
      this.openDiv();
      this.label('e');
      this.inputNumberEnd();
      this.closeDiv();
      return component;
   }
   //FAIXAS_STRING: 2
   this.getFaixasString = function() {
      this.openDiv();
      this.label('Contendo');
      this.inputTextStart();
      this.closeDiv();
      this.openDiv();
      this.label('e');
      this.inputTextEnd();
      this.closeDiv();
      return component;
   }
   //OPCOES_FINITAS: 3
   this.getOpcoesFinitas = function() {
      this.openDiv();
      this.label();
      this.inputSelect();
      this.closeDiv();
      return component;
   }
   //FAIXA_CODIGO_CAMPO_ADICIONAL: 4
   this.getFaixaCodigoCampoAdicional = function() {
      this.openDiv();
      this.label('Entre');
      this.inputNumberStart();
      this.closeDiv();
      this.openDiv();
      this.label('e');
      this.inputNumberEnd();
      this.closeDiv();
      this.openDiv();
      this.label();
      this.inputNumber();
      this.closeDiv();
      return component;
   }
   //CODIGO_CAMPO_ADICIONAL: 5
   this.getCodigoCampoAdicional = function() {
      this.openDiv();
      this.label('Id');
      this.inputNumber();
      this.openDiv();
      this.label();
      this.inputNumber();
      this.closeDiv();
      return component;
   }
   //CAMPO_UNICO_STRING: 6
   this.getCampoUnicoInteiro = function() {
      this.openDiv();
      this.label();
      this.inputNumber();
      this.closeDiv();
      return component;
   }
   //CAMPO_UNICO_STRING: 7
   this.getCampoUnicoString = function() {
      this.openDiv();
      this.label();
      this.inputText();
      this.closeDiv();
      return component;
   }
   //FAIXA_DATAS: 8,
   this.getFaixaDatas = function() {
      this.openDiv();
      this.label('De');
      this.inputDateStart();
      this.closeDiv();
      this.openDiv();
      this.label('Até');
      this.inputDateEnd();
      this.closeDiv();
      return component;
   }
   //DATA: 9
   this.getData = function() {
      this.openDiv();
      this.label();
      this.inputDate();
      this.closeDiv();
      return component;
   }
   //BOOLEAN: 10
   this.getBoolean = function() {
      this.openDiv();
      this.label();
      this.space();
      this.inputCheck();      
      this.closeDiv();
      return component;
   }
   //FAIXA_VALORES: 11
   this.getFaixaValores = function() {
      this.openDiv();
      this.label('Entre');
      this.inputNumberStart();
      this.closeDiv();
      this.openDiv();
      this.label('e');
      this.inputNumberEnd();
      this.closeDiv();
      return component;
   }
   //VALOR_QTD: 12
   this.getValorQtd = function() {
      this.openDiv();
      this.label();
      this.inputNumber();
      this.closeDiv();
      return component;
   }
   //VALOR_PERCENTUAL: 13
   this.getConjuntoDeVal = function() {
      this.openDiv();
      this.label();
      this.space();
      this.labelex();
      this.inputText();
      this.closeDiv();
      return component;
   } 
}