<?php namespace App\Models;

use CodeIgniter\Model;

class Cryptograph extends Model{
    public function getData()
    {
        $builder = $this->db->table('cryptool');
        return $builder->get();
    }
    
    public function saveData($data){
        $query = $this->db->table('cryptool')->insert($data);
        return $query;
    }

    public function updateData($data, $id)
    {
        $query = $this->db->table('cryptool')->update($data, array('id' => $id));
        return $query;
    }

}