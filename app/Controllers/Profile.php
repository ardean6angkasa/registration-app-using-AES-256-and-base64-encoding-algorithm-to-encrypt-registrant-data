<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Editpage;
use App\Models\Cserve;
use App\Models\Datatablesmodal;
use App\Models\Datareceipt;
use App\Models\FormPay;
use App\Models\Helpcent;
use App\Models\Icon;
use App\Models\UserScore;
use App\Models\Pendaftar;
use App\Models\UserModel;
use App\Models\FormReg;
class Profile extends Controller
{
public function index()
{
    $session = session();
    $check = $session->get('email');
    $check2 = $session->get('username');
    if($check2==$this->request->getPost('username2')){
        $rules_user = 'required|min_length[7]|max_length[50]|alpha_numeric_punct';
    }else{
        $rules_user = 'is_unique[users.username]|required|min_length[7]|max_length[50]|alpha_numeric_punct';
    }
    $rules = [
        'username2' 		=> [
            'rules'=>$rules_user,
            'errors'=>[
                'is_unique'=>'The username you were trying to use before, has already been taken',
                'min_length'=>'At least 7 characters',
                'max_length'=>'Maximum 50 characters',
                'required'=>"Don't forget to fill this",
                'alpha_numeric_punct'=>'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters' 
            ]
            ],
        'file' => [
            'rules'=> 'mime_in[file,image/jpg,image/jpeg,image/png]|max_size[file,2024]|is_image[file]',
            'errors'=>[
                'max_size' => 'Size is too big, max size 2 mb',
                'is_image'=> 'The file you were uploaded is not an image',
                'mime_in'=> 'Must jpg/jpeg/png'
            ]
        ]
            ];
            if($this->validate($rules)){
                $model = new Editpage();
                $encrypter = \Config\Services::encrypter();
                $user_id = $this->request->getPost('user_id');
                $file = $this->request->getFile('file');
                if($file->getError()==4){
                    $data = array(
                        'username'        => $this->request->getPost('username2')
                        );
                        $data2 = array(
                            'author'        => $this->request->getPost('username2')
                        );
                        $data4 = array(
                            'identity2'=> base64_encode($encrypter->encrypt($this->request->getPost('username2')))
                        );
                        $model->updateData7($data4, $check);
                        $model->updateProfile1($data, $user_id);
                        $model->updateData3($data2, $check);
                        $newdata = [
                                'username'        => $this->request->getPost('username2')
                        ];
                        $session->set($newdata);
                        $session->setFlashdata('msg', "Your profile has successfully been updated");
                        return redirect()->to(base_url('/dashboard'));
                }else{
                $filename=$file->getRandomName();     
                $file->move(ROOTPATH.'/public/img',$filename);
                $data = array(
                    'photo' => $filename,
                    'username'        => $this->request->getPost('username2')
                    );
                    $data2 = array(
                        'author'        => $this->request->getPost('username2'),
                        'picture' => $filename
                    );
                    $data4 = array(
                        'photo2'=> $filename,
                        'identity2'=> base64_encode($encrypter->encrypt($this->request->getPost('username2')))
                    );
                    $model->updateData7($data4, $check);
                    $model->updateProfile2($data, $user_id);
                    $model->updateData3($data2, $check);
                    $newdata = [
                            'photo' => $filename,
                            'username'        => $this->request->getPost('username2')
                    ];
                    $session->set($newdata);
                    $session->setFlashdata('msg', "Your profile has successfully been updated");
                    return redirect()->to(base_url('/dashboard'));   
        }
                }else{
                return redirect()->to(base_url('/dashboard'))->withInput();
            }       
        }

