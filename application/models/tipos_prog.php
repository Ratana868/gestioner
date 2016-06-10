<?php
Class Tipos_Prog extends MY_Model
{

  public function __construct() 
  {
        parent::__construct();
        $this->table="tipos_programa";
  }

  public function get_tipo($id_tipo)
  {
        $query = "SELECT tipos_programa.* FROM $this->table
                  WHERE tipos_programa.id = $id_tipo";
        
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

  function update_tipo_id($id,$data)
  {
      $this->db->where('id', $id);
      return $this->db->update('tipos_programa', $data);
  }

}