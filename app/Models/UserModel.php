<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'email', 'password', 'created', 'tempat_tanggal_lahir', 'is_active', 'photo', 'status', 'aktif', 'name'];

}