<?php
class DateFormatBehavior extends ModelBehavior {
   //Our  format
   var $dateFormat = 'd/m/Y';
   //datebase Format
   var $databaseFormat = 'Y-m-d';

   public $settings;

   public function setup(Model $model, $settings = array()) {
     parent::setup($model, $settings);
     //$this->fields = $settings;
     $columns = $model->getColumnTypes();
     //debug($columns);
     foreach($columns as $column => $type){
        if(($type != 'date') && ($type != 'datetime')) unset($columns[$column]);
     }
     //debug($columns);
     //debug("------------------------------------ teste ".date('m/d/Y h:i:s a', time())." ".$model->name);
     //debug($this->fields);

     if (!isset($this->settings[$model->alias])) {
       $this->settings[$model->alias] = $columns;
     }
    $this->settings[$model->alias] = array_merge(  $this->settings[$model->alias], (array)$settings);
   }

   function _changeDateFormat($date = null,$dateFormat){
      $newDate = str_replace("/", "-", $date);
      $time = strtotime($newDate);
         if($time === false){
            return null;
      }else{
         return date($dateFormat, $time);
      }
   }

   //This function search an array to get a date or datetime field.
   function _changeDate($queryDataConditions , $dateFormat, $model){
      if (isset($queryDataConditions)) {
         foreach($queryDataConditions as $key => $value){
            if(is_array($value)){
               $queryDataConditions[$key] = $this->_changeDate($value,$dateFormat, $model);
            } else {
               $columns = $this->settings[$model->alias];
/*
               //sacamos las columnas que no queremos
               foreach($columns as $column => $type){
                  if(($type != 'date') && ($type != 'datetime')) unset($columns[$column]);
               }
*/
               //we look for date or datetime fields on database model
               foreach($columns as $column => $type){
                  if(strstr($key,$column)){
                     if($type == 'datetime') {
                        $queryDataConditions[$key] = $this->_changeDateFormat($value,$dateFormat.' H:i:s ');
                     }
                     if($type == 'date'){
                        //debug($queryDataConditions[$key]);
                        /*
                         * if($column=='data_nascimento'){
                           debug($value);
                           debug(date("d/m/Y", strtotime('27/10/1989')));
                        }*/
                        $queryDataConditions[$key] = $this->_changeDateFormat($value,$dateFormat);
                     }
                  }
               }

            }
         }
      }
      return $queryDataConditions;
   }

   function beforeFind(Model $model, $queryData){
      $queryData['conditions'] = $this->_changeDate($queryData['conditions'] , $this->databaseFormat, $model);
      return $queryData;
   }

   public function afterFind(Model $model, $results, $primary = false) {
      $results = $this->_changeDate($results, $this->dateFormat, $model);
      return $results;
   }

   public function beforeSave(Model $model, $options = array()) {
      $model->data = $this->_changeDate($model->data, $this->databaseFormat, $model);
      return true;
   }

}
