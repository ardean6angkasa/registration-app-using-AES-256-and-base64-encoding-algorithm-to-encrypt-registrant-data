<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Cryptograph;

class Cryptography extends Controller
{
  
    public function index()
    {
        $model = new Cryptograph();
       if(session()->get('type')=='decryption'){
            $data = [
                'cryptool' => $model->getData()->getResult(),
                'validation' => \Config\Services::validation()
            ];
            echo view('/cryptool', $data); 
        }else{
            $data = [
                'cryptool' => $model->getData()->getResult(),
                'validation' => \Config\Services::validation()
            ];
            echo view('/cryptool', $data);
        }
    }
    public function index2()
    {
        $rules = [
				'text' 		=> [
                    'rules'=>'required|min_length[6]',
                    'errors'=>[
                        'min_length'=>'At least 6 characters',
                        'required'=>"Don't forget to fill this"
                ]
            ]
            ];
     if($this->validate($rules)){
        $model = new Cryptograph();
        $encrypter = \Config\Services::encrypter();
        $id=$this->request->getPost('id');
        $check = session()->get('type');
        if(empty($check)){
        if(!empty($id)){
            $data = array(
                'text' 	=> base64_encode($encrypter->encrypt($this->request->getPost('text')))
            );
            $model->updateData($data,$id);
            $new_data = [
                'type' => 'decryption'
            ];
            session()->set($new_data);
            session()->setFlashdata('msg', "Text is encrypted successfully");
            return redirect()->to(base_url('/cryptography'));
        }
        $data = array(
            'text' 	=> base64_encode($encrypter->encrypt($this->request->getPost('text')))
        );
        $model->saveData($data);
        $new_data = [
			'type' => 'decryption'
		];
		session()->set($new_data);
        session()->setFlashdata('msg', "Text is encrypted successfully");
        return redirect()->to(base_url('/cryptography'));
    }else{
        $data = array(
            'text' 	=> $encrypter->decrypt(base64_decode($this->request->getPost('text')))
        );
        $model->updateData($data,$id);
        $new_data = [
			'type' => ''
		];
		session()->set($new_data);
        session()->setFlashdata('msg', "Text is decrypted successfully");
        return redirect()->to(base_url('/cryptography'));
    }
    }else{
    return redirect()->to(base_url('/cryptography'))->withInput();
    }
}

public function index3()
    {
        
        $key = \CodeIgniter\Encryption\Encryption::createKey();
            echo $key;
    }
}