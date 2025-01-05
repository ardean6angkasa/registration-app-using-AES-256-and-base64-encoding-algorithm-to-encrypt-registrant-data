<?php namespace App\Models;

use CodeIgniter\Model;

class FormPay extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'email', 'instansi', 'pekerjaan', 'created', 'struk', 'inform', 'prodi', 'transaction', 'nominal', 'telepon', 'account', 'bank_name'
    ];
    public function getProduct($fetch=null)
    {
        if ($fetch){
            return $this->table('pendaftaran')->like('inform',$fetch)->orLike('email',$fetch);
          }
        $this->table = 'pendaftaran';
        $builder = $this->db->table('pendaftaran');
        return $builder->get();
    }
}