<?php
Class Program extends MY_Model
{

  public function __construct() 
  {
           parent::__construct();
           $this->table="programa";
  }

  public function get_prog_emp($id_empresa)
  {
  	    $consulta = "SELECT a.*, b.frecuencia, c.tipo  FROM $this->table a
  	    		  inner join frecuencia b on a.id_frecuencia=b.id
              inner join tipos_programa c on c.id=a.id_tipo
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

 }