        public function editprofile()
        {
            $session = session();
            $check = $session->get('email');
            $check2 = $session->get('username');
            if($check2==$this->request->getPost('username2')){
                $rules_user = 'required|min_length[7]|max_length[50]|alpha_numeric_punct';
            }else{
                $rules_user = 'is_unique[users.username]|required|min_length[7]|max_length[50]|alpha_numeric_punct';
            }
            $rules = [
                'username2' 		=> [
                    'rules'=>$rules_user,
                    'errors'=>[
                        'is_unique'=>'The username you were trying to use before, has already been taken',
                        'min_length'=>'At least 7 characters',
                        'max_length'=>'Maximum 50 characters',
                        'required'=>"Don't forget to fill this",
                        'alpha_numeric_punct'=>'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters' 
                    ]
                    ],
                'pict' => [
                    'rules'=> 'mime_in[pict,image/jpg,image/jpeg,image/png]|max_size[pict,2024]|is_image[pict]',
                    'errors'=>[
                        'max_size' => 'Size is too big, max size 2 mb',
                        'is_image'=> 'The file you were uploaded is not an image',
                        'mime_in'=> 'Must jpg/jpeg/png'
                    ]
                ]
                    ];
                    if($this->validate($rules)){
                        $model = new Editpage();
                        $encrypter = \Config\Services::encrypter();
                        $user_id = $this->request->getPost('user_id');
                        $file = $this->request->getFile('pict');
                        if($file->getError()==4){
                            $data = array(
                                'username'        => $this->request->getPost('username2')
                                );
                                $data2 = array(
                                    'author'        => $this->request->getPost('username2')
                                );
                                $data4 = array(
                                    'identity2'=> base64_encode($encrypter->encrypt($this->request->getPost('username2')))
                                );
                                $model->updateData7($data4, $check);
                                $model->updateProfile1($data, $user_id);
                                $model->updateData3($data2, $check);
                                    $newdata = [
                                        'username'        => $this->request->getPost('username2')
                                ];
                                $session->set($newdata);
                                $session->setFlashdata('msg', "Your profile has successfully been updated");
                                return redirect()->to(base_url('/modalboot'));
                        }else{
                            $filename=$file->getRandomName(); 
                                $file->move(ROOTPATH.'/public/img',$filename);
                                $data = array(
                                    'photo' => $filename,
                                    'username'        => $this->request->getPost('username2')
                                    );
                                    $data2 = array(
                                        'author'        => $this->request->getPost('username2'),
                                        'picture' => $filename
                                    );
                                    $data4 = array(
                                        'photo2'=> $filename,
                                        'identity2'=> base64_encode($encrypter->encrypt($this->request->getPost('username2')))
                                    );
                                    $model->updateData7($data4, $check);
                                    $model->updateProfile2($data, $user_id);
                                    $model->updateData3($data2, $check);
                                    $newdata = [
                                            'photo' => $filename,
                                            'username'        => $this->request->getPost('username2')
                                    ];
                                    $session->set($newdata);
                                    $session->setFlashdata('msg', "Your profile has successfully been updated");
                                    return redirect()->to(base_url('/modalboot'));
                    }
                        }else{
                        return redirect()->to(base_url('/modalboot'))->withInput();
                    }       
                }

