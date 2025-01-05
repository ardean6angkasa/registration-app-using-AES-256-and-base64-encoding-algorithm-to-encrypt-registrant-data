<?php
namespace App\Models;

use CodeIgniter\Model;

class UserScore extends Model
{
    protected $table = 'users';

    public function getData($fetch = null)
    {
        if ($fetch) {
            return $this->table('users')->like('email', $fetch);
        }
        $this->table = 'users';
        $builder = $this->db->table('users');
        return $builder->get();
    }
    public function updateData($data, $id)
    {
        $query = $this->db->table('users')->update($data, array('user_id' => $id));
        return $query;
    }

}