/**
 * Created with PeterX ResourcesJS.
 * User: Pedro Escobar
 * Date: 2014-09-19
 * Time: 02:33 PM
 * To change this template use Tools | Templates.
 */
$(document).ready(function() {
   $("#alert-formulario").hide();
   const DYNAMIC_LIST = "#dynamic-list";
   const DYNAMIC_CONTENT = "#dynamic-content";
   const DYNAMIC_CONTENT_FORM = ".form-group";
   const DYNAMIC_CONTENT_SELECTED = "#da-middle";
   const BUTTON_ADD = "#btn-add";
   //------------------------------
   const ATTR_FIELD_LABEL = "field-label";
   const ATTR_FIELD_VALUE = "field-value";
   const ATTR_FIELD_POSITION = "field-position";
   const ATTR_FILTER_TYPE = "filter-type";
   const ATTR_FILTER_ID = "filter-id";
   //------------------------------
   VAR_SELECTED_FIELDS = [];
   /* FILTERS => Available */
   $(DYNAMIC_LIST).click(function() {
      selectedValue = $(this).val();
      toBeRendered = selectStringComponent(selectedValue);
      $(DYNAMIC_CONTENT).html(toBeRendered);

      var campo = JSON.parse(selectedValue);

      $.ajax({
         type: "POST",
         url: '/Reinandus/Relatorios/dados',
         data: "ajax=true&model="+campo.Modelo,
         success: function(msg){
            //console.log(msg);
            //alert(msg);
            $('#select_dados').html(msg);
         }
      });
   });
   /* FILTERS => Selected */
   $(BUTTON_ADD).click(function() {
      var alert = '<div id="alert-formulario" class="alert alert-danger fade in" role="alert">' + '<button type="button" class="close" data-dismiss="alert">' + '<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>' + '<strong>Este filtro já está adicionado.'
      '</div>';
      if($(DYNAMIC_CONTENT).children(DYNAMIC_CONTENT_FORM).length > 0) {
         if(!isSelectdField()) {
            var filtro = new Filter($(DYNAMIC_CONTENT));
            $(DYNAMIC_CONTENT).empty();
            $(DYNAMIC_CONTENT_SELECTED + " table tbody").html(draw(filtro, VAR_SELECTED_FIELDS));
         } else {
            var alert = '<div id="alert-formulario" class="alert alert-danger fade in" role="alert">' + '<button type="button" class="close" data-dismiss="alert">' + '<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>' + '<strong>Este filtro já está adicionado.'
            '</div>';
            $(DYNAMIC_CONTENT).html(alert);;
            window.setTimeout(function() {
               $("#alert-formulario").alert('close');
            }, 2000);
         }
      } else {
         var alert = '<div id="alert-formulario" class="alert alert-warning fade in" role="alert">' + '<button type="button" class="close" data-dismiss="alert">' + '<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>' + '<strong>Nenhum filtro selecionado'
         '</div>';
         $(DYNAMIC_CONTENT).html(alert);;
         window.setTimeout(function() {
            $("#alert-formulario").alert('close');
         }, 2000);
      }
   });
   /*
    * Verifica se o campo já está selcionado para a query
    */

   function isSelectdField() {
      var id = $(DYNAMIC_CONTENT).children(DYNAMIC_CONTENT_FORM).attr(ATTR_FILTER_ID);
      var alreadySelected = false;
      if(VAR_SELECTED_FIELDS.length > 0) {
         for(var i = 0; i < VAR_SELECTED_FIELDS.length; i++) {
            if(VAR_SELECTED_FIELDS[i] == id) {
               alreadySelected = true;
               break;
            }
         }
      }
      return alreadySelected;
   }
   /*
    * Classe Filter. Criada para montar uma estrutura para cada filtro
    */

   function Filter(_object) {
      this.id = _object.children(DYNAMIC_CONTENT_FORM).attr(ATTR_FILTER_ID);
      this.type = _object.children(DYNAMIC_CONTENT_FORM).attr(ATTR_FILTER_TYPE);
      this.fields = (function() {
         var objects = _object.children(DYNAMIC_CONTENT_FORM).children(selectorAttr(ATTR_FIELD_VALUE));
         var list = [];
         for(var i = 0; i < objects.length; i++) list.push(new Field(objects[i]));
         return list;
      }).call();

      function Field(_object) {
         this.position = _object.getAttribute(ATTR_FIELD_POSITION);
         this.label = _object.getAttribute(ATTR_FIELD_LABEL);
         this.value = _object.value;
      }
   }
   /*
    * Seleciona o componente [baseado] em um atributo
    */

   function selectorAttr(_text) {
      return '[' + _text + ']';
   }
   /*
    * Desenha o filtro selecionado, como uma linha na tabela de selecionados
    */

   function draw(_filter, _selectedFilters) {
      var tipoFiltro = parseInt(_filter.type);
      var selected_component = "";
      var selectedValues = [];
      var rows = $(DYNAMIC_CONTENT_SELECTED+" table tbody").html();
      for(var i = 0; i < _filter.fields.length; i++) {
         _comp = _filter.fields[i];
         switch(tipoFiltro) {
            case TipoFiltro.FAIXAS_NUMERACAO:
               {
                  if(_filter.fields[i].position == "0") {
                     selected_component += _filter.fields[i].label + " entre: " + _filter.fields[i].value;
                  } else {
                     selected_component += " e " + _filter.fields[i].value;
                     selected_component += "<br>";
                  }
                  break;
               }
            case TipoFiltro.FAIXAS_STRING:
               {
                  if(_filter.fields[i].position == "0") {
                     selected_component += _filter.fields[i].label + " contendo: " + _filter.fields[i].value;
                  } else {
                     selected_component += " e " + _filter.fields[i].value;
                     selected_component += "<br>";
                  }
                  break;
               }
            case TipoFiltro.OPCOES_FINITAS:
               {
                  selected_component += _filter.fields[i].label + " igual: " + _filter.fields[i].value;
                  selected_component += "<br>";
                  break;
               }
            case TipoFiltro.FAIXA_CODIGO_CAMPO_ADICIONAL:
               {
                  selected_component += _filter.fields[i].label + ": " + _filter.fields[i].value;
                  selected_component += "<br>";
                  break;
               };
            case TipoFiltro.CODIGO_CAMPO_ADICIONAL:
               {
                  selected_component += _filter.fields[i].label + ": " + _filter.fields[i].value;
                  selected_component += "<br>";
                  break;
               }
            case TipoFiltro.CAMPO_UNICO_INTEIRO:
               {
                  selected_component += _filter.fields[i].label + ": " + _filter.fields[i].value;
                  selected_component += "<br>";
                  break;
               }
            case TipoFiltro.DATA:
               {
                  selected_component += _filter.fields[i].label + ": " + _filter.fields[i].value;
                  selected_component += "<br>";
                  break;
               }
            case TipoFiltro.FAIXA_VALORES:
               {
                  selected_component += _filter.fields[i].label + " entre: " + _filter.fields[i].value;
                  selected_component += "<br>";
                  break;
               }
            case TipoFiltro.VALOR_QTD:
               {
                  selected_component += _filter.fields[i].label + ": " + _filter.fields[i].value;
                  selected_component += "<br>";
                  break;
               }
            case TipoFiltro.VALOR_PERCENTUAL:
               {
                  selected_component += _filter.fields[i].label + ": " + _filter.fields[i].value;
                  selected_component += "<br>";
                  break;
               }
            case TipoFiltro.FAIXA_DATAS:
               {
                  if(_filter.fields[i].position == "0") selected_component += "data dentro do período: de " + _filter.fields[i].value;
                  else {
                     selected_component += " até " + _filter.fields[i].value;
                     selected_component += "<br>";
                  }
                  break;
               }
            case TipoFiltro.BOOLEAN:
               {
                  selected_component += _filter.fields[i].label + ": <input type='checkbox' checked='" + _filter.fields[i].value + "'>";
                  selected_component += "<br>";
                  break;
               }
            case TipoFiltro.CAMPO_UNICO_STRING:
               {
                  selected_component += _filter.fields[i].label + ": " + _filter.fields[i].value;
                  selected_component += "<br>";
                  break;
               }
         }
         selectedValues.push( _filter.fields[i].value );
      }      
      rows += draw_row(selectedValues, selected_component, _filter.id);
      _selectedFilters.push(_filter.id);
      return rows;
   }

   function draw_row(_values, _text, _filterId) {
      var row = '<tr>' + '<td>' + _text + '<input id="' + _filterId + '" name="' + _filterId + '" type="hidden" value="' + _values + '">' + '</td>' + '<td><a href="#" class="fa fa-remove btn-del-row" ></a></td>' + '</tr>';
      //row+= '<input id="' + _filterId + '" name="' + _filterId + '" type="hidden" value="' + _values + '">';
      return row;
   }
   $(DYNAMIC_CONTENT_SELECTED).on('click', '.btn-del-row', function() {
      VAR_SELECTED_FIELDS.pop($(this).attr(ATTR_FILTER_ID));
      $(this).parent().parent().remove();
   });
})

