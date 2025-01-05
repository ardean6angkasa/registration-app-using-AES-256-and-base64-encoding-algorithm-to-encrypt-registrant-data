<?php namespace App\Controllers;

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use CodeIgniter\Controller;
use App\Models\Datatablesmodal;
use App\Models\UserModel;
use App\Models\Token;
use App\Models\FormPay;
use App\Models\FormReg;
use App\Models\Icon;
use App\Models\Helpcent;
use App\Models\Pendaftar;
class Register extends Controller
{
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
	public function sendEmail2($token, $type){
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
		$data=session()->get('username');
		$to = $this->request->getPost('email');
		if($type == 'forgot'){
			$subject = "[NO REPLY] SIPS Reset Password Request";
			$message = '<p>Dear ' . $data . '</p>If you made this request, click the link below to reset your password.<p>This link will expire in 24 hours: <a href="' . base_url() . '/register/resetpassword?email=' . $this->request->getPost('email') . '&token=' . urlencode($token) . '">Reset Password</a></p>';
			$session->setFlashdata('msg', "Please check your email to reset your password! (check: inbox, junk, spam, or promotion mail)");
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
	public function verification()
	{
		if(session()->get('logged_in')){
			session()->setFlashdata('msg', "The action is forbidden, please sign out first!");
			return redirect()->to(base_url('/dashboard'));
		}else if(session()->get('logged_in2')){
			session()->setFlashdata('msg', "The action is forbidden, please sign out first!");
			return redirect()->to(base_url('/useracc'));
		}else if(session()->get('reset_password')){
			session()->setFlashdata('msg', "The action is forbidden, change your password first!");
            return redirect()->to(base_url('/register/changepassword'));
        }
		$model = new UserModel();
        $model2 = new Token();
        $session = session();
		$email = $this->request->getVar('email');
		$token = $this->request->getVar('token');
		$users = $model->where('email',$email)->first();
		if($users){
			$users_token = $model2->where('token',$token)->first();
			if($users_token){
				if(time() - $users_token['date_created'] < (60*60*24)){
					$newdata = array(
						'is_active' => 1,
						'aktif' => 'activated'
						);
					$data['users'] = $model->set($newdata)->where('email', $email)->update();
					$data2['users_token'] = $model2->where('email', $email)->delete();
					$session->setFlashdata('msg', $email . " has been activated! Please sign in, don't forget to change your password");
					return redirect()->to(base_url('/login'));
				}else{
					$data2['users_token'] = $model2->where('email', $email)->delete();
			$session->setFlashdata('msg', "Account activation failed! Token expired");
			return redirect()->to(base_url('/login'));
				}
			}else{
				$session->setFlashdata('msg', "Account activation failed! Wrong token");
				return redirect()->to(base_url('/login'));
			}
		}else{
			$session->setFlashdata('msg', "Account activation failed! Wrong email");
			return redirect()->to(base_url('/login'));
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
						return redirect()->to(base_url('/dashboard'));
				}else{
					return redirect()->to(base_url('/dashboard'))->withInput();
					}
		
	}
	
	public function forgotpassword()
	{
		$rules = [
		'email' 		=> [
                'rules'=>'required|valid_email',
                'errors'=>[
                    'required'=>"Don't forget to fill this",
                    'valid_email'=>'This is not a valid email'
                ]
            ]
		];
		if($this->validate($rules)){
			$model = new UserModel();
			$model2 = new Datatablesmodal();
			$session = session();
			$email = $this->request->getPost('email');
			$users = $model->where(array('email' => $email))->first();
		if($users){ 
			$is_active = $users['is_active'];
			if($is_active=='1'){
			$token= base64_encode(random_bytes(32));
			$users_token= array(
					'email'=>$this->request->getPost('email'),
					'token'=>$token,
					'date_created'=>time()
			);
			$ses_data = [
				'username' => $users['username']
			];
		$model2->saveToken($users_token);
		session()->set($ses_data); 
		$this->sendEmail2($token, 'forgot');
		return redirect()->to(base_url('/login'));
	}else if($is_active=='2'){
			$token= base64_encode(random_bytes(32));
			$users_token= array(
					'email'=>$this->request->getPost('email'),
					'token'=>$token,
					'date_created'=>time()
			);
			$ses_data = [
				'username' => $users['username']
			];
		$model2->saveToken($users_token);
		session()->set($ses_data); 
		$this->sendEmail2($token, 'forgot');
		return redirect()->to(base_url('/login'));
	}
}else{ 
		$session->setFlashdata('msg', "Email is not registered or activated");
		return redirect()->to(base_url('/login'));
		}
	}else{
		return redirect()->to(base_url('/login'))->withInput();
	}
	}
	public function resetpassword()
	{
		if(session()->get('logged_in')){
			session()->setFlashdata('msg', "The action is forbidden, please sign out first!");
			return redirect()->to(base_url('/dashboard'));
		}else if(session()->get('logged_in2')){
			session()->setFlashdata('msg', "The action is forbidden, please sign out first!");
			return redirect()->to(base_url('/useracc'));
		}else if(session()->get('reset_password')){
			session()->setFlashdata('msg', "The action is forbidden, change your password first!");
            return redirect()->to(base_url('/register/changepassword'));
        }
		$model = new UserModel();
		$model2 = new Token();
		$session = session();
		$email = $this->request->getVar('email');
		$token = $this->request->getVar('token');
		$users = $model->where('email',$email)->first();
		if($users){
			$users_token = $model2->where('token',$token)->first();
			if($users_token){
				if(time() - $users_token['date_created'] < (60*60*24)){
						$session->set('reset_password',$email);
						$data2['users_token'] = $model2->where('email', $email)->delete();
						return redirect()->to(base_url('/register/changepassword'));
			}else{
				$data2['users_token'] = $model2->where('email', $email)->delete();
				$session->setFlashdata('msg', "Reset password failed! Token expired");
				return redirect()->to(base_url('/login'));
				}
			}else{
				$session->setFlashdata('msg', "Reset password failed! Wrong token");
				return redirect()->to(base_url('/login'));
			}
		}else{
			$session->setFlashdata('msg', "Reset password failed! Wrong email");
			return redirect()->to(base_url('/login'));
		}
	}
	public function changepassword()
	{
		if(! session()->get('reset_password')){
			return redirect()->to(base_url('/login'));
		}
		$data = [	
            'validation' => \Config\Services::validation()
        ];
			echo view('/changed', $data);
	}
	public function checkpassword()
	{
		$rules = [
            'password' 			=> [
                'rules'=>'required|min_length[7]|max_length[200]',
                'errors'=>[
                    'required'=>'provide a password',
					'min_length'=>'At least 7 characters',
                    'max_length'=>'Maximum 200 characters'
                ]
                ],
				'confpassword' 			=> [
					'rules'=>'required|matches[password]',
					'errors'=>[
						'required'=>"Don't forget to fill this",
						'matches'=>"Password didn't match"
					]
					]
					];
			if($this->validate($rules)){
			$model = new UserModel();
			$session = session();
			$password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
			$email = $session->get('reset_password');
			$data['users'] = $model->set('password',$password)->where('email',$email)->update();
			$session->remove('reset_password');
			$session->setFlashdata('msg', "Password has been changed! Please sign in");
			return redirect()->to(base_url('/login'));
		}else{
			return redirect()->to(base_url('/register/changepassword'))->withInput();
		}
	}
}