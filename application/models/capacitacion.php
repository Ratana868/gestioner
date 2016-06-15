<?php
Class Capacitacion extends MY_Model
{

  public function __construct() 
  {
           parent::__construct();
           $this->table="capacitaciones";
  }

  public function get_capacit_emp($id_empresa)
  {
  	    $consulta = "SELECT a.*, c.tipo  FROM $this->table a  		  
              		 inner join tipo_capacitacion c on c.id=a.id_tipo
                  	 WHERE a.id_empresa = $id_empresa";

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

  public function get_capacit($id_capacitacion)
  {
  	    $consulta = "SELECT a.*, c.tipo , d.nombre FROM $this->table a  		  
              		 inner join tipo_capacitacion c on c.id=a.id_tipo
              		 inner join empresas d on a.id_empresa=d.id
                  	 WHERE a.id = $id_capacitacion";

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