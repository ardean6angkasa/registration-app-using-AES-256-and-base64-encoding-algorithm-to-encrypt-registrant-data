<?php namespace App\Models;

use CodeIgniter\Model;

class Chat extends Model{
    protected $table = 'messaging';
    
    protected $allowedFields = [
        'token'
    ];
    public function getData2($fetch=null)
    {
        if ($fetch){
            return $this->table('messaging')->like('fetch',$fetch);
          }
        $this->table = 'messaging';
        $builder = $this->db->table('messaging');
        return $builder->get();
    }

    public function saveData($data4){
        $query = $this->db->table('messaging')->insert($data4);
        return $query;
    }
    public function updateData($data, $id)
    {
        $query = $this->db->table('messaging')->update($data, array('token' => $id));
        return $query;
    }

    public function updateData2($data, $id)
    {
        $query = $this->db->table('customer_service')->update($data, array('token' => $id));
        return $query;
    }

    public function deleteData($id)
    {
        $query = $this->db->table('messaging')->delete(array('id' => $id));
        return $query;
    }
    
    public function deleteData2($id)
    {
        $builder = $this->db->table('messaging');
        $builder->where('id',$id);
        $query = $builder->get();
        foreach ($query->getResult() as $row)
        {
            $file = "./certificate/$row->certificate";
            if (is_readable($file) && unlink($file)) {
                $query = $this->db->table('messaging')->delete(array('id' => $id));
                return $query;
            }
        } 
    }
}