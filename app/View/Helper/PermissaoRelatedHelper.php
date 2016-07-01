<?php 
App::uses('AppHelper', 'View/Helper'); 

class PermissaoRelatedHelper extends AppHelper { 

	public $helpers = array('Html', 'Form'); 

	public function Verificar($programa) {
    	$permissoes = ClassRegistry::init('permissoes');
        $user_id = CakeSession::read('Auth.User');
        $user_id = $user_id['id'];
        
        $options = array('conditions' => array('Permissao.User_id' => $user_id, 'Permissao.Index' => false, 'Permissao.programa_id' => $programa));
        $permissoes = ClassRegistry::init('Permissao');
        $conta = $permissoes->find('count', $options);

        if ($conta > 0)
	        return true;
	    else {
            $options = array('conditions' => array('Permissao.User_id' => $user_id, 'Permissao.programa_id' => $programa));
            $conta = $permissoes->find('count', $options);
            return $conta == 0;
	    }
	    
	}
} 

?>