<?php namespace App\Controllers;

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\Datatablesmodal;
use App\Models\Editpage;
use App\Models\Cserve;
use App\Models\Icon;
use App\Models\Helpcent;
class Serve extends Controller
{
	public function index()
	{
        if(! session()->get('logged_in')){
            return redirect()->to(base_url('/login')); 
        }
        $model = new Cserve();
        $currentPage = $this->request->getVar('page_customer_service') ? $this->request->getVar('page_customer_service') : 1;
        $check=$this->request->getVar('search');
        if(isset($check)){
            $fetch=$this->request->getVar('keyword');
             session()->set('keyword1',$fetch);
        }else{
            $fetch = session()->get('keyword1');
        }
        $model->getData($fetch);
        $data = [
            'customer_service'  => $model->getData()->getResult(),
            'customer_service'=> $model->paginate(10, 'customer_service'),
            'pager' => $model->pager,
            'encrypter' => \Config\Services::encrypter(),
            'validation' => \Config\Services::validation(),
            'currentPage' => $currentPage   
        ];
		echo view('/customer', $data);
	}
	
	public function sendEmail($token, $type, $password){
		$session = session();
		$developmentMode=true;
		$mailer = new PHPMailer($developmentMode);
		try {
		    $mailer->SMTPDebug = 2;
		    $mailer->isSMTP();
			if ($developmentMode){
				$mailer->SMTPOptions=[
					'ssl'=>[
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					]	
				];
			}
		$dear= $this->request->getPost('username');
		$to = $this->request->getPost('email');
		if ($type == 'verify'){
			$subject = "[NO REPLY] SIPS Account Verification Request";
			$message = '<p>Dear ' . $dear . '</p>A new SIPS account has been created and linked to this e-mail. Click the link below to verify your account.<p>This link will expire in 24 hours: <a href="' . base_url() . '/register/verification?email=' . $this->request->getPost('email') . '&token=' . urlencode($token) . '">Activate</a></p>Your password: ' . $password;
			$session->setFlashdata('msg', 'Congratulation! you have successfully created an account for '. $dear .'. Please contact '. $to .' to activate the account (check: inbox, junk, spam, or promotion mail), or you can activate it by yourself through accounts menu');
		}
		$mailer->Host = 'in-v3.mailjet.com';   
		$mailer->SMTPAuth = true;
		$mailer->Username = 'c5a420fa9c9c6ade6338001889a4e368';
		$mailer->Password   = '02006e2368ea10615afa119558561084';
		$mailer->SMTPSecure = 'tls';
		$mailer->Port       = 587;
		$mailer->setFrom('rezaangkasa@outlook.com', 'SIPS');
		$mailer->addAddress($to);
		$mailer->isHTML(true);
		$mailer->Subject = $subject;
		$mailer->Body = $message;
		$mailer->send();
		$mailer->ClearAllRecipients();
		return true;
	} catch (Exception $e) {
			$session->setFlashdata('msg', "Failed to send the email for verification. Error: ".$mailer->ErrorInfo);
			return true;
		}
	}

	
    public function save()
    {
		$rules = [
            'name' 			=> [
                'rules'=>'required|min_length[5]|max_length[50]|alpha_numeric_punct',
                'errors'=>[
                    'min_length'=>'At least 5 characters',
                    'max_length'=>'Maximum 40 characters',
                    'required'=>"Don't forget to fill this",
                    'alpha_numeric_punct'=>'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
                ],
                'email5' 		=> [
                    'rules'=>'required|min_length[7]|max_length[40]|valid_email',
                    'errors'=>[
                        'min_length'=>'At Least 7 characters',
                        'max_length'=>'Maximum 40 characters',
                        'required'=>"Don't forget to fill this",
                        'valid_email'=>'This is not a valid email'
                    ]
                ],
                'phone_number' => [
                    'rules'=>'required|numeric|min_length[10]|max_length[20]',
                    'errors'=>[
                        'min_length'=>'At least 10 characters',
                        'max_length'=>'Maximum 20 characters',
                        'required'=>"Don't forget to fill this",
                        'numeric'=>"This field must contain only numbers"
                    ]
                    ],
                    'message' 			=> [
                        'rules'=>'required|min_length[10]|max_length[1000]',
                        'errors'=>[
                            'min_length'=>'At least 10 characters',
                    'max_length'=>'Maximum 1000 characters',
                            'required'=>"Don't forget to fill this"
                        ]
                        ]
                ];
     if($this->validate($rules)){
        $session = session();
        $model = new Cserve();  
        $model2 = new UserModel(); 
        $encrypter = \Config\Services::encrypter();
        $check = $this->request->getPost('email5');
        $verif = $model2->where(array('email'=>$check))->first();
        if($verif){
        $status = $verif['status'];
        if($status=='USER'){
            $data = array(
                'name'        => base64_encode($encrypter->encrypt($this->request->getPost('name'))),
                'email'        => $this->request->getPost('email5'),
                'phone_number' => base64_encode($encrypter->encrypt($this->request->getPost('phone_number'))),
                'message' => base64_encode($encrypter->encrypt($this->request->getPost('message'))),
                'status' => 'USER',
                'reply' => '-',
                'date_created' => time()
                );
                $model->saveData2($data);
                $session->setFlashdata('msg', "Your message has been recorded, thank you for contacting us");
                return redirect()->to(base_url('/login'));
        }else if($status=='ADMIN'){
            $data = array(
                'name'        => base64_encode($encrypter->encrypt($this->request->getPost('name'))),
                'email'        => $this->request->getPost('email5'),
                'phone_number' => base64_encode($encrypter->encrypt($this->request->getPost('phone_number'))),
                'message' => base64_encode($encrypter->encrypt($this->request->getPost('message'))),
                'status' => 'ADMIN',
                'reply' => '-',
                'date_created' => time()
                );
                $model->saveData2($data);
                $session->setFlashdata('msg', "Your message has been recorded, thank you for contacting us");
                return redirect()->to(base_url('/login'));
        }
    }else{
        $data = array(
            'name'        => base64_encode($encrypter->encrypt($this->request->getPost('name'))),
            'email'        => $this->request->getPost('email5'),
            'phone_number' => base64_encode($encrypter->encrypt($this->request->getPost('phone_number'))),
            'message' => base64_encode($encrypter->encrypt($this->request->getPost('message'))),
            'status' => 'GUEST',
            'reply' => '-',
            'date_created' => time()
            );
            $model->saveData2($data);
            $session->setFlashdata('msg', "Your message has been recorded, thank you for contacting us");
            return redirect()->to(base_url('/login'));
    }
     }else{
        return redirect()->to(base_url('/login'))->withInput();
    }       
	}
    public function registration()
	{
		$rules = [
				'username' 		=> [
					'rules'=>'is_unique[users.username]|required|min_length[7]|max_length[50]|alpha_numeric_punct',
					'errors'=>[
                        'is_unique'=>'This username has already been taken',
						'min_length'=>'At least 7 characters',
						'max_length'=>'Maximum 50 characters',
						'required'=>"Don't forget to fill this",
                        'alpha_numeric_punct'=>'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
					]
					],
			'email' 		=> [
                'rules'=>'required|min_length[7]|max_length[40]|valid_email|is_unique[users.email]',
                'errors'=>[
                    'min_length'=>'At least 7 characters',
                    'max_length'=>'Maximum 40 characters',
                    'required'=>"Don't forget to fill this",
                    'valid_email'=>'This is not a valid email',
					'is_unique' => 'This email has already registered!'
                ]
				]
					];
					if($this->validate($rules)){
						$session = session();
						$model = new Datatablesmodal();
                        helper('text');
						$password = random_string('alpha',16);
						$data = array(
							'username' => filter_var($this->request->getVar('username'),FILTER_SANITIZE_STRING),
							'email' 	=> filter_var($this->request->getVar('email'),FILTER_VALIDATE_EMAIL),
							'password' => password_hash($password, PASSWORD_DEFAULT),
							'is_active' => 0,
                            'created'=>time(),
                            'status' => 'ADMIN',
                            'aktif' => 'deactivated'
						);
						$model->saveFile($data);
						$token= base64_encode(random_bytes(32));
						$users_token= array(
								'email'=>$this->request->getPost('email'),
								'token'=>$token,
								'date_created'=>time()
						);
						$model->saveToken($users_token);
					$this->sendEmail($token, 'verify', $password);
                    return redirect()->to(base_url('/serve'));
				}else{
                    return redirect()->to(base_url('/serve'))->withInput();
                }
	}
    public function delete()
    {
        $session = session();
        $model = new Cserve();
        $id = $this->request->getPost('id');
        $model->deleteData($id);
        $session->setFlashdata('msg', "Data has successfully been deleted");
        return redirect()->to(base_url('/serve'));
    }
    public function delete2()
    {
        $rules = [
            'currentpassword2' 			=> [
                'rules'=>'required',
                'errors'=>[
                    'required'=>'provide a password'
                ]
                ]
        ];
        if($this->validate($rules)){
        $session = session();
        $model = new UserModel();
        $user_id = $this->request->getVar('user_id');
        $currentpassword2 = filter_var($this->request->getVar('currentpassword2'), FILTER_SANITIZE_STRING);
        $users = $model->where('user_id',$user_id)->first();
        if($users){
            $pass = $users['password'];
            $verify_pass = password_verify($currentpassword2, $pass);
            if($verify_pass){
            $model2 = new Editpage();
            $proceed=$model2->deleteProfile($user_id);
            if ($proceed) {
                    $session->removeTempdata('logged_in');
                    $session->setFlashdata('msg', "Your account has been deleted successfully");
                    return redirect()->to(base_url('/login'));              
            }
        }else{
            $session->setFlashdata('msg', "Wrong password!");
            return redirect()->to(base_url('/serve'));
        }
    }
    }else{
        return redirect()->to(base_url('/serve'))->withInput();
    }
    }
}