<?php namespace App\Models;

use CodeIgniter\Model;

class Cserve extends Model{
    protected $table = 'customer_service';
    
    public function getData($fetch=null)
    {
        if ($fetch){
            return $this->table('customer_service')->like('email',$fetch)->orLike('status',$fetch);
          }
        $this->table = 'customer_service';
        $builder = $this->db->table('customer_service');
        return $builder->get();
    }

    public function getData2($fetch=null)
    {
        if ($fetch){
            return $this->table('customer_service')->like('fetch',$fetch);
          }
        $this->table = 'customer_service';
        $builder = $this->db->table('customer_service');
        return $builder->get();
    }

    public function saveData($data){
        $query = $this->db->table('messaging')->insert($data);
        return $query;
    }
    public function saveData2($data){
        $query = $this->db->table('customer_service')->insert($data);
        return $query;
    }
    public function updateData($data2, $check){
        $query = $this->db->table('users')->update($data2, array('email'=>$check));
        return $query;
    }
    
    public function deleteData($id)
    {
        $query = $this->db->table('customer_service')->delete(array('id' => $id));
        return $query;
    }
    public function updateData4($data3, $check)
    {
        $query = $this->db->table('customer_service')->update($data3, array('email' => $check));
        return $query;
    }
  
}