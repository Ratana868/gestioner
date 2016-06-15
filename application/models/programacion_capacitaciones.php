<?php
Class Programacion_Capacitaciones extends MY_Model
{

  public function __construct() 
  {
           parent::__construct();
           $this->table="programacion_capacitaciones";
  }

  public function get_programacion($id_capacitacion)
  {

  	    $consulta = "SELECT a.*,c.tipo FROM $this->table a  		  
              		 inner join capacitaciones b on b.id=a.id_capacitacion
              		 inner join estados c on a.id_estado=c.id
                  	 WHERE b.id = $id_capacitacion";

        $query = $this->db->query($consulta);

        if (!empty($query) AND $query->num_rows() > 0)
        {
            $result = $query->result();
            $query->free_result();

            return $result;
        }
        else
        {
            $this->error = mysql_error();
            return false;
        }

        $this->error = 'Invalid selection.';
        return false;
  }

}