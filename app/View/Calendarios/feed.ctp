<?php
$rows = array();
for ($a=0; count($events)> $a; $a++) {

    $all = true;
    $id = $events[$a]['Calendario']['id'];
    $color = $id == 20 ? 'red' : 'yellow';
    $color = 'gray';

    $rows[] = array('id' => $id,
        'title' => $events[$a]['Disciplina']['nome'],
        'start' => date('Y-m-d H:i', strtotime($events[$a][0]['start'])),
        'end' => date('Y-m-d H:i',strtotime($events[$a][0]['fim'])),
        'url' => 'calendarios/view/' . $id,
        'color' => $color,
        'textColor' => 'black',
        'allDay' => $all,
    );
}


Configure::write('debug', 0);
$this->autoRender = false;
$this->autoLayout = false;
$this->response->header('Content-Type: application/json');
echo json_encode($rows);

?>