function selectStringComponent(selectedField) {
   var campo = JSON.parse(selectedField);
   var component = new Draw(campo.Id, campo.Tipo, campo.Field, campo.Alias, campo.Modelo);
   //  component = "";
   switch(parseInt(campo.Tipo)) {
      case TipoFiltro.FAIXAS_NUMERACAO:
         return component.getFaixasNumeracao();
      case TipoFiltro.FAIXAS_STRING:
         return component.getFaixasString();
      case TipoFiltro.OPCOES_FINITAS:
         return component.getOpcoesFinitas();
      case TipoFiltro.FAIXA_CODIGO_CAMPO_ADICIONAL:
         return component.getFaixaCodigoCampoAdicional();
      case TipoFiltro.CODIGO_CAMPO_ADICIONAL:
         return component.getCodigoCampoAdicional();
      case TipoFiltro.CAMPO_UNICO_INTEIRO:
         return component.getCampoUnicoInteiro();
      case TipoFiltro.DATA:
         return component.getData();
      case TipoFiltro.FAIXA_VALORES:
         return component.getFaixaValores();
      case TipoFiltro.VALOR_QTD:
         return component.getValorQtd();
      case TipoFiltro.VALOR_PERCENTUAL:
         return component.getValorPercentual();
      case TipoFiltro.FAIXA_DATAS:
         return component.getFaixaDatas();
      case TipoFiltro.BOOLEAN:
         return component.getBoolean();
      case TipoFiltro.CAMPO_UNICO_STRING:
         return component.getCampoUnicoString();
   }
   //component += "<br>";
   //component += "<input type='submit'  value='Adicionar filtro' id='btn-add'>";
   component += "";
   return component;
}
var TipoFiltro = {
   //[Display(Name = "Faixas de numeração")]
   FAIXAS_NUMERACAO: 1,
   //[Display(Name = "Faixas de string")]
   FAIXAS_STRING: 2,
   //[Display(Name = "Opções finitas a serem selecionadas em lista de opções")]
   OPCOES_FINITAS: 3,
   //[Display(Name = "Faixa de Código ID + campo adicional")]
   FAIXA_CODIGO_CAMPO_ADICIONAL: 4,
   //[Display(Name = "Código ID do registro + campo adicional")]
   CODIGO_CAMPO_ADICIONAL: 5,
   //[Display(Name = "Campo único para inteiro")]
   CAMPO_UNICO_INTEIRO: 6,
   //[Display(Name = "Campo único para string")]
   CAMPO_UNICO_STRING: 7,
   //[Display(Name = "Faixas de datas")]
   FAIXA_DATAS: 8,
   //[Display(Name = "Data")]
   DATA: 9,
   //[Display(Name = "Boolean")]
   BOOLEAN: 10,
   //[Display(Name = "Faixa de valores moeda ou quantidade")]
   FAIXA_VALORES: 11,
   //[Display(Name = "Valor moeda ou quantidade")]
   VALOR_QTD: 12,
   //[Display(Name = "Valor percentual")]
   VALOR_PERCENTUAL: 13,
}