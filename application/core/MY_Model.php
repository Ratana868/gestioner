<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    public $error = '';
    protected $table = '';
    private $error_message_empty_table = "No database table specified.";

    public function  __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create($data)
    {
        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            echo "Entra";
            return FALSE;
        }

        if (is_array($data) AND count($data)>0)
        {
            $result =  $this->db->insert($this->table, $data);
            

            if ($result)
            {
                
                
                return $this->db->insert_id();
            }
            $this->error = mysql_error();
        }

        $this->error = empty($this->error) ? 'No data passed' : $this->error;
        
        return FALSE;
    }

    public function get($fields = NULL, $sort = NULL, $order = 'ASC', $where = "", $limit = NULL, $offset = 0)
    {
        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }

        if ($fields != NULL)
        {
            $this->db->select($fields);
        }

        if (($where != ""))
        {
            $this->db->where($where);
        }

        if ($sort != NULL)
        {
            $this->db->order_by($sort, $order);
        }

        if ($limit != NULL)
        {
            $this->db->limit($limit, $offset);
        }

        $this->db->from($this->table);
        $query = $this->db->get();

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

    public function read($fields = NULL, $sort = NULL, $order = 'ASC', $limit = NULL, $offset = 0, $where = "")
    {
        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }

        if ($fields != NULL)
        {
            $this->db->select($fields);
        }

        if (($where != ""))
        {
            $this->db->where($where);
        }

        if ($sort != NULL)
        {
            $this->db->order_by($sort, $order);
        }

        if ($limit != NULL)
        {
            $this->db->limit($limit, $offset);
        }

        $this->db->from($this->table);
        $query = $this->db->get();

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

    public function read_by($field = NULL, $value = NULL, $fields = NULL, $sort = NULL, $order = 'ASC', $limit = NULL, $offset = 0)
    {
        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }

        if ($fields != NULL)
        {
            $this->db->select($fields);
        }

        if (($field != NULL) AND ($value != NULL))
        {
            $this->db->where('LOWER(`' .$field . '`)', strtolower($value));
        }

        if ($sort != NULL)
        {
            $this->db->order_by($sort, $order);
        }

        if ($limit != NULL)
        {
            $this->db->limit($limit, $offset);
        }

        $this->db->from($this->table);
        $query = $this->db->get();

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

    public function search($conditions = NULL, $value = NULL, $fields = NULL, $sort = NULL, $order = 'ASC', $limit = NULL, $offset = 0)
    {
        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }

        if ($fields != NULL)
        {
            $this->db->select($fields);
        }

        if (($conditions != NULL) AND ($value != NULL))
        {
            $i = count($conditions);
            
            $this->db->like("$conditions[0]", strtolower($value));

            for($j = 1; $j < $i; $j++)
            {
                $this->db->or_like("$conditions[$j]", $value);
            }
        }

        if ($sort != NULL)
        {
            $this->db->order_by($sort, $order);
        }

        if ($limit != NULL)
        {
            $this->db->limit($limit, $offset);
        }

        $this->db->from($this->table);
        $query = $this->db->get();

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

    public function search_count($conditions = NULL, $value = NULL, $fields = NULL, $sort = NULL, $order = 'ASC')
    {
        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }

        if ($fields != NULL)
        {
            $this->db->select($fields);
        }

        if (($conditions != NULL) AND ($value != NULL))
        {
            $i = count($conditions);

            $this->db->like("$conditions[0]", strtolower($value));

            for($j = 1; $j < $i; $j++)
            {
                $this->db->or_like("$conditions[$j]", $value);
            }
        }

        if ($sort != NULL)
        {
            $this->db->order_by($sort, $order);
        }
        
        $this->db->from($this->table);
        $query = $this->db->get();

        if (!empty($query) AND $query->num_rows() > 0)
        {
            return $query->num_rows();;
        }
        else
        {
            $this->error = mysql_error();
            return false;
        }

        $this->error = 'Invalid selection.';
        return false;
    }

    public function read_by_id($id = NULL, $fields = NULL)
    {
        if (($id == NULL) || !is_numeric($id) || empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }

        if ($fields!= NULL)
        {
            $this->db->select($fields);
        }

        $query = $this->db->get_where($this->table, array($this->table.'.ID' => $id));

        if ($query->num_rows() == 1)
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
    }

    public function read_this_ids($ids = NULL, $fields = NULL, $sort = NULL, $order = 'ASC', $limit = NULL, $offset = 0)
    {

        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }

        if ($fields != NULL)
        {
            $this->db->select($fields);
        }

        if (is_array($ids) AND count($ids)>0)
        {
            $this->db->where_in('ID', $ids);
        }

        if ($sort != NULL)
        {
            $this->db->order_by($sort, $order);
        }

        if ($limit != NULL)
        {
            $this->db->limit($limit, $offset);
        }

        $this->db->from($this->table);
        $query = $this->db->get();

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


        function update($field_id = NULL, $id = NULL, $data = NULL)
    {
        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }

        $this->db->where("$field_id", $id);
        $this->db->update($this->table, $data);

        if (($id != NULL) AND (is_numeric($id)) AND (is_array($data)) AND (count($data)>0) )
        {
            $result = $this->db->update($this->table, $data, "$field_id = $id");
            if ($result)
            {
                return TRUE;
            }
        }

        $this->error = 'Invalid ID.';
        return FALSE;
    }


    function delete($field_id = NULL, $id = NULL)
    {
        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }

        //TODO check when user free_result
        if ($id != NULL AND is_numeric($id))
        {
            $result = $this->db->delete($this->table, array("$field_id" => $id));
            if ($result)
            {
                return TRUE;
            }

            $this->error = "DB Error: " . mysql_error();
        }

        $this->error = empty($this->error) ? 'Invalid ID.' : $this->error;
        return FALSE;
    }

    public function count_all()
    {
        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }

        return $this->db->count_all($this->table);
    }

    public function count_results()
    {
        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }
        return $this->db->count_all_results($this->table);
    }

    public function is_unique($field = NULL , $value = NULL)
    {
        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }

        if (($field != NULL) AND ($value != NULL))
        {
            $this->db->where('LOWER(`' .$field . '`)', strtolower($value));
            $query = $this->db->get($this->table);
            $result = $query->num_rows();
            $query->free_result();

            if ( $result == 0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }

    function empty_table($sure = FALSE)
    {
        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }

        if ($sure)
        {
            return $this->db->empty_table($this->table) ;
        }
        else
        {
            return $sure;
        }
    }

    function truncate_table($sure = FALSE)
    {
        if (empty($this->table))
        {
            $this->error = $this->error_message_empty_table;
            return FALSE;
        }
        if ($sure)
        {
            return $this->db->truncate($this->table) ;
        }
        else
        {
            return $sure;
        }
    }
    /*
     * Actualiza un campo int
     * Suma o resta el valor actual de la DB en 1 unidad
     * $id = company_id
     * $column = columna a actualizar
     * $value : 0 negatiivo, 1 positivo
     */

    function update_discrete_column($id = NULL, $column = NULL, $value = 1)
    {
        $result = FALSE;
        $operation = "+";
        if($value===0)  $operation = "-";
        if ($id !=NULL AND is_numeric($id))
        {
            $this->db->set($column, "$column $operation 1", FALSE);
            $this->db->where('ID',$id);
            $result = $this->db->update($this->table);
        }

        return $result;
    }


}

/* End of file MY_Model.php */
/* Location: ./application/libraries/MY_Model.php */