                public function editprofile2()
                {
                    $session = session();
                    $check = $session->get('email');
                    $check2 = $session->get('username');
                    if($check2==$this->request->getPost('username2')){
                        $rules_user = 'required|min_length[7]|max_length[50]|alpha_numeric_punct';
                    }else{
                        $rules_user = 'is_unique[users.username]|required|min_length[7]|max_length[50]|alpha_numeric_punct';
                    }
                    $rules = [
                        'username2' 		=> [
                            'rules'=>$rules_user,
                            'errors'=>[
                                'is_unique'=>'The username you were trying to use before, has already been taken',
                                'min_length'=>'At least 7 characters',
                                'max_length'=>'Maximum 50 characters',
                                'required'=>"Don't forget to fill this",
                                'alpha_numeric_punct'=>'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters' 
                            ]
                            ],
                        'pict' => [
                            'rules'=> 'mime_in[pict,image/jpg,image/jpeg,image/png]|max_size[pict,2024]|is_image[pict]',
                            'errors'=>[
                                'max_size' => 'Size is too big, max size 2 mb',
                                'is_image'=> 'The file you were uploaded is not an image',
                                'mime_in'=> 'Must jpg/jpeg/png'
                            ]
                        ]
                            ];
                            if($this->validate($rules)){
                                $model = new Editpage();
                                $encrypter = \Config\Services::encrypter();
                                $user_id = $this->request->getPost('user_id');
                                $file = $this->request->getFile('pict');
                                if($file->getError()==4){
                                    $data = array(
                                        'username'        => $this->request->getPost('username2')
                                        );
                                        $data2 = array(
                                            'author'        => $this->request->getPost('username2')
                                        );
                                        $data4 = array(
                                            'identity2'=> base64_encode($encrypter->encrypt($this->request->getPost('username2')))
                                        );
                                        $model->updateData7($data4, $check);
                                        $model->updateProfile1($data, $user_id);
                                        $model->updateData3($data2, $check);
                                            $newdata = [
                                                'username'        => $this->request->getPost('username2')
                                        ];
                                        $session->set($newdata);
                                        $session->setFlashdata('msg', "Your profile has successfully been updated");
                                        return redirect()->to(base_url('/latihan'));
                                    }else{
                                        $filename=$file->getRandomName();
                                        $file->move(ROOTPATH.'/public/img',$filename);
                                        $data = array(
                                            'photo' => $filename,
                                            'username'        => $this->request->getPost('username2')
                                            );
                                            $data2 = array(
                                                'author'        => $this->request->getPost('username2'),
                                                'picture' => $filename
                                            );
                                            $data4 = array(
                                                'photo2'=> $filename,
                                                'identity2'=> base64_encode($encrypter->encrypt($this->request->getPost('username2')))
                                            );
                                            $model->updateData7($data4, $check);
                                            $model->updateProfile2($data, $user_id);
                                            $model->updateData3($data2, $check);
                                            $newdata = [
                                                    'photo' => $filename,
                                                    'username'        => $this->request->getPost('username2')
                                            ];
                                            $session->set($newdata);
                                            $session->setFlashdata('msg', "Your profile has successfully been updated");
                                            return redirect()->to(base_url('/latihan'));
                                    }
                                }else{
                                return redirect()->to(base_url('/latihan'))->withInput();
                            }       
                        }
                
