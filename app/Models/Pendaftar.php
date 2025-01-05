<?php namespace App\Models;

use CodeIgniter\Model;

class Pendaftar extends Model
{
    protected $table = 'total';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'registrant', 'date_created'
    ];
}