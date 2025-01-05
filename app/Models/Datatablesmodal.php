<?php
namespace App\Models;

use CodeIgniter\Model;

class Datatablesmodal extends Model
{
    protected $table = 'formulir_pendaftaran';

    public function getProduct($fetch = null)
    {
        if ($fetch) {
            return $this->table('formulir_pendaftaran')->like('email', $fetch);
        }
        $this->table = 'formulir_pendaftaran';
        $builder = $this->db->table('formulir_pendaftaran');
        return $builder->get();
    }

    public function saveProduct($data)
    {
        $query = $this->db->table('formulir_pendaftaran')->insert($data);
        return $query;
    }
    public function saveFile($data)
    {
        $query = $this->db->table('users')->insert($data);
        return $query;
    }

    public function saveData($data3)
    {
        $query = $this->db->table('total')->insert($data3);
        return $query;
    }

    public function saveData2($data4)
    {
        $query = $this->db->table('total')->insert($data4);
        return $query;
    }

    public function saveFile2($data2)
    {
        $query = $this->db->table('users')->insert($data2);
        return $query;
    }
    public function saveFile3($data3)
    {
        $query = $this->db->table('users')->insert($data3);
        return $query;
    }
    public function saveToken($users_token)
    {
        $query = $this->db->table('users_token')->insert($users_token);
        return $query;
    }
    public function saveToken2($users_token2)
    {
        $query = $this->db->table('users_token')->insert($users_token2);
        return $query;
    }
    public function saveToken3($users_token3)
    {
        $query = $this->db->table('users_token')->insert($users_token3);
        return $query;
    }
    public function updateProduct($data, $id)
    {
        $query = $this->db->table('formulir_pendaftaran')->update($data, array('product_id' => $id));
        return $query;
    }

    public function updateData($data2, $check)
    {
        $query = $this->db->table('users')->update($data2, array('email' => $check));
        return $query;
    }

    public function updateData2($data3, $check)
    {
        $query = $this->db->table('pendaftaran')->update($data3, array('email' => $check));
        return $query;
    }

    public function updateData3($data4, $check)
    {
        $query = $this->db->table('formulir_pendaftaran')->update($data4, array('email' => $check));
        return $query;
    }

    public function deleteProduct($id)
    {
        $builder = $this->db->table('formulir_pendaftaran');
        $builder->where('product_id', $id);
        $query = $builder->get();
        foreach ($query->getResult() as $row) {
            $file = "./pasfoto/$row->pas_foto";
            if (is_readable($file) && unlink($file)) {
                $file2 = "./receipt/$row->struk";
                if (is_readable($file2) && unlink($file2)) {
                    $query = $this->db->table('formulir_pendaftaran')->delete(array('product_id' => $id));
                    return $query;
                }
            }
        }
    }
}