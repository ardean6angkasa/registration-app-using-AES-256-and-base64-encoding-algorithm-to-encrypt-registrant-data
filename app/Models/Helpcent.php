<?php namespace App\Models;

use CodeIgniter\Model;

class Helpcent extends Model{
    protected $table = 'help_info';
    public function getData($fetch=null)
    {
        if ($fetch){
            return $this->table('help_info')->like('title',$fetch)->orLike('category',$fetch);
          }
        $this->table = 'help_info';
        $builder = $this->db->table('help_info');
        return $builder->get();
    }
    public function saveData($data){
        $query = $this->db->table('help_info')->insert($data);
        return $query;
    }
    public function updateData($data, $id)
    {
        $query = $this->db->table('help_info')->update($data, array('id' => $id));
        return $query;
    }
   
    public function updateData2($data, $id)
    {
        $builder = $this->db->table('help_info');
        $builder->where('id',$id);
        $query = $builder->get();
        foreach ($query->getResult() as $row)
    {
        if ($row->image != 'default.png'){
            $file = "./picture/$row->image";
            unlink($file);
        }
        $query = $this->db->table('help_info')->update($data, array('id' => $id));
        return $query;
    }
    }

    public function deleteData($id)
    {
        $builder = $this->db->table('help_info');
    $builder->where('id',$id);
    $query = $builder->get();
    foreach ($query->getResult() as $row)
    {
        if ($row->image != 'default.png'){
            $file = "./picture/$row->image";
            unlink($file);
        }
        $query = $this->db->table('help_info')->delete(array('id' => $id));
        return $query;
    } 
    }
}