<?php namespace App\Models;

use CodeIgniter\Model;

class FormReg extends Model
{
    protected $table = 'formulir_pendaftaran';
    protected $primaryKey = 'product_id';
    protected $allowedFields = [
        'nama', 'pas_foto', 'tanggal_lahir', 'nomor_telepon', 'email', 'program_studi','created', 'account', 'bank_name', 'transaction', 'nominal', 'struk'
    ];

    public function getProduct($fetch=null)
    {
        if ($fetch){
            return $this->table('formulir_pendaftaran')->like('email',$fetch);
          }
        $this->table = 'formulir_pendaftaran';
        $builder = $this->db->table('formulir_pendaftaran');
        return $builder->get();
    }
}