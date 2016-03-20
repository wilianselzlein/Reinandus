<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarAvisosComponent extends ImportadorBaseComponent {

	var $Usuarios;

	public function PassaValores($parametro) {
		$dados = [];
		$dados['id'] = $parametro['AVICOD'];
		$dados['data'] = $parametro['AVIDATA'];
		$dados['user_id'] = $this->RetornarIdUsuario($this->FormatarValorEncode($parametro['AVIUSUARIO']));
		$dados['arquivo'] = $parametro['AVIARQUIVO'];
		$dados['tipo_id'] = $this->TratarTipo($this->FormatarValorEncode($parametro['AVITIPO']));
		$dados['mensagem'] = $this->FormatarValorEncode($parametro['MENSAGEM']);
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Aviso');
		$this->setSqlConsulta('Select Taviso.*, cast(Taviso.AviMensagem as varchar(10000)) as MENSAGEM from Taviso');
		$this->setCheckBox('Avisos');
		$this->CarregarArrayDeUsuarios();
	}

	private function TratarTipo($parametro) {
		switch ($parametro) {
			case 'A': return 21; break;
			case 'M': return 22; break;
			case 'N': return 23; break;
			case 'V': return 24; break;
			case 'I': return 25; break;
			default: return 21;
		}
	}

	private function CarregarArrayDeUsuarios() {
		$Usuario = ClassRegistry::init('User');
		$this->Usuarios = $Usuario->find('list', array('fields' => array('username', 'id'), 'order' => 'id'));
	}

	private function RetornarIdUsuario($parametro) {
		return $this->Usuarios[$parametro];
	}
}

?>
