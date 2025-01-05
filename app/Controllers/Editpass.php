<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\Editpage;
use App\Models\Datareceipt;
use App\Models\FormPay;
use App\Models\FormReg;
use App\Models\Datatablesmodal;
use App\Models\Helpcent;
use App\Models\Icon;
use App\Models\Cserve;
use App\Models\UserScore;
use App\Models\Pendaftar;
class Editpass extends Controller
{
    public function index()
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
            $users = $model->where('user_id', $user_id)->first();
            if ($users) {
                $pass = $users['password'];
                $verify_pass = password_verify($currentpassword, $pass);
                if ($verify_pass) {
                    if ($currentpassword == $newpassword) {
                        $session->setFlashdata('msg', "New password can't be the same as current password");
                        return redirect()->to(base_url('/dashboard'));
                    } else {
                        $model2 = new Editpage();
                        $data = array(
                            'password' => password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT)
                        );
                        $model2->updatePassword($data, $user_id);
                        $session->setFlashdata('msg', "Password changed!");
                        return redirect()->to(base_url('/dashboard'));
                    }
                } else {
                    $session->setFlashdata('msg', "Wrong current password!");
                    return redirect()->to(base_url('/dashboard'));
                }
            }
        } else {
            return redirect()->to(base_url('/dashboard'))->withInput();
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
            $users = $model->where('user_id', $user_id)->first();
            if ($users) {
                $pass = $users['password'];
                $verify_pass = password_verify($currentpassword, $pass);
                if ($verify_pass) {
                    if ($currentpassword == $newpassword) {
                        $session->setFlashdata('msg', "New password can't be the same as current password");
                        return redirect()->to(base_url('/modalboot'));
                    } else {
                        $model2 = new Editpage();
                        $data = array(
                            'password' => password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT)
                        );
                        $model2->updatePassword($data, $user_id);
                        $session->setFlashdata('msg', "Password changed!");
                        return redirect()->to(base_url('/modalboot'));
                    }
                } else {
                    $session->setFlashdata('msg', "Wrong current password!");
                    return redirect()->to(base_url('/modalboot'));
                }
            }
        } else {
            return redirect()->to(base_url('/modalboot'))->withInput();
        }
    }
    public function password2()
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
            $users = $model->where('user_id', $user_id)->first();
            if ($users) {
                $pass = $users['password'];
                $verify_pass = password_verify($currentpassword, $pass);
                if ($verify_pass) {
                    if ($currentpassword == $newpassword) {
                        $session->setFlashdata('msg', "New password can't be the same as current password");
                        return redirect()->to(base_url('/latihan'));
                    } else {
                        $model2 = new Editpage();
                        $data = array(
                            'password' => password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT)
                        );
                        $model2->updatePassword($data, $user_id);
                        $session->setFlashdata('msg', "Password changed!");
                        return redirect()->to(base_url('/latihan'));
                    }
                } else {
                    $session->setFlashdata('msg', "Wrong current password!");
                    return redirect()->to(base_url('/latihan'));
                }
            }
        } else {
            return redirect()->to(base_url('/latihan'))->withInput();
        }
    }

    public function password4()
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
            $users = $model->where('user_id', $user_id)->first();
            if ($users) {
                $pass = $users['password'];
                $verify_pass = password_verify($currentpassword, $pass);
                if ($verify_pass) {
                    if ($currentpassword == $newpassword) {
                        $session->setFlashdata('msg', "New password can't be the same as current password");
                        return redirect()->to(base_url('/addons'));
                    } else {
                        $model2 = new Editpage();
                        $data = array(
                            'password' => password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT)
                        );
                        $model2->updatePassword($data, $user_id);
                        $session->setFlashdata('msg', "Password changed!");
                        return redirect()->to(base_url('/addons'));
                    }
                } else {
                    $session->setFlashdata('msg', "Wrong current password!");
                    return redirect()->to(base_url('/addons'));
                }
            }
        } else {
            return redirect()->to(base_url('/addons'))->withInput();
        }
    }

    public function password5()
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
            $users = $model->where('user_id', $user_id)->first();
            if ($users) {
                $pass = $users['password'];
                $verify_pass = password_verify($currentpassword, $pass);
                if ($verify_pass) {
                    if ($currentpassword == $newpassword) {
                        $session->setFlashdata('msg', "New password can't be the same as current password");
                        return redirect()->to(base_url('/serve'));
                    } else {
                        $model2 = new Editpage();
                        $data = array(
                            'password' => password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT)
                        );
                        $model2->updatePassword($data, $user_id);
                        $session->setFlashdata('msg', "Password changed!");
                        return redirect()->to(base_url('/serve'));
                    }
                } else {
                    $session->setFlashdata('msg', "Wrong current password!");
                    return redirect()->to(base_url('/serve'));
                }
            }
        } else {
            return redirect()->to(base_url('/serve'))->withInput();
        }
    }

    public function password6()
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
            $users = $model->where('user_id', $user_id)->first();
            if ($users) {
                $pass = $users['password'];
                $verify_pass = password_verify($currentpassword, $pass);
                if ($verify_pass) {
                    if ($currentpassword == $newpassword) {
                        $session->setFlashdata('msg', "New password can't be the same as current password");
                        return redirect()->to(base_url('/activation'));
                    } else {
                        $model2 = new Editpage();
                        $data = array(
                            'password' => password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT)
                        );
                        $model2->updatePassword($data, $user_id);
                        $session->setFlashdata('msg', "Password changed!");
                        return redirect()->to(base_url('/activation'));
                    }
                } else {
                    $session->setFlashdata('msg', "Wrong current password!");
                    return redirect()->to(base_url('/activation'));
                }
            }
        } else {
            return redirect()->to(base_url('/activation'))->withInput();
        }
    }
}