<?php
namespace App\Controllers;

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\Datatablesmodal;
use App\Models\Editpage;
use App\Models\Helpcent;
class Addons extends Controller
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        $model = new Helpcent();
        helper('text');
        $check = $this->request->getVar('search');
        if (isset($check)) {
            $fetch = $this->request->getVar('keyword');
            session()->set('keyword5', $fetch);
        } else {
            $fetch = session()->get('keyword5');
        }
        $model->getData($fetch);
        $data = [
            'help_info' => $model->getData()->getResult(),
            'help_info' => $model->paginate(6, 'help_info'),
            'pager' => $model->pager,
            'validation' => \Config\Services::validation(),
            'encrypter' => \Config\Services::encrypter()
        ];
        echo view('/info', $data);
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


    public function save()
    {
        $rules = [
            'information' => [
                'rules' => 'required|min_length[100]',
                'errors' => [
                    'min_length' => 'At Least 100 characters',
                    'required' => "Don't Forget to Fill This"
                ]
            ],
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "You can't choose this option"
                ]
            ],
            'title' => [
                'rules' => 'is_unique[help_info.title]|required|min_length[10]|max_length[100]|alpha_numeric_punct',
                'errors' => [
                    'is_unique' => 'This title had been published',
                    'min_length' => 'At least 10 characters',
                    'max_length' => 'Maximum 100 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'file' => [
                'rules' => 'mime_in[file,image/jpg,image/jpeg,image/png]|max_size[file,2024]|is_image[file]',
                'errors' => [
                    'max_size' => 'Size is too big, max size 2 mb',
                    'is_image' => 'The file you were uploaded is not an image',
                    'mime_in' => 'Must jpg/jpeg/png'
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $session = session();
            $model = new Helpcent();
            $encrypter = \Config\Services::encrypter();
            $check = session()->get('email');
            $file = $this->request->getFile('file');
            if ($file->getError() == 4) {
                $data = array(
                    'information' => base64_encode($encrypter->encrypt($this->request->getPost('information'))),
                    'category' => $this->request->getPost('category'),
                    'author' => $this->request->getPost('author_name'),
                    'picture' => $this->request->getPost('author_pict'),
                    'title' => $this->request->getPost('title'),
                    'email' => $check,
                    'date_created' => time()
                );
                $model->saveData($data);
                $session->setFlashdata('msg', "New data has been created");
                return redirect()->to(base_url('/addons'));
            } else {
                $filename = $file->getRandomName();
                $file->move(ROOTPATH . '/public/picture', $filename);
                $data = array(
                    'information' => base64_encode($encrypter->encrypt($this->request->getPost('information'))),
                    'category' => $this->request->getPost('category'),
                    'title' => $this->request->getPost('title'),
                    'author' => $this->request->getPost('author_name'),
                    'picture' => $this->request->getPost('author_pict'),
                    'image' => $filename,
                    'email' => $check,
                    'date_created' => time()
                );
                $model->saveData($data);
                $session->setFlashdata('msg', "New data has been created");
                return redirect()->to(base_url('/addons'));
            }

        } else {
            return redirect()->to(base_url('/addons'))->withInput();
        }
    }

    public function update()
    {
        $check = $this->request->getPost('title');
        $check3 = $this->request->getPost('title2');


        if ($check == $check3) {
            $rules_title = 'required|min_length[10]|max_length[100]|alpha_numeric_punct';
        } else if ($check != $check3) {
            $rules_title = 'is_unique[help_info.title]|required|min_length[10]|max_length[100]|alpha_numeric_punct';
        }

        $rules = [
            'information' => [
                'rules' => 'required|min_length[100]',
                'errors' => [
                    'min_length' => 'At Least 100 characters',
                    'required' => "Don't Forget to Fill This"
                ]
            ],
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "You can't choose the first one option"
                ]
            ],
            'title2' => [
                'rules' => $rules_title,
                'errors' => [
                    'is_unique' => 'This title had been published',
                    'min_length' => 'At least 10 characters',
                    'max_length' => 'Maximum 100 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'file' => [
                'rules' => 'mime_in[file,image/jpg,image/jpeg,image/png]|max_size[file,2024]|is_image[file]',
                'errors' => [
                    'max_size' => 'Size is too big, max size 2 mb',
                    'is_image' => 'The file you were uploaded is not an image',
                    'mime_in' => 'Must jpg/jpeg/png'
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $session = session();
            $model = new Helpcent();
            $encrypter = \Config\Services::encrypter();
            $id = $this->request->getPost('id');
            $file = $this->request->getFile('file');
            $check2 = $session->get('username');
            $users = $this->request->getPost('auth');
            if ($users == $check2) {
                if ($file->getError() == 4) {
                    $data = array(
                        'information' => base64_encode($encrypter->encrypt($this->request->getPost('information'))),
                        'category' => $this->request->getPost('category'),
                        'title' => $this->request->getPost('title2')
                    );
                    $model->updateData($data, $id);
                    $session->setFlashdata('msg', "Data has successfully been updated");
                    return redirect()->to(base_url('/read/index3/' . $this->request->getPost('id')));
                } else {
                    $filename = $file->getRandomName();
                    $file->move(ROOTPATH . '/public/picture', $filename);
                    $data = array(
                        'information' => base64_encode($encrypter->encrypt($this->request->getPost('information'))),
                        'category' => $this->request->getPost('category'),
                        'title' => $this->request->getPost('title2'),
                        'image' => $filename,
                    );
                    $model->updateData2($data, $id);
                    $session->setFlashdata('msg', "Data has successfully been updated");
                    return redirect()->to(base_url('/read/index3/' . $this->request->getPost('id')));
                }
            } else {
                $session->setFlashdata('msg', "The action is forbidden");
                return redirect()->to(base_url('/read/index3/' . $this->request->getPost('id')));
            }
        } else {
            return redirect()->to(base_url('/read/index3/' . $this->request->getPost('id')))->withInput();
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
            return redirect()->to(base_url('/addons'));
        } else {
            return redirect()->to(base_url('/addons'))->withInput();
        }
    }
    public function delete()
    {
        $session = session();
        $model = new Helpcent();
        $id = $this->request->getPost('id');
        $model->deleteData($id);
        $session->setFlashdata('msg', "Data has successfully been deleted");
        return redirect()->to(base_url('/addons'));
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
                    return redirect()->to(base_url('/addons'));
                }
            }
        } else {
            return redirect()->to(base_url('/addons'))->withInput();
        }
    }
}