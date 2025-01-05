<?php
namespace App\Controllers;
use App\Models\Helpcent;
use App\Models\Editpage;
use App\Models\UserModel;
use App\Models\Chat;
use App\Models\Cserve;

use CodeIgniter\Controller;
class Useracc extends Controller
{

    public function index()
    {
        if (!session()->get('logged_in2')) {
            return redirect()->to(base_url('/login'));
        }
        $model2 = new Chat();
        $check = session()->get('email');
        if (isset($check)) {
            $fetch = $check;
            session()->set($fetch);
        }
        $model2->getData2($fetch);
        $data = [
            'messaging' => $model2->getData2()->getResult(),
            'messaging' => $model2->paginate(100000000000000, 'messaging'),
            'encrypter' => \Config\Services::encrypter(),
            'validation' => \Config\Services::validation()
        ];
        echo view('/user', $data);
    }

    public function editprofile()
    {
        $session = session();
        $check2 = $session->get('username');
        if ($check2 == $this->request->getPost('username2')) {
            $rules_user = 'required|min_length[7]|max_length[50]|alpha_numeric_punct';
        } else {
            $rules_user = 'is_unique[users.username]|required|min_length[7]|max_length[50]|alpha_numeric_punct';
        }
        $rules = [
            'username2' => [
                'rules' => $rules_user,
                'errors' => [
                    'is_unique' => 'The username you were trying to use before, has already been taken',
                    'min_length' => 'At least 7 characters',
                    'max_length' => 'Maximum 50 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'tempat_tanggal_lahir2' => [
                'rules' => 'required|alpha_numeric_punct|min_length[10]|max_length[40]',
                'errors' => [
                    'min_length' => 'At least 10 characters',
                    'max_length' => 'Maximum 40 characters',
                    'required' => "Don't forget to fill this",
                    'alpha_numeric_punct' => 'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters'
                ]
            ],
            'phone2' => [
                'rules' => 'required|numeric|min_length[10]|max_length[20]',
                'errors' => [
                    'min_length' => 'At least 10 characters',
                    'max_length' => 'Maximum 20 characters',
                    'required' => "Don't forget to fill this",
                    'numeric' => "This field must contain only numbers"
                ]
            ],
            'pict' => [
                'rules' => 'mime_in[pict,image/jpg,image/jpeg,image/png]|max_size[pict,2024]|is_image[pict]',
                'errors' => [
                    'max_size' => 'Size is too big, max size 2 MB',
                    'is_image' => 'The file you were uploaded is not an image',
                    'mime_in' => 'Must jpg/jpeg/png'
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $model = new Editpage();
            $model3 = new UserModel();
            $encrypter = \Config\Services::encrypter();
            $user_id = $this->request->getPost('user_id');
            $save = session()->get('photo');
            $check = $this->request->getPost('mail');
            $file = $this->request->getFile('pict');
            if ($file->getError() == 4) {
                $data = array(
                    'username' => $this->request->getPost('username2'),
                    'phone' => base64_encode($encrypter->encrypt($this->request->getPost('phone2'))),
                    'badge' => '',
                    'tempat_tanggal_lahir' => base64_encode($encrypter->encrypt($this->request->getPost('tempat_tanggal_lahir2')))
                );
                $data2 = array(
                    'telepon' => base64_encode($encrypter->encrypt($this->request->getPost('phone2')))
                );
                $data3 = array(
                    'nomor_telepon' => base64_encode($encrypter->encrypt($this->request->getPost('phone2')))
                );
                $data4 = array(
                    'phone_number' => base64_encode($encrypter->encrypt($this->request->getPost('phone2'))),
                    'name' => $this->request->getPost('username2')
                );
                $model->updateProfile1($data, $user_id);
                $model->updateData($data2, $check);
                $model->updateData2($data3, $check);
                $model->updateData5($data4, $check);
                $data5 = $model3->where('email', $check)->first();
                $newdata = [
                    'username' => $data5['username'],
                    'phone' => $data5['phone'],
                    'tempat_tanggal_lahir' => $data5['tempat_tanggal_lahir'],
                    'badge' => $data5['badge']
                ];
                $session->set($newdata);
                $session->setFlashdata('msg', "Your profile has successfully been updated");
                return redirect()->to(base_url('/useracc'));
            } else {
                $filename = $file->getRandomName();
                $file->move(ROOTPATH . '/public/img', $filename);
                $data = array(
                    'photo' => $filename,
                    'username' => $this->request->getPost('username2'),
                    'phone' => base64_encode($encrypter->encrypt($this->request->getPost('phone2'))),
                    'badge' => '',
                    'tempat_tanggal_lahir' => base64_encode($encrypter->encrypt($this->request->getPost('tempat_tanggal_lahir2')))
                );
                $data2 = array(
                    'telepon' => base64_encode($encrypter->encrypt($this->request->getPost('phone2')))
                );
                $data3 = array(
                    'nomor_telepon' => base64_encode($encrypter->encrypt($this->request->getPost('phone2')))
                );
                $data4 = array(
                    'phone_number' => base64_encode($encrypter->encrypt($this->request->getPost('phone2'))),
                    'name' => $this->request->getPost('username2')
                );
                $model->updateProfile2($data, $user_id);
                $model->updateData($data2, $check);
                $model->updateData2($data3, $check);
                $model->updateData5($data4, $check);
                $data5 = $model3->where('email', $check)->first();
                $newdata = [
                    'username' => $data5['username'],
                    'photo' => $data5['photo'],
                    'phone' => $data5['phone'],
                    'tempat_tanggal_lahir' => $data5['tempat_tanggal_lahir'],
                    'badge' => $data5['badge']
                ];
                $session->set($newdata);
                $session->setFlashdata('msg', "Your profile has successfully been updated");
                return redirect()->to(base_url('/useracc'));
            }
        } else {
            return redirect()->to(base_url('/useracc'))->withInput();
        }
    }


    public function password()
    {
        $rules = [
            'currentpassword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'provide a password'
                ]
            ],
            'newpassword' => [
                'rules' => 'required|min_length[7]|max_length[200]',
                'errors' => [
                    'required' => "Don't forget to fill this",
                    'min_length' => 'At least 7 characters',
                    'max_length' => 'Maximum 200 characters'
                ]
            ],
            'confpassword2' => [
                'rules' => 'required|matches[newpassword]',
                'errors' => [
                    'required' => "Don't forget to fill this",
                    'matches' => "Password didn't match"
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $session = session();
            $model = new UserModel();
            $user_id = $this->request->getVar('user_id');
            $currentpassword = filter_var($this->request->getVar('currentpassword'), FILTER_SANITIZE_STRING);
            $newpassword = filter_var($this->request->getVar('newpassword'), FILTER_SANITIZE_STRING);
            $check = session()->get('email');
            $users = $model->where('user_id', $user_id)->first();
            if ($users) {
                $pass = $users['password'];
                $verify_pass = password_verify($currentpassword, $pass);
                if ($verify_pass) {
                    if ($currentpassword == $newpassword) {
                        $session->setFlashdata('msg', "New password can't be the same as current password");
                        return redirect()->to(base_url('/useracc'));
                    } else {
                        $model2 = new Editpage();
                        $data = array(
                            'password' => password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT),
                            'badge' => ''
                        );
                        $model2->updatePassword($data, $user_id);
                        $data5 = $model->where('email', $check)->first();
                        $newdata = [
                            'badge' => $data5['badge']
                        ];
                        $session->set($newdata);
                        $session->setFlashdata('msg', "Password changed!");
                        return redirect()->to(base_url('/useracc'));
                    }
                } else {
                    $session->setFlashdata('msg', "Wrong current password!");
                    return redirect()->to(base_url('/useracc'));
                }
            }
        } else {
            return redirect()->to(base_url('/useracc'))->withInput();
        }
    }

    function send()
    {
        $rules = [
            'message' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'min_length' => 'At least 10 characters',
                    'required' => "Don't forget to fill this"
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $session = session();
            $model = new Cserve();
            $model2 = new Editpage();
            $model3 = new UserModel();
            $model4 = new Chat();
            $encrypter = \Config\Services::encrypter();
            helper('text');
            $token = random_string('alnum', 32);
            $save = $session->get('email');
            $sender = session()->get('username');
            if (empty($sender)) {
                $session->setFlashdata('msg', "Your message can't be processed, please add your username first");
                return redirect()->to(base_url('/useracc'));
            } else {
                $contact = session()->get('phone');
                $id = session()->get('status');
                $data = array(
                    'name' => base64_encode($encrypter->encrypt($sender)),
                    'email' => $save,
                    'phone_number' => base64_encode($encrypter->encrypt($contact)),
                    'message' => base64_encode($encrypter->encrypt($this->request->getPost('message'))),
                    'status' => $id,
                    'token' => $token,
                    'date_created' => time(),
                    'reply' => "-"
                );
                $data2 = array(
                    'badge' => ''
                );
                $data4 = array(
                    'fetch' => $save,
                    'token' => $token,
                    'message' => base64_encode($encrypter->encrypt($this->request->getPost('message'))),
                    'date_created' => time()
                );
                $model->saveData2($data);
                $model2->updateData6($data2, $save);
                $model4->saveData($data4);
                $data3 = $model3->where('email', $save)->first();
                $newdata = [
                    'badge' => $data3['badge']
                ];
                $session->set($newdata);
                $session->setFlashdata('msg', "Your message has been recorded, thank you for contacting us");
                return redirect()->to(base_url('/useracc'));
            }
        } else {
            return redirect()->to(base_url('/useracc'))->withInput();
        }
    }

    public function edit($token = null)
    {
        if (!session()->get('logged_in2')) {
            return redirect()->to(base_url('/login'));
        }

        $model = new Chat();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        $data['messaging'] = $model->where('token', $token)->first();
        echo view('/edit_message', $data);
    }

    public function update()
    {

        $rules = [
            'message' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'min_length' => 'At least 10 characters',
                    'required' => "Don't forget to fill this"
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $session = session();
            $model = new Chat();
            $model2 = new Editpage();
            $model3 = new UserModel();
            $encrypter = \Config\Services::encrypter();
            $id = $this->request->getPost('token');
            $check = session()->get('email');
            $data = array(
                'message' => base64_encode($encrypter->encrypt($this->request->getPost('message')))
            );
            $data2 = array(
                'badge' => ''
            );
            $model2->updateData6($data2, $check);
            $model->updateData($data, $id);
            $model->updateData2($data, $id);
            $data3 = $model3->where('email', $check)->first();
            $newdata = [
                'badge' => $data3['badge']
            ];
            $session->set($newdata);
            $session->setFlashdata('msg', "Message has been updated");
            return redirect()->to(base_url('/useracc'));
        } else {
            return redirect()->to(base_url('/useracc/edit/' . $this->request->getPost('token')))->withInput();
        }
    }
    public function information()
    {

        if (!session()->get('logged_in2')) {
            return redirect()->to(base_url('/login'));
        }
        $model2 = new Helpcent();
        helper('text');
        $check = $this->request->getVar('search');
        if (isset($check)) {
            $fetch = $this->request->getVar('keyword');
            session()->set('keyword2', $fetch);
        } else {
            $fetch = session()->get('keyword2');
        }
        $model2->getData($fetch);
        $data = [
            'help_info' => $model2->getData()->getResult(),
            'help_info' => $model2->paginate(6, 'help_info'),
            'pager' => $model2->pager,
            'encrypter' => \Config\Services::encrypter(),
            'validation' => \Config\Services::validation()
        ];
        echo view('/another_one', $data);
    }


    public function deletemsg()
    {
        $session = session();
        $model = new Chat();
        $model2 = new Editpage();
        $model3 = new UserModel();
        $id = $this->request->getPost('id');
        $cert = $this->request->getPost('cert');
        $save = $session->get('email');
        if (empty($cert)) {
            $data2 = array(
                'badge' => ''
            );
            $model->deleteData($id);
            $model2->updateData6($data2, $save);
            $data3 = $model3->where('email', $save)->first();
            $newdata = [
                'badge' => $data3['badge']
            ];
            $session->set($newdata);
            $session->setFlashdata('msg', "Message has successfully been deleted");
            return redirect()->to(base_url('/useracc'));
        } else {
            $data2 = array(
                'badge' => ''
            );
            $model->deleteData2($id);
            $model2->updateData6($data2, $save);
            $data3 = $model3->where('email', $save)->first();
            $newdata = [
                'badge' => $data3['badge']
            ];
            $session->set($newdata);
            $session->setFlashdata('msg', "Message has successfully been deleted");
            return redirect()->to(base_url('/useracc'));
        }
    }

    public function removephoto()
    {
        $model = new Editpage();
        $user_id = session()->get('user_id');
        $data = array(
            'photo' => 'default.svg'
        );
        $model->updateProfile2($data, $user_id);
        $newdata = [
            'photo' => 'default.svg'
        ];
        session()->set($newdata);
        session()->setFlashdata('msg', "Your profile has successfully been updated");
        return redirect()->to(base_url('/useracc'));
    }
}