<?php
App::uses('AppController', 'Controller');
/**
 * Calendarios Controller
 *
 * @property Calendario $Calendario
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CalendariosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'TransformarArray');

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Calendario))));
		$this->Filter->setPaginate('order', array('Calendario.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
      
		$this->Calendario->recursive = 0;
		$this->set('calendarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Calendario->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => false, 'conditions' => array('Calendario.' . $this->Calendario->primaryKey => $id));
		$this->set('calendario', $this->Calendario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($ano = null, $mes = null, $dia = null, $hora = null, $min = null, $seg = null) {
		if ($this->request->is('post')) {
			$this->Calendario->create();
			if ($this->Calendario->save($this->request->data)) {
			$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Calendario->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$disciplinas = $this->Calendario->Disciplina->findAsCombo();
		$cursos = $this->Calendario->Curso->findAsCombo();
		$this->set(compact('disciplinas', 'cursos'));
		
        $data = $dia . '/' . $mes . '/' . $ano;
        if (! $hora == null)
          $hora = $hora . ':' . $min;
        $this->set('data', $data);
        $this->set('hora', $hora);
        $this->set('ajax', $ano != null);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Calendario->id = $id;
		if (!$this->Calendario->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Calendario->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Calendario->id
               )
            ));
            
			$this->redirect(array('action' => 'index'));

			} else {
				if (isset($this->Calendario->validationErrors['JA_ALTERADO']))
					$this->Session->setFlash(__('JA_ALTERADO'), 'flash/error');
				else
					$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Calendario.' . $this->Calendario->primaryKey => $id));
			$this->request->data = $this->Calendario->find('first', $options);
		}
		$disciplinas = $this->Calendario->Disciplina->findAsCombo();
		$cursos = $this->Calendario->Curso->findAsCombo();
		$this->set(compact('disciplinas', 'cursos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Calendario->id = $id;
		if (!$this->Calendario->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Calendario->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

    /**
     * move method
     *
     * @return void
     */
    function move ($id=null,$dayDelta/*,$minDelta,$allDay*/) {
        if ($id != null) {            
            $ev = $this->Calendario->findById($id);
            /*if ($allDay==true) {
                $ev['Calendario']['allday'] = 1;
            } else {
                $ev['Calendario']['allday'] = 0;
            }
            $ev['Calendario']['end']=date('Y-m-d H:i:s',strtotime($dayDelta.' days '.$minDelta.' minutes',strtotime($ev['Event']['end'])));
            $ev['Calendario']['data']=date('Y-m-d H:i:s',strtotime($dayDelta.' days ',strtotime($ev['Visita']['data'])));*/

			$date = DateTime::createFromFormat('d/m/Y', $ev['Calendario']['data']);
			$date = $date->format('Y-m-d');
			$operador = substr(trim($dayDelta), 0, 1);
			if ($operador != '-')
				$operador = '+';
			
			$dayDelta = str_replace($operador, "", $dayDelta);
			$tempo = ($dayDelta / 1000 / 3600 / 24);
			$date = new DateTime($date);
			$date->modify($operador . $tempo . ' days');
			
			$ev['Calendario']['data'] = $date->format('Y-m-d');
			//$ev['Calendario']['data']= date('Y-m-d H:i:s',strtotime(($dayDelta / 1000 / 3600 * 60).' minutes ' , strtotime($ev['Calendario']['data'])));
            $this->Calendario->save($ev);
            //$this->redirect(array('controller' => 'Calendario', 'action' => “calendar”,substr($ev['Event']['start'],0,4),substr($ev['Event']['start'],5,2),substr($ev['Event']['start'],8,2)));
        }
    }

    /**
     * feed method
     *
     * @return void
     */
    function feed() {
        //1. Transform request parameters to MySQL datetime format.
        $conditions = '';
        if ((isset($this->params['url']['start'])) &&  (isset($this->params['url']['end']))) {
        	$mysqlstart = date('Y-m-d', strtotime($this->params['url']['start'])); //H:i:s
        	$mysqlend = date('Y-m-d', strtotime($this->params['url']['end'])); //H:i:s

        	//2. Get the events corresponding to the time range
        	$conditions = array('Calendario.data BETWEEN ? AND ?'  => array($mysqlstart, $mysqlend));
        }
        $events = $this->Calendario->find('all',array('conditions' =>$conditions, 
            'fields' => array('Calendario.id', 'Disciplina.nome', 'AddTime(Calendario.data, "0:0:0") as start', 'AddTime(Calendario.data, "1:0:0") as fim')));

        $this->set('events', $events);
    }

}