                                    public function editprofile4()
                                    {
                                        $session = session();
                                        $check = $session->get('email');
                                        $check2 = $session->get('username');
                                        if($check2==$this->request->getPost('username2')){
                                            $rules_user = 'required|min_length[7]|max_length[50]|alpha_numeric_punct';
                                        }else{
                                            $rules_user = 'is_unique[users.username]|required|min_length[7]|max_length[50]|alpha_numeric_punct';
                                        }
                                        $rules = [
                                            'username2' 		=> [
                                                'rules'=>$rules_user,
                                                'errors'=>[
                                                    'is_unique'=>'The username you were trying to use before, has already been taken',
                                                    'min_length'=>'At least 7 characters',
                                                    'max_length'=>'Maximum 50 characters',
                                                    'required'=>"Don't forget to fill this",
                                                    'alpha_numeric_punct'=>'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters' 
                                                ]
                                                ],
                                            'pict' => [
                                                'rules'=> 'mime_in[pict,image/jpg,image/jpeg,image/png]|max_size[pict,2024]|is_image[pict]',
                                                'errors'=>[
                                                    'max_size' => 'Size is too big, max size 2 mb',
                                                    'is_image'=> 'The file you were uploaded is not an image',
                                                    'mime_in'=> 'Must jpg/jpeg/png'
                                                ]
                                            ]
                                                ];
                                                if($this->validate($rules)){
                                                    $model = new Editpage();
                                                    $encrypter = \Config\Services::encrypter();
                                                    $user_id = $this->request->getPost('user_id');
                                                    $file = $this->request->getFile('pict');
                                                    if($file->getError()==4){
                                                        $data = array(
                                                            'username'        => $this->request->getPost('username2')
                                                            );
                                                            $data2 = array(
                                                                'author'        => $this->request->getPost('username2')
                                                            );
                                                            $data4 = array(
                                                                'identity2'=> base64_encode($encrypter->encrypt($this->request->getPost('username2')))
                                                            );
                                                            $model->updateData7($data4, $check);
                                                            $model->updateProfile1($data, $user_id);
                                                            $model->updateData3($data2, $check);
                                                                $newdata = [
                                                                    'username'        => $this->request->getPost('username2')
                                                            ];
                                                            
                                                            $session->set($newdata);
                                                            $session->setFlashdata('msg', "Your profile has successfully been updated");
                                                            return redirect()->to(base_url('/addons'));
                                                        }else{
                                                            $filename=$file->getRandomName();
                                                            $file->move(ROOTPATH.'/public/img', $filename);
                                                            $data = array(
                                                                'photo' => $filename,
                                                                'username'        => $this->request->getPost('username2')
                                                                );
                                                                $data2 = array(
                                                                    'author'        => $this->request->getPost('username2'),
                                                                    'picture' => $filename
                                                                );
                                                                $data4 = array(
                                                                    'photo2'=> $filename,
                                                                    'identity2'=> base64_encode($encrypter->encrypt($this->request->getPost('username2')))
                                                                );
                                                                $model->updateData7($data4, $check);
                                                                $model->updateProfile2($data, $user_id);
                                                                $model->updateData3($data2, $check);
                                                                $newdata = [
                                                                        'photo' => $filename,
                                                                        'username'        => $this->request->getPost('username2')
                                                                ];
                                                                $session->set($newdata);
                                                                $session->setFlashdata('msg', "Your profile has successfully been updated");
                                                                return redirect()->to(base_url('/addons'));
                                                        }
                                                 }else{
                                                    return redirect()->to(base_url('/addons'))->withInput();
                                                }       
                                            }
                                            public function editprofile5()
                                            {
                                                $session = session();
                                                $check = $session->get('email');
                                                $check2 = $session->get('username');
                                                if($check2==$this->request->getPost('username2')){
                                                    $rules_user = 'required|min_length[7]|max_length[50]|alpha_numeric_punct';
                                                }else{
                                                    $rules_user = 'is_unique[users.username]|required|min_length[7]|max_length[50]|alpha_numeric_punct';
                                                }
                                                $rules = [
                                                    'username2' 		=> [
                                                        'rules'=>$rules_user,
                                                        'errors'=>[
                                                            'is_unique'=>'The username you were trying to use before, has already been taken',
                                                            'min_length'=>'At least 7 characters',
                                                            'max_length'=>'Maximum 50 characters',
                                                            'required'=>"Don't forget to fill this",
                                                            'alpha_numeric_punct'=>'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters' 
                                                        ]
                                                        ],
                                                    'pict' => [
                                                        'rules'=> 'mime_in[pict,image/jpg,image/jpeg,image/png]|max_size[pict,2024]|is_image[pict]',
                                                        'errors'=>[
                                                            'max_size' => 'Size is too big, max size 2 mb',
                                                            'is_image'=> 'The file you were uploaded is not an image',
                                                            'mime_in'=> 'Must jpg/jpeg/png'
                                                        ]
                                                    ]
                                                        ];
                                                        if($this->validate($rules)){
                                                            $model = new Editpage();
                                                            $encrypter = \Config\Services::encrypter();
                                                            $user_id = $this->request->getPost('user_id');
                                                            $file = $this->request->getFile('pict');
                                                            if($file->getError()==4){
                                                                $data = array(
                                                                    'username'        => $this->request->getPost('username2')
                                                                    );
                                                                    $data2 = array(
                                                                        'author'        => $this->request->getPost('username2')
                                                                    );
                                                                    $data4 = array(
                                                                        'identity2'=> base64_encode($encrypter->encrypt($this->request->getPost('username2')))
                                                                    );
                                                                    $model->updateData7($data4, $check);
                                                                  $model->updateProfile1($data, $user_id);
                                                                  $model->updateData3($data2, $check);
                                                                        $newdata = [
                                                                            'username'        => $this->request->getPost('username2')
                                                                    ];
                                                                    
                                                                    $session->set($newdata);
                                                                    $session->setFlashdata('msg', "Your profile has successfully been updated");
                                                                    return redirect()->to(base_url('/serve'));
                                                                }else{
                                                                    $filename=$file->getRandomName();
                                                                    $file->move(ROOTPATH.'/public/img',$filename);
                                                                    $data = array(
                                                                        'photo' =>  $filename,
                                                                        'username'        => $this->request->getPost('username2')
                                                                        );
                                                                        $data2 = array(
                                                                            'author'        => $this->request->getPost('username2'),
                                                                            'picture' =>  $filename
                                                                        );
                                                                        $data4 = array(
                                                                            'photo2'=>  $filename,
                                                                            'identity2'=> base64_encode($encrypter->encrypt($this->request->getPost('username2')))
                                                                        );
                                                                        $model->updateData7($data4, $check);
                                                                       $model->updateProfile2($data, $user_id);
                                                                       $model->updateData3($data2, $check);
                                                                        $newdata = [
                                                                                'photo' =>  $filename,
                                                                                'username'        => $this->request->getPost('username2')
                                                                        ];
                                                                        $session->set($newdata);
                                                                        $session->setFlashdata('msg', "Your profile has successfully been updated");
                                                                        return redirect()->to(base_url('/serve'));
                                                                }
                                                         }else{
                                                            return redirect()->to(base_url('/serve'))->withInput();
                                                        }       
                                                    }

