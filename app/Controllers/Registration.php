<?php
namespace App\Controllers;

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use CodeIgniter\Controller;
use App\Models\Datatablesmodal;
use App\Models\Datareceipt;
use App\Models\Token;
use App\Models\UserModel;
use App\Models\Icon;
use App\Models\Helpcent;
class Registration extends Controller
{
    public function save()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|min_length[5]|max_length[60]|alpha_numeric_punct',
                'errors' => [
                    'min_length' => 'At least 5 characters',
                    'max_length' => 'Maximum 60 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'id_number' => [
                'rules' => 'required|min_length[6]|max_length[26]|numeric',
                'errors' => [
                    'min_length' => 'At least 6 characters',
                    'max_length' => 'Maximum 26 characters',
                    'required' => "Don't forget to fill this",
                    'numeric' => "This field must contain only numbers"
                ]
            ],
            'program_studi' => [
                'rules' => 'required|min_length[7]|max_length[40]|alpha_numeric_punct',
                'errors' => [
                    'min_length' => 'At least 7 characters',
                    'max_length' => 'Maximum 40 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'account' => [
                'rules' => 'required|min_length[5]|max_length[255]|alpha_numeric_punct',
                'errors' => [
                    'required' => "Don't forget to fill this",
                    'min_length' => 'At least 5 characters',
                    'max_length' => 'Maximum 255 characters',
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'bank_name' => [
                'rules' => 'required|min_length[3]|max_length[20]|alpha_numeric_punct',
                'errors' => [
                    'min_length' => 'At least 3 characters',
                    'max_length' => 'Maximum 20 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'transaction' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Don't forget to fill this"
                ]
            ],
            'email3' => [
                'rules' => 'required|min_length[7]|max_length[40]|valid_email',
                'errors' => [
                    'min_length' => 'At least 7 characters',
                    'max_length' => 'Maximum 40 characters',
                    'required' => "Don't forget to fill this",
                    'valid_email' => 'This is not a valid email'
                ]
            ],
            'nomor_telepon' => [
                'rules' => 'required|numeric|min_length[10]|max_length[20]',
                'errors' => [
                    'min_length' => 'At least 10 characters',
                    'max_length' => 'Maximum 20 characters',
                    'required' => "Don't forget to fill this",
                    'numeric' => "This field must contain only numbers"
                ]
            ],
            'nominal' => [
                'rules' => 'required|min_length[5]|max_length[50]|alpha_numeric_punct',
                'errors' => [
                    'min_length' => 'At least 5 characters',
                    'max_length' => 'Maximum 50 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Don't forget to fill this"
                ]
            ],
            'file' => [
                'rules' => 'uploaded[file]|mime_in[file,image/jpg,image/jpeg,image/png]|max_size[file,2024]|is_image[file]',
                'errors' => [
                    'uploaded' => 'Insert your photo',
                    'max_size' => 'Size is too big, max size 2 MB',
                    'is_image' => 'The file you were uploaded is not an image',
                    'mime_in' => 'Must jpg/jpeg/png'
                ]
            ],
            'pict' => [
                'rules' => 'uploaded[pict]|mime_in[pict,image/jpg,image/jpeg,image/png]|max_size[pict,2024]|is_image[pict]',
                'errors' => [
                    'uploaded' => 'Insert the receipt payment',
                    'max_size' => 'Size is too big, max size 2 MB',
                    'is_image' => 'The file you were uploaded is not an image',
                    'mime_in' => 'Must jpg/jpeg/png'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $session = session();
            $model = new Datatablesmodal();
            $model2 = new UserModel();
            $encrypter = \Config\Services::encrypter();
            helper('text');
            $password = random_string('alpha', 16);
            $file = $this->request->getFile('file');
            $file2 = $this->request->getFile('pict');
            $check = $this->request->getPost('email3');
            $token = base64_encode(random_bytes(32));
            $verif = $model2->where(array('email' => $check))->first();
            if ($verif) {
                $status = $verif['status'];
                if ($status == 'ADMIN') {
                    $session->setFlashdata('msg', "Failed to submit your data & payment. Please use another email, the email address you were trying to submit has already registered as an admin email");
                    return redirect()->to(base_url('/login'))->withInput();
                }
                $filename = $file->getRandomName();
                $filename2 = $file2->getRandomName();
                $file->move(ROOTPATH . '/public/pasfoto', $filename);
                $file2->move(ROOTPATH . '/public/receipt', $filename2);
                $data = array(
                    'pas_foto' => $filename,
                    'struk' => $filename2,
                    'nama' => base64_encode($encrypter->encrypt($this->request->getPost('nama'))),
                    'id_number' => base64_encode($encrypter->encrypt($this->request->getPost('id_number'))),
                    'nominal' => base64_encode($encrypter->encrypt($this->request->getPost('nominal'))),
                    'tanggal_lahir' => base64_encode($encrypter->encrypt($this->request->getPost('tanggal_lahir'))),
                    'nomor_telepon' => base64_encode($encrypter->encrypt($this->request->getPost('nomor_telepon'))),
                    'email' => $this->request->getPost('email3'),
                    'account' => base64_encode($encrypter->encrypt($this->request->getPost('account'))),
                    'program_studi' => base64_encode($encrypter->encrypt($this->request->getPost('program_studi'))),
                    'bank_name' => base64_encode($encrypter->encrypt($this->request->getPost('bank_name'))),
                    'transaction' => base64_encode($encrypter->encrypt($this->request->getPost('transaction'))),
                    'created' => time()
                );
                $data3 = array(
                    'registrant' => 'registered'
                );
                $model->saveProduct($data);
                $model->saveData($data3);
                $session->setFlashdata('msg', "Congratulation! your data & payment have successfully been submitted");
                return redirect()->to(base_url('/login'));
            } else {
                $filename = $file->getRandomName();
                $filename2 = $file2->getRandomName();
                $file->move(ROOTPATH . '/public/pasfoto', $filename);
                $file2->move(ROOTPATH . '/public/receipt', $filename2);
                $data = array(
                    'pas_foto' => $filename,
                    'struk' => $filename2,
                    'nama' => base64_encode($encrypter->encrypt($this->request->getPost('nama'))),
                    'id_number' => base64_encode($encrypter->encrypt($this->request->getPost('id_number'))),
                    'nominal' => base64_encode($encrypter->encrypt($this->request->getPost('nominal'))),
                    'tanggal_lahir' => base64_encode($encrypter->encrypt($this->request->getPost('tanggal_lahir'))),
                    'nomor_telepon' => base64_encode($encrypter->encrypt($this->request->getPost('nomor_telepon'))),
                    'email' => $this->request->getPost('email3'),
                    'account' => base64_encode($encrypter->encrypt($this->request->getPost('account'))),
                    'program_studi' => base64_encode($encrypter->encrypt($this->request->getPost('program_studi'))),
                    'bank_name' => base64_encode($encrypter->encrypt($this->request->getPost('bank_name'))),
                    'transaction' => base64_encode($encrypter->encrypt($this->request->getPost('transaction'))),
                    'created' => time()
                );
                $data2 = array(
                    'nama' => base64_encode($encrypter->encrypt($this->request->getPost('nama'))),
                    'phone' => base64_encode($encrypter->encrypt($this->request->getPost('nomor_telepon'))),
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'email' => filter_var($this->request->getVar('email3'), FILTER_VALIDATE_EMAIL),
                    'is_active' => 0,
                    'created' => time(),
                    'status' => 'USER',
                    'aktif' => 'deactivated'
                );
                $data3 = array(
                    'registrant' => 'registered'
                );

                $users_token2 = array(
                    'email' => $this->request->getPost('email3'),
                    'token' => $token,
                    'date_created' => time()
                );
                $model->saveProduct($data);
                $model->saveFile2($data2);
                $model->saveData($data3);
                $model->saveToken2($users_token2);
                $this->sendEmail($token, 'verify', $password);
                return redirect()->to(base_url('/login'));
            }
        } else {
            return redirect()->to(base_url('/login'))->withInput();
        }
    }
    public function save2()
    {
        $rules = [
            'nama2' => [
                'rules' => 'required|min_length[5]|max_length[60]|alpha_numeric_punct',
                'errors' => [
                    'min_length' => 'At least 5 characters',
                    'max_length' => 'Maximum 60 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'id_number2' => [
                'rules' => 'required|min_length[6]|max_length[26]|numeric',
                'errors' => [
                    'min_length' => 'At least 6 characters',
                    'max_length' => 'Maximum 26 characters',
                    'required' => "Don't forget to fill this",
                    'numeric' => "This field must contain only numbers"
                ]
            ],
            'prodi' => [
                'rules' => 'min_length[7]|max_length[40]|alpha_numeric_punct|required',
                'errors' => [
                    'min_length' => 'At least 7 characters',
                    'max_length' => 'Maximum 40 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'instansi' => [
                'rules' => 'required|min_length[10]|max_length[40]|alpha_numeric_punct',
                'errors' => [
                    'min_length' => 'At least 10 characters',
                    'max_length' => 'Maximum 40 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'pekerjaan' => [
                'rules' => 'required|min_length[10]|max_length[40]|alpha_numeric_punct',
                'errors' => [
                    'min_length' => 'At least 10 characters',
                    'max_length' => 'Maximum 40 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'account2' => [
                'rules' => 'required|min_length[5]|max_length[255]|alpha_numeric_punct',
                'errors' => [
                    'required' => "Don't forget to fill this",
                    'min_length' => 'At least 5 characters',
                    'max_length' => 'Maximum 255 characters',
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'bank_name2' => [
                'rules' => 'required|min_length[3]|max_length[20]|alpha_numeric_punct',
                'errors' => [
                    'min_length' => 'At least 3 characters',
                    'max_length' => 'Maximum 20 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'transaction2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Don't forget to fill this"
                ]
            ],
            'email4' => [
                'rules' => 'required|min_length[7]|max_length[40]|valid_email',
                'errors' => [
                    'min_length' => 'At least 7 characters',
                    'max_length' => 'Maximum 40 characters',
                    'required' => "Don't forget to fill this",
                    'valid_email' => 'This is not a valid email'
                ]
            ],
            'telepon' => [
                'rules' => 'required|numeric|min_length[10]|max_length[20]',
                'errors' => [
                    'min_length' => 'At least 10 characters',
                    'max_length' => 'Maximum 20 characters',
                    'required' => "Don't forget to fill this",
                    'numeric' => "This field must contain only numbers"
                ]
            ],
            'nominal2' => [
                'rules' => 'required|min_length[5]|max_length[50]|alpha_numeric_punct',
                'errors' => [
                    'min_length' => 'At least 5 characters',
                    'max_length' => 'Maximum 50 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'inform2' => [
                'rules' => 'required|min_length[10]|max_length[100]|alpha_numeric_punct',
                'errors' => [
                    'min_length' => 'At least 10 characters',
                    'max_length' => 'Maximum 100 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'pict2' => [
                'rules' => 'uploaded[pict2]|mime_in[pict2,image/jpg,image/jpeg,image/png]|max_size[pict2,2024]|is_image[pict2]',
                'errors' => [
                    'uploaded' => 'Insert the receipt payment',
                    'max_size' => 'Size is too big, max size 2 MB',
                    'is_image' => 'The file you were uploaded is not an image',
                    'mime_in' => 'Must jpg/jpeg/png'
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $session = session();
            $model = new Datatablesmodal();
            $model2 = new Datareceipt();
            $model3 = new UserModel();
            $encrypter = \Config\Services::encrypter();
            helper('text');
            $password = random_string('alpha', 16);
            $file2 = $this->request->getFile('pict2');
            $check = $this->request->getPost('email4');
            $token = base64_encode(random_bytes(32));
            $verif = $model3->where(array('email' => $check))->first();
            if ($verif) {
                $status = $verif['status'];
                if ($status == 'ADMIN') {
                    $session->setFlashdata('msg', "Failed to submit your data & payment. Please use another email, the email address you were trying to submit has already registered as an admin email");
                    return redirect()->to(base_url('/login'))->withInput();
                }
                $filename2 = $file2->getRandomName();
                $file2->move(ROOTPATH . '/public/receipt', $filename2);
                $data = array(
                    'struk' => $filename2,
                    'nama' => base64_encode($encrypter->encrypt($this->request->getPost('nama2'))),
                    'id_number' => base64_encode($encrypter->encrypt($this->request->getPost('id_number2'))),
                    'nominal' => base64_encode($encrypter->encrypt($this->request->getPost('nominal2'))),
                    'inform' => $this->request->getPost('inform2'),
                    'telepon' => base64_encode($encrypter->encrypt($this->request->getPost('telepon'))),
                    'email' => $this->request->getPost('email4'),
                    'account' => base64_encode($encrypter->encrypt($this->request->getPost('account2'))),
                    'prodi' => base64_encode($encrypter->encrypt($this->request->getPost('prodi'))),
                    'bank_name' => base64_encode($encrypter->encrypt($this->request->getPost('bank_name2'))),
                    'transaction' => base64_encode($encrypter->encrypt($this->request->getPost('transaction2'))),
                    'instansi' => base64_encode($encrypter->encrypt($this->request->getPost('instansi'))),
                    'pekerjaan' => base64_encode($encrypter->encrypt($this->request->getPost('pekerjaan'))),
                    'created' => time()
                );
                $data4 = array(
                    'registrant' => 'registered'
                );
                $model2->saveProduct($data);
                $model->saveData2($data4);
                $session->setFlashdata('msg', "Congratulation! your data & payment have successfully been submitted");
                return redirect()->to(base_url('/login'));
            } else {
                $filename2 = $file2->getRandomName();
                $file2->move(ROOTPATH . '/public/receipt', $filename2);
                $data = array(
                    'struk' => $filename2,
                    'nama' => base64_encode($encrypter->encrypt($this->request->getPost('nama2'))),
                    'id_number' => base64_encode($encrypter->encrypt($this->request->getPost('id_number2'))),
                    'nominal' => base64_encode($encrypter->encrypt($this->request->getPost('nominal2'))),
                    'inform' => $this->request->getPost('inform2'),
                    'telepon' => base64_encode($encrypter->encrypt($this->request->getPost('telepon'))),
                    'email' => $this->request->getPost('email4'),
                    'account' => base64_encode($encrypter->encrypt($this->request->getPost('account2'))),
                    'prodi' => base64_encode($encrypter->encrypt($this->request->getPost('prodi'))),
                    'bank_name' => base64_encode($encrypter->encrypt($this->request->getPost('bank_name2'))),
                    'transaction' => base64_encode($encrypter->encrypt($this->request->getPost('transaction2'))),
                    'instansi' => base64_encode($encrypter->encrypt($this->request->getPost('instansi'))),
                    'pekerjaan' => base64_encode($encrypter->encrypt($this->request->getPost('pekerjaan'))),
                    'created' => time()
                );
                $data3 = array(
                    'nama' => base64_encode($encrypter->encrypt($this->request->getPost('nama2'))),
                    'phone' => base64_encode($encrypter->encrypt($this->request->getPost('telepon'))),
                    'email' => filter_var($this->request->getVar('email4'), FILTER_VALIDATE_EMAIL),
                    'is_active' => 0,
                    'created' => time(),
                    'status' => 'USER',
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'aktif' => 'deactivated'
                );
                $data4 = array(
                    'registrant' => 'registered'
                );
                $users_token3 = array(
                    'email' => $this->request->getPost('email4'),
                    'token' => $token,
                    'date_created' => time()
                );
                $model2->saveProduct($data);
                $model->saveFile3($data3);
                $model->saveData2($data4);
                $model->saveToken3($users_token3);
                $this->sendEmail2($token, 'verify', $password);
                return redirect()->to(base_url('/login'));
            }
        } else {
            return redirect()->to(base_url('/login'))->withInput();
        }
    }
    public function sendEmail($token, $type, $password)
    {
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
            $dear = $this->request->getPost('nama');
            $to = $this->request->getPost('email3');
            if ($type == 'verify') {
                $subject = "[NO REPLY] SIPS Account Verification Request";
                $message = '<p>Dear ' . $dear . '</p>A new SIPS account has been created and linked to this e-mail. Click the link below to verify your account.<p>This link will expire in 24 hours: <a href="' . base_url() . '/registration/verification?email=' . $this->request->getPost('email3') . '&token=' . urlencode($token) . '">Activate</a></p>Your password: ' . $password . '<p>If this is not you, please  <a href="' . base_url() . '/login' . '">contact us</a></p>Thank you for choosing SIPS';
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
            session()->setFlashdata('msg', "Congratulation! your data & payment have successfully been submitted. Your account has been created, please activate the account through your email (check: inbox, junk, spam, or promotion mail)");
            return true;
        } catch (Exception $e) {
            session()->setFlashdata('msg', "Congratulation! your data & payment has successfully been submitted, but your account needs to be activated, kindly inform the admin. Error: " . $mailer->ErrorInfo);
            return true;
        }
    }

    public function sendEmail2($token, $type, $password)
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
            $dear = $this->request->getPost('nama2');
            $to = $this->request->getPost('email4');
            if ($type == 'verify') {
                $subject = "[NO REPLY] SIPS Account Verification Request";
                $message = '<p>Dear ' . $dear . '</p>A new SIPS account has been created and linked to this e-mail. Click the link below to verify your account.<p>This link will expire in 24 hours: <a href="' . base_url() . '/registration/verification?email=' . $this->request->getPost('email4') . '&token=' . urlencode($token) . '">Activate</a></p>Your password: ' . $password . '<p>If this is not you, please  <a href="' . base_url() . '/login' . '">contact us</a></p>Thank you for choosing SIPS';
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
            $session->setFlashdata('msg', "Congratulation! your data & payment have successfully been submitted. Your account has been created, please activate the account through your email (check: inbox, junk, spam, or promotion mail)");
            return true;
        } catch (Exception $e) {
            $session->setFlashdata('msg', "Congratulation! your data & payment has successfully been submitted, but your account needs to be activated, kindly inform the admin. Error: " . $mailer->ErrorInfo);
            return true;
        }
    }

    public function verification()
    {
        if (session()->get('logged_in')) {
            session()->setFlashdata('msg', "The action is forbidden, please sign out first!");
            return redirect()->to(base_url('/dashboard'));
        } else if (session()->get('logged_in2')) {
            session()->setFlashdata('msg', "The action is forbidden, please sign out first!");
            return redirect()->to(base_url('/useracc'));
        } else if (session()->get('reset_password')) {
            session()->setFlashdata('msg', "The action is forbidden, change your password first!");
            return redirect()->to(base_url('/register/changepassword'));
        }
        $model = new UserModel();
        $model2 = new Token();
        $session = session();
        $email = $this->request->getVar('email');
        $token = $this->request->getVar('token');
        $users = $model->where('email', $email)->first();
        if ($users) {
            $users_token = $model2->where('token', $token)->first();
            if ($users_token) {
                if (time() - $users_token['date_created'] < (60 * 60 * 24)) {
                    $newdata = array(
                        'is_active' => 2,
                        'aktif' => 'activated'
                    );
                    $data['users'] = $model->set($newdata)->where('email', $email)->update();
                    $data2['users_token'] = $model2->where('email', $email)->delete();
                    $session->setFlashdata('msg', $email . " has been activated! Please sign in, don't forget to change your password");
                    return redirect()->to(base_url('/login'));
                } else {
                    $data2['users_token'] = $model2->where('email', $email)->delete();
                    $session->setFlashdata('msg', "Account activation failed! Token expired");
                    return redirect()->to(base_url('/login'));
                }
            } else {
                $session->setFlashdata('msg', "Account activation failed! Wrong token");
                return redirect()->to(base_url('/login'));
            }
        } else {
            $session->setFlashdata('msg', "Account activation failed! Wrong email");
            return redirect()->to(base_url('/login'));
        }
    }
}