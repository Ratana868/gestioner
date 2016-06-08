<?php
Class User extends MY_Model
{

  public function __construct() 
  {
           parent::__construct();
           $this->table="users";
  }


  function get_user($id_usuario)
  {
        $query = "SELECT users.* FROM $this->table
                  WHERE users.id = $id_usuario";
        
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

 function get_list($sort = '', $order = 'ASC')
 {


  $query = "SELECT users.* 
                  FROM $this->table
                  ";

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

 function update_user($id,$data)
 {
    $this->db->where('id', $id);
    return $this->db->update('users', $data);
 }


}
