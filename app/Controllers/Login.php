<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\Icon;
use App\Models\Helpcent;
class Login extends Controller
{
    public function index()
    {
        if(session()->get('logged_in')){
			return redirect()->to(base_url('/dashboard'));
		}else if(session()->get('logged_in2')){
			return redirect()->to(base_url('/useracc'));
		}else if(session()->get('reset_password')){
            return redirect()->to(base_url('/register/changepassword'));
        }
        $model2 = new Helpcent();
        helper('text');
        $check=$this->request->getVar('search');
        if(isset($check)){
            $fetch=$this->request->getVar('keyword');
             session()->set('keyword2',$fetch);
        }else{
            $fetch = session()->get('keyword2');
        }
        $model2->getData($fetch);
        $data = [
            'help_info' => $model2->getData()->getResult(),
            'help_info'=> $model2->paginate(6, 'help_info'),
            'pager' => $model2->pager,
            'encrypter' => \Config\Services::encrypter(),
            'validation' => \Config\Services::validation()
        ];
        echo view('/dashboard', $data);
    } 

    public function auth()
    {
        $rules = [
			'email2' 		=> [
                'rules'=>'required|valid_email',
                'errors'=>[
                    'required'=>"Don't forget to fill this",
                    'valid_email'=>'This is not a valid email'
                ]
				],
				'password' 			=> [
					'rules'=>'required',
					'errors'=>[
						'required'=>'provide a password'
					]
					]
					];
					if($this->validate($rules)){
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email2');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $is_active = $data['is_active'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                if($is_active=='1'){
                         $ses_data = [
                    'user_id'       => $data['user_id'],
                    'username'     => $data['username'],
                    'photo'     => $data['photo'],
                    'email'    => $data['email'],
                    'status'    => $data['status'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data); 
                $session->setFlashdata('msg2', 'Signed in successfully');
                return redirect()->to(base_url('/dashboard'));
                }else if($is_active=='2'){
                    $ses_data = [
                        'user_id'       => $data['user_id'],
                        'username'     => $data['username'],
                        'tempat_tanggal_lahir'     => $data['tempat_tanggal_lahir'],
                        'nama'     => $data['nama'],
                        'status'    => $data['status'],
                        'photo'     => $data['photo'],
                        'email'    => $data['email'],
                        'phone'    => $data['phone'],
                        'badge'    => $data['badge'],
                        'logged_in2'     => TRUE
                    ];
                 
                    $session->set($ses_data);
                    $session->setFlashdata('msg2', 'Signed in successfully');
                    return redirect()->to(base_url('/useracc'));
                }else{
                    $session->setFlashdata('msg', 'Your account has not been activated!');
                    return redirect()->to(base_url('/login'));
                }
            }else{
                $session->setFlashdata('msg', 'Wrong password');
                return redirect()->to(base_url('/login'));
            }
        }else{
            $session->setFlashdata('msg', 'Email not found');
            return redirect()->to(base_url('/login'));
        }
    }else{
        return redirect()->to(base_url('/login'))->withInput();
    }
}

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
} 