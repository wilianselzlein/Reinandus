<?php
//3. Create the json array
$rows = array();
for ($a=0; count($events)> $a; $a++) {

    //Is it an all day event?
    //$all = ($events[$a]['Visita']['allday'] == 1);
    $id = $events[$a]['Calendario']['id'];
    $color = $id == 20 ? 'red' : 'yellow';
    //Create an event entry

    $rows[] = array('id' => $id,
        'title' => $events[$a]['Disciplina']['nome'],
        'start' => date('Y-m-d H:i', strtotime($events[$a][0]['start'])),
        'end' => date('Y-m-d H:i',strtotime($events[$a][0]['fim'])),
        'url' => 'calendarios/view/' . $id,
        'color' => $color,
        'textColor' => 'black',
        //'allDay' => $all,
    );
}

//4. Return as a json array
Configure::write('debug', 0);
$this->autoRender = false;
$this->autoLayout = false;
$this->response->header('Content-Type: application/json');
echo json_encode($rows);

?>
