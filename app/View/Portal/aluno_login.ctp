<body>

<style>
@import url(http://fonts.googleapis.com/css?family=Lancelot);

body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading{
    font-family: 'Lancelot';
    font-size: 72px;
    text-align: center;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.non-rounded{
    border-radius: 0 !important;
}
</style>
<style>
   .modal-header{
      /*background-color: #0B6E01 !important;*/
   }
</style>
<div class="container" style="background-color:black">
             <div style="text-align:right">
             <img src="http://facet.br/pos/imagens/topo_cel.gif" width="26" height="30" /> 
             <a href="https://itunes.apple.com/br/app/p%C3%B3s-facet/id1349150952?mt=8" target="_blank">
             <img style="margin-left:25px" src="http://facet.br/pos/imagens/topo_app-store.jpg" width="90" height="30" /> 
             </a>
             <a href="https://play.google.com/store/apps/details?id=com.facet.app" target="_blank">
             <img style="margin-left:25px" src="http://facet.br/pos/imagens/topo_google-play.jpg" width="99" height="30" />             </a>
             <a href="mailto:secretaria@iepg.edu.br" target="_blank">
             <img style="margin-left:25px" src="http://facet.br/imagens/topo_email.jpg" width="23" height="30" />
             </a>
             <a href="http://web.whatsapp.com/send?l=pt&pho&phone=5541992562500" target="_blank">
             <img style="margin-left:25px" src="http://facet.br/pos/imagens/topo_whatsapp.jpg" width="23" height="30" />
             </a>
             <!-- <a href="https://www.linkedin.com/in/p%C3%B3s-gradua%C3%A7%C3%A3o-facet-16536194" target="_blank">
             <img style="margin-left:25px" src="http://facet.br/pos/imagens/topo_linkedin.jpg" width="23" height="30" />
             </a> -->
             <a href="https://www.facebook.com/faciencia77" target="_blank">
             <img style="margin-left:25px" src="http://facet.br/pos/imagens/topo_facebook.jpg" width="23" height="30" />
             </a>
             <!-- <a href="https://www.instagram.com/posgraduacaofacet/" target="_blank">
             <img style="margin-left:25px" src="http://facet.br/pos/imagens/topo_instagram.jpg" width="23" height="30" />
             </a> -->
	</div>
            
</div>
<div id="restrict-area-login">

      <?php echo $this->Form->create('Aluno', array('class'=>'form-signin', 'role' => 'form'));?>
      
        <?php echo $this->Session->flash(); ?>        
        <h4>        
        Aluno, informe sua matrícula e senha.
        </h4>

        <div class="input-group input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <?php echo $this->Form->input('id', array('class' => 'form-control non-rounded', 'type'=>'text','placeholder'=>"Usuário", "label"=>false,  'div' => array('class' => 'control-group')));?>            
        </div>

        <br>
        <div class="input-group input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <?php echo $this->Form->input('senha', array('class' => 'form-control non-rounded', 'type'=>'password','placeholder'=>"Senha", "label"=>false,  'div' => array('class' => 'control-group')));?>
        </div>
        <br>
<?php echo $this->Form->submit(__('Acessar'), array('class' => 'btn btn-lg btn-default btn-block non-rounded'));?>    
    <?php echo $this->Form->end(); ?>

   
</div>
<script>
   $(function(){
      //alert('pedro');
      // BootstrapDialog.show({
//            title: 'Área restrita para alunos.',
//            message: $('#restrict-area-login'),
//            cssClass: 'login-dialog',
//            closable: false,
//            buttons: [{
//                label: 'Entrar',
//                cssClass: 'btn-default',
//                action: function(dialog){        
//                   dialog.close();
//                }
//            }]
        });
   });
</script>
   </body>