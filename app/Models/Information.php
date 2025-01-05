<?php
namespace App\Models;

use CodeIgniter\Model;

class Information extends Model
{
    protected $table = 'help_info';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'information',
        'date_created',
        'category',
        'image',
        'link',
        'additional',
        'author',
        'price1',
        'price2',
        'bank',
        'university',
        'picture'
    ];
}