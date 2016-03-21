<?php
/**
 * Document   : app/Controller/GraficosController.php
 * Created on : 2016-03-21 12:30 AM
 *
 * @author Wilian.Ivo
 */

App::uses('AppController', 'Controller');

class GraficosController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $components = array('Session');

    //Cache
    public function GerarDeCidades(&$nomes, &$valores) {
        $nomes = "'Curitiba', 'Registro', 'Mafra', 'Fraiburgo'";
        $valores = "973, 914, 1054, 732";
    }
   
}