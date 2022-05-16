<?php
App::uses('AppController', 'Controller');
App::import('Model', 'Relatorio');
/**
 * RelatorioDatasets Controller
 *
 * @property RelatorioDataset $RelatorioDataset
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RelatorioDatasetsController extends AppController {

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
		$this->RelatorioDataset->recursive = 0;
		$this->set('relatoriodatasets', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RelatorioDataset->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('RelatorioDataset.' . $this->RelatorioDataset->primaryKey => $id));
		$this->set('relatoriodataset', $this->RelatorioDataset->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RelatorioDataset->create();
			if ($this->RelatorioDataset->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
                $model = new Relatorio();
                $relatorios = $model->findAsCombo();
		$this->set(compact('relatorios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->RelatorioDataset->id = $id;
		if (!$this->RelatorioDataset->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RelatorioDataset->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('RelatorioDataset.' . $this->RelatorioDataset->primaryKey => $id));
			$this->request->data = $this->RelatorioDataset->find('first', $options);
		}
                $Relatorios = new Relatorio();
                $relatorios = $Relatorios->findAsCombo();
		$this->set(compact('relatorios'));
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
		$this->RelatorioDataset->id = $id;
		if (!$this->RelatorioDataset->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->RelatorioDataset->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
