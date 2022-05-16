<style type="text/css"> 
.submit{
    margin: 0 0 0 1%;
    display: inline;
}
</style>
<div class="form-group">
   <?php
echo $this->Search->create();
echo $this->Search->input('filter1', array('class'=>'form-control', 'autofocus' => 'autofocus', 'style'=>'width:90%;display: inline !important;'));
echo $this->Search->submit(__('Buscar'), array('class'=>'btn btn-large btn-primary', 'type'=>'submit', 
                                               'style'=>'display:normal ;'));

echo $this->Search->end();
echo "<br>";
   ?>
</div>
