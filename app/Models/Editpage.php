<?php namespace App\Models;

use CodeIgniter\Model;

class Editpage extends Model{
    
    public function updateProfile1($data, $user_id)
    {
        $query = $this->db->table('users')->update($data, array('user_id' => $user_id));
        return $query;
    }

    public function updateData($data2, $check)
    {
        $query = $this->db->table('pendaftaran')->update($data2, array('email' => $check));
        return $query;
    }

    public function updateData2($data3, $check)
    {
        $query = $this->db->table('formulir_pendaftaran')->update($data3, array('email' => $check));
        return $query;
    }
    public function updateData3($data2, $check)
    {
        $query = $this->db->table('help_info')->update($data2, array('email' => $check));
        return $query;
    }

    public function updateData5($data4, $check)
    {
        $query = $this->db->table('customer_service')->update($data4, array('email' => $check));
        return $query;
    }

    public function updateData7($data4, $check)
    {
        $query = $this->db->table('messaging')->update($data4, array('email' => $check));
        return $query;
    }

    public function updateData6($data2, $check)
    {
        $query = $this->db->table('users')->update($data2, array('email' => $check));
        return $query;
    }

    public function updatePassword($data, $user_id)
    {
        $query = $this->db->table('users')->update($data, array('user_id' => $user_id));
        return $query;
    }

    public function updateProfile2($data, $user_id)
    {  
        $builder = $this->db->table('users');
        $builder->where('user_id',$user_id);
        $query = $builder->get();
        foreach ($query->getResult() as $row)
    {
        if ($row->photo != 'default.svg'){
            $file = "./img/$row->photo";
            unlink($file);
        }
        $query = $this->db->table('users')->update($data, array('user_id' => $user_id));
        return $query;
    }
    }

    public function deleteProfile($user_id)
    {
    $builder = $this->db->table('users');
    $builder->where('user_id',$user_id);
    $query = $builder->get();
    foreach ($query->getResult() as $row)
    {
        if ($row->photo != 'default.svg'){
            $file = "./img/$row->photo";
            unlink($file);
        }
        $query = $this->db->table('users')->delete(array('user_id' => $user_id));
        return $query;
    } 
    }
    
}