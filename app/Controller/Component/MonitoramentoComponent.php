<?php

App::uses('Component', 'Controller');
App::import('Controller/Component/Monitoramento', 
	array('MensalidadesValorMaiorQue1000'));

const MENS_MAIOR_QUE_1000 = 1;
	
class MonitoramentoComponent extends Component {

/**
 * PegarConsultasDisponiveis method
 *
 * @return array
 */
	public function PegarConsultasDisponiveis() {
		$consultas = [];
		$consultas[MENS_MAIOR_QUE_1000] = 'Mensalidades valor maior que 1000';
		return $consultas;
	}
	
/**
 * RetornarConsulta method
 * input integer
 * @return array
 */
	public function RetornarConsulta($id) {
	    $id = $id['Monitoramento']['consulta'];
	    $consulta = '';
		switch ($id) {
			case MENS_MAIOR_QUE_1000: $consulta = new MensalidadesValorMaiorQue1000(); break;
			default: throw new NotFoundException(__('Consulta não configurada.')); break;
		}
		$sql = $consulta->PegarSql();
		
		$db = ConnectionManager::getDataSource('default');
        $sql = $db->fetchAll($sql);
        return $sql;
	}

}

?>
