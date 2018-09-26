<?php
echo $this->Javascript->link('ui.core.js');
echo $this->Javascript->link('ui.resizable.js');
echo $this->Javascript->link('fullcalendar.min.js');
echo $this->Javascript->link('ui.draggable.js');

echo $this->Javascript->link('moment.min.js');
echo $this->Javascript->link('jquery.min.js');
echo $this->Javascript->link('jquery-ui.custom.min.js');
echo $this->Javascript->link('fullcalendar.min.js');

echo $this->html->css('fullcalendar');
?>
<script type='text/javascript'>// <![CDATA[

    $(document).ready(function() {
        $('#calendar').fullCalendar({
            events: "/calendarios/feed",
            //theme: true,
            header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
            },
            //defaultDate: '2014-06-12',
            editable: true,
            eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc) {
                if (dayDelta>=0) {
                    dayDelta = "+"+dayDelta;
                }
                /*if (minuteDelta>=0) {
                    minuteDelta="+"+minuteDelta;
                }*/
                $.post("/calendarios/move/"+event.id+"/"+dayDelta+"/"/*+minuteDelta+"/"*/);
            },
            dayClick: function(date, jsEvent, view) {
                var st = date.format();
                st = st.replace('T', '/');
                st = st.replace('-', '/');
                st = st.replace('-', '/');
                st = st.replace(':', '/');
                st = st.replace(':', '/');
                //alert('Clicked on: ' + st);
                $("#eventdata").show();
                //$("#eventdata").load("/Inova/visitas/add2/"+ date.format());
                $("#eventdata").load("/calendarios/add2/"+ st + "/",
                function(response, status, xhr){
                    $("#eventdata").html(response);
                });
                //alert('Clicked on: ' + date.format());
                //alert('Clicked on: ' +$.fullCalendar.formatDate( date, "dd/MM/yyyy/HH/mm"));
                //window.location="/Inova/visitas/add/"+date.format();
                $(this).css('background-color', 'silver');
                document.getElementById('detalhes').focus();
            }
        });
    });

// ]]></script>
<!-- hide the eventdata div when the page   loads -->
<script type="text/javascript">
$(document).ready(function(){
    $("#eventdata").hide();
});
</script>

<div class="panel panel-default">

	<div class="panel-heading">
		<h3>
			<span class="fa fa-calendar"></span> <?php echo __('Calendário'); ?>
			<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
		</h3>
	</div>

<div class="panel-body">
		<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
		        <li class="active">
		            <a href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-calendar"></span> Calend&aacute;rio</a>
		        </li>
		        <li>
		            <a href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-list"></span> Lista</a>
		        </li>
		</ul>
		<br>
		<div id="tab_" class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div id="calendar"></div>
                <br>
                <div id="eventdata"></div>
            </div>
            <div class="tab-pane" id="tab2">
			<?php echo $this->element('pesquisa/simples');?>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-condensed" >
				<thead>
					<tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('data'); ?></th>
							<th><?php echo $this->Paginator->sort('disciplina_id'); ?></th>
							<th><?php echo $this->Paginator->sort('curso_id'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($calendarios as $calendario): ?>
	<tr>
		<td><?php echo h($calendario['Calendario']['id']); ?>&nbsp;</td>
		<td><?php echo h($calendario['Calendario']['data']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($calendario['Disciplina']['nome'], array('controller' => 'disciplinas', 'action' => 'view', $calendario['Disciplina']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($calendario['Curso']['nome'], array('controller' => 'cursos', 'action' => 'view', $calendario['Curso']['id'])); ?>
		</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $calendario, 'model' => 'Calendario')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
		</div>
		<?php echo $this->element('Paginator'); ?>
		</div>
    </div>

