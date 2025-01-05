<?php
namespace App\Controllers;

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\Datatablesmodal;
use App\Models\Editpage;
use App\Models\UserScore;

class Activation extends Controller
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }
        $model = new UserScore();
        $check = $this->request->getVar('search');
        if (isset($check)) {
            $fetch = $this->request->getVar('keyword');
            session()->set('keyword4', $fetch);
        } else {
            $fetch = session()->get('keyword4');
        }
        $model->getData($fetch);
        $data = [
            'users' => $model->getData()->getResult(),
            'users' => $model->paginate(6, 'users'),
            'pager' => $model->pager,
            'validation' => \Config\Services::validation(),
            'encrypter' => \Config\Services::encrypter()
        ];
        echo view('/grade', $data);
    }



    public function sendEmail($token, $type, $password)
    {
        $session = session();
        $developmentMode = true;
        $mailer = new PHPMailer($developmentMode);
        try {
            $mailer->SMTPDebug = 2;
            $mailer->isSMTP();
            if ($developmentMode) {
                $mailer->SMTPOptions = [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    ]
                ];
            }
            $dear = $this->request->getPost('username');
            $to = $this->request->getPost('email');
            if ($type == 'verify') {
                $subject = "[NO REPLY] SIPS Account Verification Request";
                $message = '<p>Dear ' . $dear . '</p>A new SIPS account has been created and linked to this e-mail. Click the link below to verify your account.<p>This link will expire in 24 hours: <a href="' . base_url() . '/register/verification?email=' . $this->request->getPost('email') . '&token=' . urlencode($token) . '">Activate</a></p>Your password: ' . $password;
                $session->setFlashdata('msg', 'Congratulation! you have successfully created an account for ' . $dear . '. Please contact ' . $to . ' to activate the account (check: inbox, junk, spam, or promotion mail), or you can activate it by yourself through accounts menu');
            }
            $mailer->Host = 'in-v3.mailjet.com';
            $mailer->SMTPAuth = true;
            $mailer->Username = '';
            $mailer->Password = '';
            $mailer->SMTPSecure = 'tls';
            $mailer->Port = 587;
            $mailer->setFrom('', '');
            $mailer->addAddress($to);
            $mailer->isHTML(true);
            $mailer->Subject = $subject;
            $mailer->Body = $message;
            $mailer->send();
            $mailer->ClearAllRecipients();
            return true;
        } catch (Exception $e) {
            $session->setFlashdata('msg', "Failed to send the email for verification. Error: " . $mailer->ErrorInfo);
            return true;
        }
    }



    public function activate()
    {
        $session = session();
        $model = new UserScore();
        $id = $this->request->getPost('user_id');
        $check = $this->request->getPost('status');
        if ($check == 'ADMIN') {
            $data = array(
                'is_active' => 1,
                'aktif' => 'activated'
            );
            $model->updateData($data, $id);
            $session->setFlashdata('msg', "Account has been activated");
            return redirect()->to(base_url('/activation'));
        } else {
            $data = array(
                'is_active' => 2,
                'aktif' => 'activated'
            );
            $model->updateData($data, $id);
            $session->setFlashdata('msg', "Account has been activated");
            return redirect()->to(base_url('/activation'));
        }
    }

    public function deactivate()
    {
        $session = session();
        $model = new UserScore();
        $model2 = new UserModel();
        $id = $this->request->getPost('user_id');
        $check = $this->request->getPost('status');
        $check2 = $session->get('email');
        $users = $this->request->getPost('email');
        if ($check == 'USER') {
            $data = array(
                'is_active' => 0,
                'aktif' => 'deactivated'
            );
            $model->updateData($data, $id);
            $session->setFlashdata('msg', "Account has been deactivated");
            return redirect()->to(base_url('/activation'));
        } else if ($users == $check2) {
            $data = array(
                'is_active' => 0,
                'aktif' => 'deactivated'
            );
            $model->updateData($data, $id);
            $session->setFlashdata('msg', "Account has been deactivated");
            return redirect()->to(base_url('/activation'));
        } else {
            $session->setFlashdata('msg', "The action is forbidden");
            return redirect()->to(base_url('/activation'));
        }
    }

    public function registration()
    {
        $rules = [
            'username' => [
                'rules' => 'is_unique[users.username]|required|min_length[7]|max_length[50]|alpha_numeric_punct',
                'errors' => [
                    'is_unique' => 'This username has already been taken',
                    'min_length' => 'At least 7 characters',
                    'max_length' => 'Maximum 50 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'email' => [
                'rules' => 'required|min_length[7]|max_length[40]|valid_email|is_unique[users.email]',
                'errors' => [
                    'min_length' => 'At least 7 characters',
                    'max_length' => 'Maximum 40 characters',
                    'required' => "Don't forget to fill this",
                    'valid_email' => 'This is not a valid email',
                    'is_unique' => 'This email has already registered!'
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $model = new Datatablesmodal();
            helper('text');
            $password = random_string('alpha', 16);
            $data = array(
                'username' => filter_var($this->request->getVar('username'), FILTER_SANITIZE_STRING),
                'email' => filter_var($this->request->getVar('email'), FILTER_VALIDATE_EMAIL),
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'is_active' => 0,
                'created' => time(),
                'status' => 'ADMIN',
                'aktif' => 'deactivated'
            );
            $model->saveFile($data);
            $token = base64_encode(random_bytes(32));
            $users_token = array(
                'email' => $this->request->getPost('email'),
                'token' => $token,
                'date_created' => time()
            );
            $model->saveToken($users_token);
            $this->sendEmail($token, 'verify', $password);
            return redirect()->to(base_url('/activation'));
        } else {
            return redirect()->to(base_url('/activation'))->withInput();
        }
    }
    public function delete2()
    {
        $rules = [
            'currentpassword2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'provide a password'
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $session = session();
            $model = new UserModel();
            $user_id = $this->request->getVar('user_id');
            $currentpassword2 = filter_var($this->request->getVar('currentpassword2'), FILTER_SANITIZE_STRING);
            $users = $model->where('user_id', $user_id)->first();
            if ($users) {
                $pass = $users['password'];
                $verify_pass = password_verify($currentpassword2, $pass);
                if ($verify_pass) {
                    $model2 = new Editpage();
                    $proceed = $model2->deleteProfile($user_id);
                    if ($proceed) {
                        $session->removeTempdata('logged_in');
                        $session->setFlashdata('msg', "Your account has been deleted successfully");
                        return redirect()->to(base_url('/login'));
                    }
                } else {
                    $session->setFlashdata('msg', "Wrong password!");
                    return redirect()->to(base_url('/activation'));
                }
            }
        } else {
            return redirect()->to(base_url('/activation'))->withInput();
        }
    }
}