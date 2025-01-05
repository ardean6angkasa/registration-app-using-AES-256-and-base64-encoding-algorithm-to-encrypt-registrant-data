<?php
namespace App\Models;

use CodeIgniter\Model;

class Datareceipt extends Model
{
    protected $table = 'pendaftaran';

    public function getProduct($fetch = null)
    {
        if ($fetch) {
            return $this->table('pendaftaran')->like('email', $fetch)->orLike('inform', $fetch);
        }
        $this->table = 'pendaftaran';
        $builder = $this->db->table('pendaftaran');
        return $builder->get();
    }

    public function saveProduct($data)
    {
        $query = $this->db->table('pendaftaran')->insert($data);
        return $query;
    }
    public function deleteProduct($id)
    {
        $builder = $this->db->table('pendaftaran');
        $builder->where('id', $id);
        $query = $builder->get();
        foreach ($query->getResult() as $row) {
            $file = "./receipt/$row->struk";
            if (is_readable($file) && unlink($file)) {
                $query = $this->db->table('pendaftaran')->delete(array('id' => $id));
                return $query;
            }
        }
    }
    public function updateProduct($data, $id)
    {
        $query = $this->db->table('pendaftaran')->update($data, array('id' => $id));
        return $query;
    }
    public function updateData($data2, $check)
    {
        $query = $this->db->table('users')->update($data2, array('email' => $check));
        return $query;
    }

    public function updateData2($data3, $check)
    {
        $query = $this->db->table('formulir_pendaftaran')->update($data3, array('email' => $check));
        return $query;
    }

    public function updateData3($data4, $check)
    {
        $query = $this->db->table('pendaftaran')->update($data4, array('email' => $check));
        return $query;
    }
}