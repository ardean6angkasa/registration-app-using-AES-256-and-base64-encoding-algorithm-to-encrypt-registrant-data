<?php namespace App\Models;

use CodeIgniter\Model;

class Token extends Model{
    protected $table = 'users_token';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email','token','date_created'];    
}