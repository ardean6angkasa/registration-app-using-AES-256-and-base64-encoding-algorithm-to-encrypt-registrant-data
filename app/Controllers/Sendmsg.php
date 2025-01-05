<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\UserModel;
use App\Models\Cserve;
use App\Models\Editpage;
use App\Models\Chat;
use App\Models\FormCust;
class SendMsg extends Controller
{

    function index() {
		$rules = [
			'to' 			=> [
				'rules'=>'required|min_length[7]|max_length[40]|valid_email',
                'errors'=>[
                    'min_length'=>'At least 7 characters',
                    'max_length'=>'Maximum 40 characters',
                    'required'=>"Don't forget to fill this",
                    'valid_email'=>'This is not a valid email'
                ]
				],
			'message' 			=> [
				'rules'=>'required|min_length[10]',
				'errors'=>[
					'min_length'=>'At least 10 characters',
					'required'=>"Don't forget to fill this"
				]
				],
				'docum' => [
					'rules'=> 'mime_in[docum,image/jpg,image/jpeg,image/png]|max_size[docum,6024]|is_image[docum]',
					'errors'=>[
						'max_size' => 'Size is too big, max size 6 mb',
						'is_image'=> 'The file you were uploaded is not an image',
						'mime_in'=> 'Must jpg/jpeg/png'
					]
				]
				];
				if($this->validate($rules)){
					$session = session();
					$model = new UserModel();
					$model2 = new Cserve();
					$model3 = new Editpage();
					$model4 = new FormCust();
					$encrypter = \Config\Services::encrypter();
					$save3 = $session->get('username');
					$save4 = $session->get('photo');
					$check = $this->request->getPost('to');
					$save = session()->get('email');
					$message = $this->request->getPost('message');
					$subject 			= '[NO REPLY] Best Regards';
					if($check==$save){
						session()->setFlashdata('msg', "Send message failed, the email address was yours");
						return redirect()->to(base_url('/dashboard'))->withInput();
		}else{
			$fetch = $model->where('email', $check)->first();
			if($fetch){
				$is_active = $fetch['aktif'];
				if($is_active=='activated'){
				$role=$fetch['status'];
				if($role=='USER'){
				$file = $this->request->getFile('docum');
				if($file->getError()==4){
				$data = array(
					'identity2'        => base64_encode($encrypter->encrypt($save3)),
					'photo2'        => $save4,
					'chat2'        => base64_encode($encrypter->encrypt($message)),
					'fetch' => $check,
					'date2' => time()
					);
					$data2 = array(
						'badge' => '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle border-0">
					  </span>'
						);
						$data3 = array('reply' => 'replied');
					$model2->saveData($data);
					$model3->updateData6($data2, $check);
					$model2->updateData4($data3, $check);
					$session->setFlashdata('msg', 'Message sent');
					return redirect()->to(base_url('/dashboard'));
				}else{
					$filename=$file->getRandomName();
					$file->move(ROOTPATH.'/public/certificate',$filename);
					$data = array(
						'certificate' => $filename,
						'identity2'        => base64_encode($encrypter->encrypt($save3)),
						'photo2'        => $save4,
						'chat2'        => base64_encode($encrypter->encrypt($message)),
						'fetch' => $check,
						'date2' => time()
						);
						$data2 = array(
							'badge' => '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle border-0">
						  </span>'
							);
							$data3 = array('reply' => 'replied');
						$model2->saveData($data);
						$model3->updateData6($data2, $check);
						$model2->updateData4($data3, $check);
						$session->setFlashdata('msg', 'Message sent');
						return redirect()->to(base_url('/dashboard'));
				}
			}else{
				$developmentMode=true;
				$mail = new PHPMailer($developmentMode);
				try {
					$mail->SMTPDebug = 2;
					$mail->isSMTP();
					if ($developmentMode){
						$mail->SMTPOptions=[
							'ssl'=>[
								'verify_peer' => false,
								'verify_peer_name' => false,
								'allow_self_signed' => true
							]	
						];
					}
					$mail->Host = 'in-v3.mailjet.com';   
					$mail->SMTPAuth = true;
					$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
					$mail->Password   = '02006e2368ea10615afa119558561084';
					$mail->SMTPSecure = 'tls';
					$mail->Port       = 587;
					$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
					$mail->addAddress($check);
					$mail->isHTML(true);
					$mail->Subject = $subject;
					$mail->Body    = $message;
					$mail->send();
					$data3 = array(
						'reply' => 'replied'
						);
					$model2->updateData4($data3, $check);
					$mail->ClearAllRecipients();
					$session->setFlashdata('msg', 'Message sent');
					return redirect()->to(base_url('/dashboard'));
				}catch (Exception $e) {
					$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
					return redirect()->to(base_url('/dashboard'))->withInput();
				}
			}
				}else{
					$developmentMode=true;
					$mail = new PHPMailer($developmentMode);
					try {
						$mail->SMTPDebug = 2;
						$mail->isSMTP();
						if ($developmentMode){
							$mail->SMTPOptions=[
								'ssl'=>[
									'verify_peer' => false,
									'verify_peer_name' => false,
									'allow_self_signed' => true
								]	
							];
						}
						$mail->Host = 'in-v3.mailjet.com';   
						$mail->SMTPAuth = true;
						$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
						$mail->Password   = '02006e2368ea10615afa119558561084';
						$mail->SMTPSecure = 'tls';
						$mail->Port       = 587;
						$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
						$mail->addAddress($check);
						$mail->isHTML(true);
						$mail->Subject = $subject;
						$mail->Body    = $message;
						$mail->send();
						$data3 = array(
							'reply' => 'replied'
							);
						$model2->updateData4($data3, $check);
						$mail->ClearAllRecipients();
						$session->setFlashdata('msg', 'Message sent');
						return redirect()->to(base_url('/dashboard'));
					}catch (Exception $e) {
						$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
						return redirect()->to(base_url('/dashboard'))->withInput();
					}
				}
			}
			$fetch2 = $model4->where('email', $check)->first();
			if($fetch2){
				$developmentMode=true;
				$mail = new PHPMailer($developmentMode);
				try {
					$mail->SMTPDebug = 2;
					$mail->isSMTP();
					if ($developmentMode){
						$mail->SMTPOptions=[
							'ssl'=>[
								'verify_peer' => false,
								'verify_peer_name' => false,
								'allow_self_signed' => true
							]	
						];
					}
					$mail->Host = 'in-v3.mailjet.com';   
					$mail->SMTPAuth = true;
					$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
					$mail->Password   = '02006e2368ea10615afa119558561084';
					$mail->SMTPSecure = 'tls';
					$mail->Port       = 587;
					$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
					$mail->addAddress($check);
					$mail->isHTML(true);
					$mail->Subject = $subject;
					$mail->Body    = $message;
					$mail->send();
					$data3 = array(
						'reply' => 'replied'
						);
					$model2->updateData4($data3, $check);
					$mail->ClearAllRecipients();
					$session->setFlashdata('msg', 'Message sent');
					return redirect()->to(base_url('/dashboard'));
				}catch (Exception $e) {
					$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
					return redirect()->to(base_url('/dashboard'))->withInput();
				}
			}else{
				$session->setFlashdata('msg', "Send message failed");
				return redirect()->to(base_url('/dashboard'));
}
		}
	}else{
		return redirect()->to(base_url('/dashboard'))->withInput();
	}
    }
	function send1() { 
		$rules = [
			'to' 			=> [
				'rules'=>'required|min_length[7]|max_length[40]|valid_email',
                'errors'=>[
                    'min_length'=>'At least 7 characters',
                    'max_length'=>'Maximum 40 characters',
                    'required'=>"Don't forget to fill this",
                    'valid_email'=>'This is not a valid email'
                ]
				],
			'message' 			=> [
				'rules'=>'required|min_length[10]',
				'errors'=>[
					'min_length'=>'At least 10 characters',
					'required'=>"Don't forget to fill this"
				]
				],
				'docum' => [
					'rules'=> 'mime_in[docum,image/jpg,image/jpeg,image/png]|max_size[docum,6024]|is_image[docum]',
					'errors'=>[
						'max_size' => 'Size is too big, max size 6 mb',
						'is_image'=> 'The file you were uploaded is not an image',
						'mime_in'=> 'Must jpg/jpeg/png'
					]
				]
				
				];
				if($this->validate($rules)){
					$session = session();
					$model = new UserModel();
					$model2 = new Cserve();
					$model3 = new Editpage();
					$model4 = new FormCust();
					$encrypter = \Config\Services::encrypter();
					$save3 = $session->get('username');
					$save4 = $session->get('photo');
					$check = $this->request->getPost('to');
					$subject = '[NO REPLY] Best Regards';
					$message = $this->request->getPost('message');
					$save = session()->get('email');
					if($check==$save){
						session()->setFlashdata('msg', "Send message, the email address was yours");
						return redirect()->to(base_url('/modalboot'))->withInput();
					}else{
						$fetch = $model->where('email', $check)->first();
						if($fetch){
							$is_active = $fetch['aktif'];
				if($is_active=='activated'){
					$role=$fetch['status'];
					if($role=='USER'){
					$file = $this->request->getFile('docum');
					if($file->getError()==4){
					$data = array(
						'identity2'        => base64_encode($encrypter->encrypt($save3)),
						'photo2'        => $save4,
						'chat2'        => base64_encode($encrypter->encrypt($message)),
						'fetch' => $check,
						'date2' => time()
						);
						$data2 = array(
							'badge' => '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle border-0">
						  </span>'
							);
							$data3 = array(
								'reply' => 'replied'
								);
						$model2->saveData($data);
						$model3->updateData6($data2, $check);
						$model2->updateData4($data3, $check);
						$session->setFlashdata('msg', 'Message sent');
								return redirect()->to(base_url('/modalboot'));
							}else{
								$filename=$file->getRandomName();
								$file->move(ROOTPATH.'/public/certificate', $filename);
								$data = array(
									'certificate' => $filename,
									'identity2'        => base64_encode($encrypter->encrypt($save3)),
									'photo2'        => $save4,
									'chat2'        => base64_encode($encrypter->encrypt($message)),
									'fetch' => $check,
									'date2' => time()
									);
									$data2 = array(
										'badge' => '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle border-0">
									  </span>'
										);
									$data3 = array(
											'reply' => 'replied'
											);
									$model2->saveData($data);
									$model3->updateData6($data2, $check);
									$model2->updateData4($data3, $check);
									$session->setFlashdata('msg', 'Message sent');
									return redirect()->to(base_url('/modalboot'));
									}
								}else{
									$developmentMode=true;
		$mail = new PHPMailer($developmentMode);

		try {
		    $mail->SMTPDebug = 2;
		    $mail->isSMTP();
			if ($developmentMode){
				$mail->SMTPOptions=[
					'ssl'=>[
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					]	
				];
			}
		    $mail->Host = 'in-v3.mailjet.com';   
		    $mail->SMTPAuth = true;
		    $mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
		    $mail->Password   = '02006e2368ea10615afa119558561084';
		    $mail->SMTPSecure = 'tls';
		    $mail->Port       = 587;
		    $mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
		    $mail->addAddress($check);
		    $mail->isHTML(true);
		    $mail->Subject = $subject;
		    $mail->Body    = $message;
		    $mail->send();
			$data3 = array(
				'reply' => 'replied'
				);
			$model2->updateData4($data3, $check);
			$mail->ClearAllRecipients();
		    $session->setFlashdata('msg', 'Message sent');
			return redirect()->to(base_url('/modalboot'));
		} catch (Exception $e) {
			$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
			return redirect()->to(base_url('/modalboot'))->withInput();
		}
								}
								}else{
		$developmentMode=true;
		$mail = new PHPMailer($developmentMode);

		try {
		    $mail->SMTPDebug = 2;
		    $mail->isSMTP();
			if ($developmentMode){
				$mail->SMTPOptions=[
					'ssl'=>[
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					]	
				];
			}
		    $mail->Host = 'in-v3.mailjet.com';   
		    $mail->SMTPAuth = true;
		    $mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
		    $mail->Password   = '02006e2368ea10615afa119558561084';
		    $mail->SMTPSecure = 'tls';
		    $mail->Port       = 587;
		    $mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
		    $mail->addAddress($check);
		    $mail->isHTML(true);
		    $mail->Subject = $subject;
		    $mail->Body    = $message;
		    $mail->send();
			$data3 = array(
				'reply' => 'replied'
				);
			$model2->updateData4($data3, $check);
			$mail->ClearAllRecipients();
		    $session->setFlashdata('msg', 'Message sent');
			return redirect()->to(base_url('/modalboot'));
		} catch (Exception $e) {
			$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
			return redirect()->to(base_url('/modalboot'))->withInput();
		}
							}
						}
						$fetch2 = $model4->where('email', $check)->first();
						if($fetch2){
							$developmentMode=true;
							$mail = new PHPMailer($developmentMode);
							try {
								$mail->SMTPDebug = 2;
								$mail->isSMTP();
								if ($developmentMode){
									$mail->SMTPOptions=[
										'ssl'=>[
											'verify_peer' => false,
											'verify_peer_name' => false,
											'allow_self_signed' => true
										]	
									];
								}
								$mail->Host = 'in-v3.mailjet.com';   
								$mail->SMTPAuth = true;
								$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
								$mail->Password   = '02006e2368ea10615afa119558561084';
								$mail->SMTPSecure = 'tls';
								$mail->Port       = 587;
								$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
								$mail->addAddress($check);
								$mail->isHTML(true);
								$mail->Subject = $subject;
								$mail->Body    = $message;
								$mail->send();
								$data3 = array(
									'reply' => 'replied'
									);
								$model2->updateData4($data3, $check);
								$mail->ClearAllRecipients();
								$session->setFlashdata('msg', 'Message sent');
								return redirect()->to(base_url('/modalboot'));
							}catch (Exception $e) {
								$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
								return redirect()->to(base_url('/modalboot'))->withInput();
							}
						}else{
						$session->setFlashdata('msg', "Send message failed");
						return redirect()->to(base_url('/modalboot'));
}
					}
    }else{
		return redirect()->to(base_url('/modalboot'))->withInput();
	}      
}  
function send2() { 
	$rules = [
		'to' 			=> [
			'rules'=>'required|min_length[7]|max_length[40]|valid_email',
			'errors'=>[
				'min_length'=>'At least 7 characters',
				'max_length'=>'Maximum 40 characters',
				'required'=>"Don't forget to fill this",
				'valid_email'=>'This is not a valid rmail'
			]
			],
		'message' 			=> [
			'rules'=>'required|min_length[10]',
			'errors'=>[
				'min_length'=>'At least 10 characters',
				'required'=>"Don't forget to fill this"
			]
			],
			'docum' => [
				'rules'=> 'mime_in[docum,image/jpg,image/jpeg,image/png]|max_size[docum,6024]|is_image[docum]',
				'errors'=>[
					'max_size' => 'Size is too big, max size 6 mb',
					'is_image'=> 'The file you were uploaded is not an image',
					'mime_in'=> 'Must jpg/jpeg/png'
				]
			]
			
			];
			if($this->validate($rules)){
				$session = session();
				$model = new UserModel();
				$model2 = new Cserve();
				$model3 = new Editpage();
				$model4 = new FormCust();
				$encrypter = \Config\Services::encrypter();
				$save3 = $session->get('username');
				$save4 = $session->get('photo');
				$subject = '[NO REPLY] Best Regards';
				$message = $this->request->getPost('message');
				$check = $this->request->getPost('to');
				$save = session()->get('email');
				if($check==$save){
					$session->setFlashdata('msg', "Send message failed, the email address was yours");
					return redirect()->to(base_url('/latihan'))->withInput();
				}else{	
			$fetch = $model->where('email', $check)->first();
			if($fetch){
				$is_active = $fetch['aktif'];
				if($is_active=='activated'){
					$role=$fetch['status'];
					if($role=='USER'){
					$file = $this->request->getFile('docum');
					if($file->getError()==4){
					$data = array(
						'identity2'        => base64_encode($encrypter->encrypt($save3)),
						'photo2'        => $save4,
						'chat2'        => base64_encode($encrypter->encrypt($message)),
						'fetch' => $check,
						'date2' => time()
						);
						$data2 = array(
							'badge' => '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle border-0">
						  </span>'
							);
							$data3 = array(
								'reply' => 'replied'
								);
						$model2->saveData($data);
						$model3->updateData6($data2, $check);
						$model2->updateData4($data3, $check);
						$session->setFlashdata('msg', 'Message sent');
						return redirect()->to(base_url('/latihan'));
					}else{
						$filename=$file->getRandomName();
						$file->move(ROOTPATH.'/public/certificate',$filename);
								$data = array(
									'certificate' => $filename,
									'identity2'        => base64_encode($encrypter->encrypt($save3)),
									'photo2'        => $save4,
									'chat2'        => base64_encode($encrypter->encrypt($message)),
									'fetch' => $check,
									'date2' => time()
									);
									$data2 = array(
										'badge' => '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle border-0">
									  </span>'
										);
										$data3 = array(
											'reply' => 'replied'
											);
									$model2->saveData($data);
									$model3->updateData6($data2, $check);
									$model2->updateData4($data3, $check);
									$session->setFlashdata('msg', 'Message sent');
						return redirect()->to(base_url('/latihan'));
					}
				}else{
					$developmentMode=true;
					$mail = new PHPMailer($developmentMode);
				
					try {
						$mail->SMTPDebug = 2;
						$mail->isSMTP();
						if ($developmentMode){
							$mail->SMTPOptions=[
								'ssl'=>[
									'verify_peer' => false,
									'verify_peer_name' => false,
									'allow_self_signed' => true
								]	
							];
						}
						$mail->Host = 'in-v3.mailjet.com';   
						$mail->SMTPAuth = true;
						$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
						$mail->Password   = '02006e2368ea10615afa119558561084';
						$mail->SMTPSecure = 'tls';
						$mail->Port       = 587;
						$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
						$mail->addAddress($check);
						$mail->isHTML(true);
						$mail->Subject = $subject;
						$mail->Body    = $message;
						$mail->send();
						$data3 = array(
							'reply' => 'replied'
							);
						$model2->updateData4($data3, $check);
						$mail->ClearAllRecipients();
						$session->setFlashdata('msg', 'Message sent');
						return redirect()->to(base_url('/latihan'));
					} catch (Exception $e) {
						$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
						return redirect()->to(base_url('/latihan'))->withInput();
					}
				}
				}else{
					$developmentMode=true;
					$mail = new PHPMailer($developmentMode);
				
					try {
						$mail->SMTPDebug = 2;
						$mail->isSMTP();
						if ($developmentMode){
							$mail->SMTPOptions=[
								'ssl'=>[
									'verify_peer' => false,
									'verify_peer_name' => false,
									'allow_self_signed' => true
								]	
							];
						}
						$mail->Host = 'in-v3.mailjet.com';   
						$mail->SMTPAuth = true;
						$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
						$mail->Password   = '02006e2368ea10615afa119558561084';
						$mail->SMTPSecure = 'tls';
						$mail->Port       = 587;
						$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
						$mail->addAddress($check);
						$mail->isHTML(true);
						$mail->Subject = $subject;
						$mail->Body    = $message;
						$mail->send();
						$data3 = array(
							'reply' => 'replied'
							);
						$model2->updateData4($data3, $check);
						$mail->ClearAllRecipients();
						$session->setFlashdata('msg', 'Message sent');
						return redirect()->to(base_url('/latihan'));
					} catch (Exception $e) {
						$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
						return redirect()->to(base_url('/latihan'))->withInput();
					}
				}
			}
			$fetch2 = $model4->where('email', $check)->first();
			if($fetch2){
				$developmentMode=true;
				$mail = new PHPMailer($developmentMode);
				try {
					$mail->SMTPDebug = 2;
					$mail->isSMTP();
					if ($developmentMode){
						$mail->SMTPOptions=[
							'ssl'=>[
								'verify_peer' => false,
								'verify_peer_name' => false,
								'allow_self_signed' => true
							]	
						];
					}
					$mail->Host = 'in-v3.mailjet.com';   
					$mail->SMTPAuth = true;
					$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
					$mail->Password   = '02006e2368ea10615afa119558561084';
					$mail->SMTPSecure = 'tls';
					$mail->Port       = 587;
					$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
					$mail->addAddress($check);
					$mail->isHTML(true);
					$mail->Subject = $subject;
					$mail->Body    = $message;
					$mail->send();
					$data3 = array(
						'reply' => 'replied'
						);
					$model2->updateData4($data3, $check);
					$mail->ClearAllRecipients();
					$session->setFlashdata('msg', 'Message sent');
					return redirect()->to(base_url('/latihan'));
				}catch (Exception $e) {
					$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
					return redirect()->to(base_url('/latihan'))->withInput();
				}
			}else{
			$session->setFlashdata('msg', "Send message failed");
			return redirect()->to(base_url('/latihan'));
}
				}
}else{
	return redirect()->to(base_url('/latihan'))->withInput();
} 
}  


function send4() { 
	$rules = [
		'to' 			=> [
			'rules'=>'required|min_length[7]|max_length[40]|valid_email',
			'errors'=>[
				'min_length'=>'At least 7 characters',
				'max_length'=>'Maximum 40 characters',
				'required'=>"Don't forget to fill this",
				'valid_email'=>'This is not a valid email'
			]
			],
		'message' 			=> [
			'rules'=>'required|min_length[10]',
			'errors'=>[
				'min_length'=>'At least 10 characters',
				'required'=>"Don't forget to fill this"
			]
			],
			'docum' => [
				'rules'=> 'mime_in[docum,image/jpg,image/jpeg,image/png]|max_size[docum,6024]|is_image[docum]',
				'errors'=>[
					'max_size' => 'Size is too big, max size 6 mb',
					'is_image'=> 'The file you were uploaded is not an image',
					'mime_in'=> 'Must jpg/jpeg/png'
				]
			]
			
			];
			if($this->validate($rules)){
				$session = session();
				$model = new UserModel();
				$model2 = new Cserve();
				$model3 = new Editpage();
				$model4 = new FormCust();
				$encrypter = \Config\Services::encrypter();
				$save3 = $session->get('username');
				$save4 = $session->get('photo');
				$check = $this->request->getPost('to');
				$subject = '[NO REPLY] Best Regards';
				$message = $this->request->getPost('message');
				$save = session()->get('email');
				if($check==$save){
					$session->setFlashdata('msg', "Send message failed, the email address was yours");
					return redirect()->to(base_url('/addons'))->withInput();
				}else{
					$fetch = $model->where('email', $check)->first();
			if($fetch){
				$is_active = $fetch['aktif'];
				if($is_active=='activated'){
					$role=$fetch['status'];
					if($role=='USER'){
					$file = $this->request->getFile('docum');
					if($file->getError()==4){
					$data = array(
						'identity2'        => base64_encode($encrypter->encrypt($save3)),
						'photo2'        => $save4,
						'chat2'        => base64_encode($encrypter->encrypt($message)),
						'fetch' => $check,
						'date2' => time()
						);
						$data2 = array(
							'badge' => '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle border-0">
						  </span>'
							);
							$data3 = array(
								'reply' => 'replied'
								);
						$model2->saveData($data);
						$model3->updateData6($data2, $check);
						$model2->updateData4($data3, $check);
						$session->setFlashdata('msg', 'Message sent');
					return redirect()->to(base_url('/addons'));
						}else{
							$filename=$file->getRandomName();
							$file->move(ROOTPATH.'/public/certificate',$filename);
							$data = array(
								'certificate' => $filename,
								'identity2'        => base64_encode($encrypter->encrypt($save3)),
								'photo2'        => $save4,
								'chat2'        => base64_encode($encrypter->encrypt($message)),
								'fetch' => $check,
								'date2' => time()
								);
								$data2 = array(
									'badge' => '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle border-0">
								  </span>'
									);
									$data3 = array(
										'reply' => 'replied'
										);
								$model2->saveData($data);
								$model3->updateData6($data2, $check);
								$model2->updateData4($data3, $check);
								$session->setFlashdata('msg', 'Message sent');
							return redirect()->to(base_url('/addons'));
						}
					}else{
						$developmentMode=true;
						$mail = new PHPMailer($developmentMode);
						try {
							$mail->SMTPDebug = 2;
							$mail->isSMTP();
							if ($developmentMode){
								$mail->SMTPOptions=[
									'ssl'=>[
										'verify_peer' => false,
										'verify_peer_name' => false,
										'allow_self_signed' => true
									]	
								];
							}
							$mail->Host = 'in-v3.mailjet.com';   
							$mail->SMTPAuth = true;
							$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
							$mail->Password   = '02006e2368ea10615afa119558561084';
							$mail->SMTPSecure = 'tls';
							$mail->Port       = 587;
							$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
							$mail->addAddress($check);
							$mail->isHTML(true);
							$mail->Subject = $subject;
							$mail->Body    = $message;
							$mail->send();
							$data3 = array(
								'reply' => 'replied'
								);
							$model2->updateData4($data3, $check);
							$mail->ClearAllRecipients();
							$session->setFlashdata('msg', 'Message sent');
							return redirect()->to(base_url('/addons'));
						} catch (Exception $e) {
							$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
							return redirect()->to(base_url('/addons'))->withInput();
					}
					}
				}else{
	$developmentMode=true;
	$mail = new PHPMailer($developmentMode);
	try {
		$mail->SMTPDebug = 2;
		$mail->isSMTP();
		if ($developmentMode){
			$mail->SMTPOptions=[
				'ssl'=>[
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				]	
			];
		}
		$mail->Host = 'in-v3.mailjet.com';   
		$mail->SMTPAuth = true;
		$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
		$mail->Password   = '02006e2368ea10615afa119558561084';
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587;
		$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
		$mail->addAddress($check);
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->send();
		$data3 = array(
			'reply' => 'replied'
			);
		$model2->updateData4($data3, $check);
		$mail->ClearAllRecipients();
		$session->setFlashdata('msg', 'Message sent');
		return redirect()->to(base_url('/addons'));
	} catch (Exception $e) {
		$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
		return redirect()->to(base_url('/addons'))->withInput();
}
				}
			}
			$fetch2 = $model4->where('email', $check)->first();
					if($fetch2){
						$developmentMode=true;
						$mail = new PHPMailer($developmentMode);
						try {
							$mail->SMTPDebug = 2;
							$mail->isSMTP();
							if ($developmentMode){
								$mail->SMTPOptions=[
									'ssl'=>[
										'verify_peer' => false,
										'verify_peer_name' => false,
										'allow_self_signed' => true
									]	
								];
							}
							$mail->Host = 'in-v3.mailjet.com';   
							$mail->SMTPAuth = true;
							$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
							$mail->Password   = '02006e2368ea10615afa119558561084';
							$mail->SMTPSecure = 'tls';
							$mail->Port       = 587;
							$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
							$mail->addAddress($check);
							$mail->isHTML(true);
							$mail->Subject = $subject;
							$mail->Body    = $message;
							$mail->send();
							$data3 = array(
								'reply' => 'replied'
								);
							$model2->updateData4($data3, $check);
							$mail->ClearAllRecipients();
							$session->setFlashdata('msg', 'Message sent');
							return redirect()->to(base_url('/addons'));
						}catch (Exception $e) {
							$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
							return redirect()->to(base_url('/addons'))->withInput();
						}
					}else{
			$session->setFlashdata('msg', "Send message failed");
		return redirect()->to(base_url('/addons'));
		}
	}
}else{
	return redirect()->to(base_url('/addons'))->withInput();
}
} 
function send5() { 
	$rules = [
		'to' 			=> [
			'rules'=>'required|min_length[7]|max_length[40]|valid_email',
			'errors'=>[
				'min_length'=>'At least 7 characters',
				'max_length'=>'Maximum 40 characters',
				'required'=>"Don't forget to fill this",
				'valid_email'=>'This is not a valid email'
			]
			],
		'message' 			=> [
			'rules'=>'required|min_length[10]',
			'errors'=>[
				'min_length'=>'At least 10 characters',
				'required'=>"Don't forget to fill this"
			]
			],
			'docum' => [
				'rules'=> 'mime_in[docum,image/jpg,image/jpeg,image/png]|max_size[docum,6024]|is_image[docum]',
				'errors'=>[
					'max_size' => 'Size is too big, max size 6 mb',
					'is_image'=> 'The file you were uploaded is not an image',
					'mime_in'=> 'Must jpg/jpeg/png'
				]
			]
			
			];
			if($this->validate($rules)){
				$session = session();
				$model = new UserModel();
				$model2 = new Cserve();
				$model3 = new Editpage();
				$model4 = new FormCust();
				$encrypter = \Config\Services::encrypter();
				$save3 = $session->get('username');
				$save4 = $session->get('photo');
				$subject = '[NO REPLY] Best Regards';
				$message = $this->request->getPost('message');
				$check = $this->request->getPost('to');
				$save = session()->get('email');
				if($check==$save){
					$session->setFlashdata('msg', "Send message failed, the email address was yours");
					return redirect()->to(base_url('/serve'))->withInput();
				}else{
					$fetch = $model->where('email', $check)->first();
			if($fetch){
				$is_active = $fetch['aktif'];
				if($is_active=='activated'){
					$role=$fetch['status'];
					if($role=='USER'){
					$file = $this->request->getFile('docum');
					if($file->getError()==4){
					$data = array(
						'identity2'        => base64_encode($encrypter->encrypt($save3)),
						'photo2'        => $save4,
						'chat2'        => base64_encode($encrypter->encrypt($message)),
						'fetch' => $check,
						'date2' => time()
						);
						$data2 = array(
							'badge' => '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle border-0">
						  </span>'
							);
							$data3 = array(
								'reply' => 'replied'
								);
						$model2->saveData($data);
						$model3->updateData6($data2, $check);
						$model2->updateData4($data3, $check);
					$session->setFlashdata('msg', 'Message sent');
					return redirect()->to(base_url('/serve'));
				}else{
					$filename=$file->getRandomName();
					$file->move(ROOTPATH.'/public/certificate',$filename);
					$data = array(
						'certificate' => $filename,
						'identity2'        => base64_encode($encrypter->encrypt($save3)),
						'photo2'        => $save4,
						'chat2'        => base64_encode($encrypter->encrypt($message)),
						'fetch' => $check,
						'date2' => time()
						);
						$data2 = array(
							'badge' => '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle border-0">
						  </span>'
							);
							$data3 = array(
								'reply' => 'replied'
								);
						$model2->saveData($data);
						$model3->updateData6($data2, $check);
						$model2->updateData4($data3, $check);
						$session->setFlashdata('msg', 'Message sent');
						return redirect()->to(base_url('/serve'));
				}
			}else{
				$developmentMode=true;
	$mail = new PHPMailer($developmentMode);

	try {
		$mail->SMTPDebug = 2;
		$mail->isSMTP();
		if ($developmentMode){
			$mail->SMTPOptions=[
				'ssl'=>[
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				]	
			];
		}
		$mail->Host = 'in-v3.mailjet.com';   
		$mail->SMTPAuth = true;
		$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
		$mail->Password   = '02006e2368ea10615afa119558561084';
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587;
		$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
		$mail->addAddress($check);
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->send();
		$data3 = array(
			'reply' => 'replied'
			);
		$model2->updateData4($data3, $check);
		$mail->ClearAllRecipients();
		$session->setFlashdata('msg', 'Message sent');
		return redirect()->to(base_url('/serve'));
	} catch (Exception $e) {
		$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
		return redirect()->to(base_url('/serve'))->withInput();
	}
			}
		}else{
	$developmentMode=true;
	$mail = new PHPMailer($developmentMode);

	try {
		$mail->SMTPDebug = 2;
		$mail->isSMTP();
		if ($developmentMode){
			$mail->SMTPOptions=[
				'ssl'=>[
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				]	
			];
		}
		$mail->Host = 'in-v3.mailjet.com';   
		$mail->SMTPAuth = true;
		$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
		$mail->Password   = '02006e2368ea10615afa119558561084';
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587;
		$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
		$mail->addAddress($check);
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->send();
		$data3 = array(
			'reply' => 'replied'
			);
		$model2->updateData4($data3, $check);
		$mail->ClearAllRecipients();
		$session->setFlashdata('msg', 'Message sent');
		return redirect()->to(base_url('/serve'));
	} catch (Exception $e) {
		$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
		return redirect()->to(base_url('/serve'))->withInput();
	}
				}
			}
			$fetch2 = $model4->where('email', $check)->first();
			if($fetch2){
				$developmentMode=true;
				$mail = new PHPMailer($developmentMode);
				try {
					$mail->SMTPDebug = 2;
					$mail->isSMTP();
					if ($developmentMode){
						$mail->SMTPOptions=[
							'ssl'=>[
								'verify_peer' => false,
								'verify_peer_name' => false,
								'allow_self_signed' => true
							]	
						];
					}
					$mail->Host = 'in-v3.mailjet.com';   
					$mail->SMTPAuth = true;
					$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
					$mail->Password   = '02006e2368ea10615afa119558561084';
					$mail->SMTPSecure = 'tls';
					$mail->Port       = 587;
					$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
					$mail->addAddress($check);
					$mail->isHTML(true);
					$mail->Subject = $subject;
					$mail->Body    = $message;
					$mail->send();
					$data3 = array(
						'reply' => 'replied'
						);
					$model2->updateData4($data3, $check);
					$mail->ClearAllRecipients();
					$session->setFlashdata('msg', 'Message sent');
					return redirect()->to(base_url('/serve'));
				}catch (Exception $e) {
					$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
					return redirect()->to(base_url('/serve'))->withInput();
				}
			}else{
			$session->setFlashdata('msg', "Send message failed");
			return redirect()->to(base_url('/serve'));
			}
		}
}else{
	return redirect()->to(base_url('/serve'))->withInput();
}
}

function send6() { 
	$rules = [
		'to' 			=> [
			'rules'=>'required|min_length[7]|max_length[40]|valid_email',
			'errors'=>[
				'min_length'=>'At least 7 characters',
				'max_length'=>'Maximum 40 characters',
				'required'=>"Don't forget to fill this",
				'valid_email'=>'This is not a valid email'
			]
			],
		'message' 			=> [
			'rules'=>'required|min_length[10]',
			'errors'=>[
				'min_length'=>'At least 10 characters',
				'required'=>"Don't forget to fill this"
			]
			],
			'docum' => [
				'rules'=> 'mime_in[docum,image/jpg,image/jpeg,image/png]|max_size[docum,6024]|is_image[docum]',
				'errors'=>[
					'max_size' => 'Size is too big, max size 6 mb',
					'is_image'=> 'The file you were uploaded is not an image',
					'mime_in'=> 'Must jpg/jpeg/png'
				]
			]
			
			];
			if($this->validate($rules)){
				$session = session();
				$model = new UserModel();
				$model2 = new Cserve();
				$model3 = new Editpage();
				$model4 = new FormCust();
				$encrypter = \Config\Services::encrypter();
				$save3 = $session->get('username');
				$save4 = $session->get('photo');
				$check = $this->request->getPost('to');
				$subject = '[NO REPLY] Best Regards';
				$message = $this->request->getPost('message');
				$save = session()->get('email');
				if($check==$save){
					$session->setFlashdata('msg', "Send message failed, the email address was yours");
					return redirect()->to(base_url('/activation'))->withInput();
				}else{
					$fetch = $model->where('email', $check)->first();
			if($fetch){
				$is_active = $fetch['aktif'];
				if($is_active=='activated'){
					$role=$fetch['status'];
					if($role=='USER'){
					$file = $this->request->getFile('docum');
					if($file->getError()==4){
					$data = array(
						'identity2'        => base64_encode($encrypter->encrypt($save3)),
						'photo2'        => $save4,
						'chat2'        => base64_encode($encrypter->encrypt($message)),
						'fetch' => $check,
						'date2' => time()
						);
						$data2 = array(
							'badge' => '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle border-0">
						  </span>'
							);
							$data3 = array(
								'reply' => 'replied'
								);
						$model2->saveData($data);
						$model3->updateData6($data2, $check);
						$model2->updateData4($data3, $check);
					$session->setFlashdata('msg', 'Message sent');
					return redirect()->to(base_url('/activation'));
				}else{
					$filename=$file->getRandomName();
					$file->move(ROOTPATH.'/public/certificate',$filename);
					$data = array(
						'certificate' => $filename,
						'identity2'        => base64_encode($encrypter->encrypt($save3)),
						'photo2'        => $save4,
						'chat2'        => base64_encode($encrypter->encrypt($message)),
						'fetch' => $check,
						'date2' => time()
						);
						$data2 = array(
							'badge' => '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle border-0">
						  </span>'
							);
							$data3 = array(
								'reply' => 'replied'
								);
						$model2->saveData($data);
						$model3->updateData6($data2, $check);
						$model2->updateData4($data3, $check);
						$session->setFlashdata('msg', 'Message sent');
						return redirect()->to(base_url('/activation'));
				}
			}else{
				$developmentMode=true;
	$mail = new PHPMailer($developmentMode);

	try {
		$mail->SMTPDebug = 2;
		$mail->isSMTP();
		if ($developmentMode){
			$mail->SMTPOptions=[
				'ssl'=>[
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				]	
			];
		}
		$mail->Host = 'in-v3.mailjet.com';   
		$mail->SMTPAuth = true;
		$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
		$mail->Password   = '02006e2368ea10615afa119558561084';
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587;
		$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
		$mail->addAddress($check);
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->send();
		$data3 = array(
			'reply' => 'replied'
			);
		$model2->updateData4($data3, $check);
		$mail->ClearAllRecipients();
		$session->setFlashdata('msg', 'Message sent');
		return redirect()->to(base_url('/activation'));
	} catch (Exception $e) {
		$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
		return redirect()->to(base_url('/activation'))->withInput();
	}
			}
				}else{
	$developmentMode=true;
	$mail = new PHPMailer($developmentMode);

	try {
		$mail->SMTPDebug = 2;
		$mail->isSMTP();
		if ($developmentMode){
			$mail->SMTPOptions=[
				'ssl'=>[
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				]	
			];
		}
		$mail->Host = 'in-v3.mailjet.com';   
		$mail->SMTPAuth = true;
		$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
		$mail->Password   = '02006e2368ea10615afa119558561084';
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587;
		$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
		$mail->addAddress($check);
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->send();
		$data3 = array(
			'reply' => 'replied'
			);
		$model2->updateData4($data3, $check);
		$mail->ClearAllRecipients();
		$session->setFlashdata('msg', 'Message sent');
		return redirect()->to(base_url('/activation'));
	} catch (Exception $e) {
		$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
		return redirect()->to(base_url('/activation'))->withInput();
	}
				}
			}
			$fetch2 = $model4->where('email', $check)->first();
			if($fetch2){
				$developmentMode=true;
				$mail = new PHPMailer($developmentMode);
				try {
					$mail->SMTPDebug = 2;
					$mail->isSMTP();
					if ($developmentMode){
						$mail->SMTPOptions=[
							'ssl'=>[
								'verify_peer' => false,
								'verify_peer_name' => false,
								'allow_self_signed' => true
							]	
						];
					}
					$mail->Host = 'in-v3.mailjet.com';   
					$mail->SMTPAuth = true;
					$mail->Username = 'c5a420fa9c9c6ade6338001889a4e368';
					$mail->Password   = '02006e2368ea10615afa119558561084';
					$mail->SMTPSecure = 'tls';
					$mail->Port       = 587;
					$mail->setFrom('rezaangkasa@outlook.com', 'SIPS');
					$mail->addAddress($check);
					$mail->isHTML(true);
					$mail->Subject = $subject;
					$mail->Body    = $message;
					$mail->send();
					$data3 = array(
						'reply' => 'replied'
						);
					$model2->updateData4($data3, $check);
					$mail->ClearAllRecipients();
					$session->setFlashdata('msg', 'Message sent');
					return redirect()->to(base_url('/activation'));
				}catch (Exception $e) {
					$session->setFlashdata('msg', "Send message failed. Error: ".$mail->ErrorInfo);
					return redirect()->to(base_url('/activation'))->withInput();
				}
			}else{
			$session->setFlashdata('msg', "Send message failed");
			return redirect()->to(base_url('/activation'));
				}
			}
}else{
	return redirect()->to(base_url('/activation'))->withInput();
}
} 
}