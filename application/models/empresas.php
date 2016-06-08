<?php
Class Empresas extends MY_Model
{

  public function __construct() 
  {
           parent::__construct();
           $this->table="empresas";
  }

  public function get_empresas($sort = '', $order = 'ASC')
  {
        $query = "SELECT a . * , b.localidad AS localidad, c.provincia AS provincia
                  FROM $this->table a
				  INNER JOIN localidades b ON b.id = a.id_localidad
				  INNER JOIN provincias c ON c.id = a.id_provincia";

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

  public function get_emp($id_empresa)
  {
        $query = "SELECT empresas.* FROM $this->table
                  WHERE empresas.id = $id_empresa";
        
        $query = $this->db->query($query);

        if (!empty($query) AND $query->num_rows() > 0)
        {
            $result = $query->row();
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

  function update_empresa_id($id,$data)
  {
      $this->db->where('id', $id);
      return $this->db->update('empresas', $data);
  }

 }
