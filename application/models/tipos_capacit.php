<?php
Class Tipos_Capacit extends MY_Model
{

  public function __construct() 
  {
           parent::__construct();
           $this->table="tipo_capacitacion";
  }

}