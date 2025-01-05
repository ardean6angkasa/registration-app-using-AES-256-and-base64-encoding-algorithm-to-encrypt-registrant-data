<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Encryption extends BaseConfig
{
 
    public $key = 'define_your_own_secret_key';

  
    public $driver = 'OpenSSL';


    public $blockSize = 16;

    
    public $digest = 'SHA512';
}
