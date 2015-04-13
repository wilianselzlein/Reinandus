<?php

	if(!empty($dados)) {

		echo $this->form->input('dados',array(
			'label' => false,
			//'title' => '',
			'type' => 'select',
			'options' => $dados,
			'div' => false,
			'id' => 'select_dados',
			'name' => 'select_dados',
			'class' => 'form-control comp'
			)
		);
}
?>