<?php namespace App\Models;

use CodeIgniter\Model;

class FormCust extends Model
{
    protected $table = 'customer_service';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'email', 'phone_number', 'message', 'date_created'
    ];
    public function getProduct($fetch=null)
    {
        if ($fetch){
            return $this->table('customer_service')->like('status',$fetch)->orLike('email',$fetch);
          }
        $this->table = 'customer_service';
        $builder = $this->db->table('customer_service');
        return $builder->get();
    }
}