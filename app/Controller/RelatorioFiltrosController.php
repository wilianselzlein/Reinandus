<?php
App::uses('AppController', 'Controller');
App::import('Model', 'RelatorioDataSet');

/**
 * RelatorioFiltros Controller
 *
 * @property RelatorioFiltro $RelatorioFiltro
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RelatorioFiltrosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RelatorioFiltro->recursive = 0;
		$this->set('relatoriofiltros', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RelatorioFiltro->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('RelatorioFiltro.' . $this->RelatorioFiltro->primaryKey => $id));
		$this->set('relatoriofiltro', $this->RelatorioFiltro->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RelatorioFiltro->create();
			if ($this->RelatorioFiltro->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
        $RelatorioDatasets = ClassRegistry::init('RelatorioDataset');
        $relatoriodatasets = $RelatorioDatasets->findAsCombo();
		
		$tipos = $this->RelatorioFiltro->Tipo->find('list', array('conditions' => array('Tipo.referencia' => 'tipo_filtro', 'Tipo.nome' => 'relatorios_filtros')));
		$this->set(compact('relatoriodatasets', 'tipos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->RelatorioFiltro->id = $id;
		if (!$this->RelatorioFiltro->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RelatorioFiltro->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('RelatorioFiltro.' . $this->RelatorioFiltro->primaryKey => $id));
			$this->request->data = $this->RelatorioFiltro->find('first', $options);
		}
                
        $RelatorioDatasets = new RelatorioDataset();
        $relatoriodatasets = $RelatorioDatasets->findAsCombo();
		$tipos = $this->RelatorioFiltro->Tipo->find('list', array('conditions' => array('Tipo.referencia' => 'tipo_filtro', 'Tipo.nome' => 'relatorios_filtros')));
		$this->set(compact('relatoriodatasets', 'tipos'));
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
		$this->RelatorioFiltro->id = $id;
		if (!$this->RelatorioFiltro->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->RelatorioFiltro->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