                                                    public function editprofile6()
                                                    {
                                                        $session = session();
                                                        $check = $session->get('email');
                        $check2 = $session->get('username');
                        if($check2==$this->request->getPost('username2')){
                            $rules_user = 'required|min_length[7]|max_length[50]|alpha_numeric_punct';
                        }else{
                            $rules_user = 'is_unique[users.username]|required|min_length[7]|max_length[50]|alpha_numeric_punct';
                        }
                        $rules = [
                            'username2' 		=> [
                                'rules'=>$rules_user,
                                'errors'=>[
                                    'is_unique'=>'The username you were trying to use before, has already been taken',
                                    'min_length'=>'At least 7 characters',
                                    'max_length'=>'Maximum 50 characters',
                                    'required'=>"Don't forget to fill this",
                                    'alpha_numeric_punct'=>'This field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters' 
                                ]
                                ],
                                                            'pict' => [
                                                                'rules'=> 'mime_in[pict,image/jpg,image/jpeg,image/png]|max_size[pict,2024]|is_image[pict]',
                                                                'errors'=>[
                                                                    'max_size' => 'Size is too big, max size 2 MB',
                                                                    'is_image'=> 'The file you were uploaded is not an image',
                                                                    'mime_in'=> 'Must jpg/jpeg/png'
                                                                ]
                                                            ]
                                                                ];
                                                                if($this->validate($rules)){
                                                                    $model = new Editpage();
                                                                    $encrypter = \Config\Services::encrypter();
                                                                    $user_id = $this->request->getPost('user_id');
                                                                    $file = $this->request->getFile('pict');
                                                                    if($file->getError()==4){
                                                                        $data = array(
                                                                            'username'        => $this->request->getPost('username2')
                                                                            );
                                                                            $data2 = array(
                                                                                'author'        => $this->request->getPost('username2')
                                                                            );
                                                                            $data4 = array(
                                                                                'identity2'=> base64_encode($encrypter->encrypt($this->request->getPost('username2')))
                                                                            );
                                                                            $model->updateData7($data4, $check);
                                                                          $model->updateProfile1($data, $user_id);
                                                                          $model->updateData3($data2, $check);
                                                                                $newdata = [
                                                                                    'username'        => $this->request->getPost('username2')
                                                                            ];
                                                                            $session->set($newdata);
                                                                            $session->setFlashdata('msg', "Your profile has successfully been updated");
                                                                            return redirect()->to(base_url('/activation'));
                                                                        }else{
                                                                            $filename=$file->getRandomName();
                                                                            $file->move(ROOTPATH.'/public/img',$filename);
                                                                            $data = array(
                                                                                'photo' => $filename,
                                                                                'username'        => $this->request->getPost('username2')
                                                                                );
                                                                                $data2 = array(
                                                                                    'author'        => $this->request->getPost('username2'),
                                                                                    'picture' => $filename
                                                                                );
                                                                                $data4 = array(
                                                                                    'photo2'=> $filename,
                                                                                    'identity2'=> base64_encode($encrypter->encrypt($this->request->getPost('username2')))
                                                                                );
                                                                                $model->updateData7($data4, $check);
                                                                             $model->updateProfile2($data, $user_id);
                                                                             $model->updateData3($data2, $check);
                                                                                $newdata = [
                                                                                        'photo' => $filename,
                                                                                        'username'        => $this->request->getPost('username2')
                                                                                ];
                                                                                $session->set($newdata);
                                                                                $session->setFlashdata('msg', "Your profile has successfully been updated");
                                                                                return redirect()->to(base_url('/activation'));
                                                                        }
                                                                 }else{
                                                                    return redirect()->to(base_url('/activation'))->withInput();
                                                                }       
                                                            }
}