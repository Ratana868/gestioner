<?php
Class Localidades extends MY_Model
{

  public function __construct() 
  {
        parent::__construct();
        $this->table="localidades";
  }

  public function get_provincia($sort = '', $order = 'ASC',$id_provincia)
  {

  	  $query = "SELECT * 
                  FROM $this->table
                 Where id_provincia= $id_provincia ";

        if (!empty($sort)) {
            $query .= " ORDER BY $sort $order";
        }

        $query = $this->db->query($query);

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