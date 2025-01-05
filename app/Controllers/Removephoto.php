<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Editpage;

class Removephoto extends Controller
{
    public function index()
    { 
                $model = new Editpage();
                $user_id = session()->get('user_id');
                $check = session()->get('email');
                $data = array(
                    'photo' => 'default.svg'
                    );
                    $data2 = array(
                        'picture' => 'default.svg'
                    );
                    $data4 = array(
                        'photo2'=> 'default.svg'
                    );
                    $model->updateData7($data4, $check);
                    $model->updateProfile2($data, $user_id);
                    $model->updateData3($data2, $check);
                    $newdata = [
                            'photo' => 'default.svg'
                    ];
                    session()->set($newdata);
                    session()->setFlashdata('msg', "Your profile has successfully been updated");
                    return redirect()->to(base_url('/dashboard'));  
    }

    public function remove1()
    { 
                $model = new Editpage();
                $user_id = session()->get('user_id');
                $check = session()->get('email');
                $data = array(
                    'photo' => 'default.svg'
                    );
                    $data2 = array(
                        'picture' => 'default.svg'
                    );
                    $data4 = array(
                        'photo2'=> 'default.svg'
                    );
                    $model->updateData7($data4, $check);
                    $model->updateProfile2($data, $user_id);
                    $model->updateData3($data2, $check);
                    $newdata = [
                            'photo' => 'default.svg'
                    ];
                    session()->set($newdata);
                    session()->setFlashdata('msg', "Your profile has successfully been updated");
                    return redirect()->to(base_url('/modalboot'));
    }

    public function remove2()
    { 
                $model = new Editpage();
                $user_id = session()->get('user_id');
                $check = session()->get('email');
                $data = array(
                    'photo' => 'default.svg'
                    );
                    $data2 = array(
                        'picture' => 'default.svg'
                    );
                    $data4 = array(
                        'photo2'=> 'default.svg'
                    );
                    $model->updateData7($data4, $check);
                    $model->updateProfile2($data, $user_id);
                    $model->updateData3($data2, $check);
                    $newdata = [
                            'photo' => 'default.svg'
                    ];
                    session()->set($newdata);
                    session()->setFlashdata('msg', "Your profile has successfully been updated");
                    return redirect()->to(base_url('/latihan'));
    }

    public function remove4()
    { 
                $model = new Editpage();
                $user_id = session()->get('user_id');
                $check = session()->get('email');
                $data = array(
                    'photo' => 'default.svg'
                    );
                    $data2 = array(
                        'picture' => 'default.svg'
                    );
                    $data4 = array(
                        'photo2'=> 'default.svg'
                    );
                    $model->updateData7($data4, $check);
                    $model->updateProfile2($data, $user_id);
                    $model->updateData3($data2, $check);
                    $newdata = [
                            'photo' => 'default.svg'
                    ];
                    session()->set($newdata);
                    session()->setFlashdata('msg', "Your profile has successfully been updated");
                    return redirect()->to(base_url('/addons'));
    }

    public function remove5()
    { 
                $model = new Editpage();
                $user_id = session()->get('user_id');
                $check = session()->get('email');
                $data = array(
                    'photo' => 'default.svg'
                    );
                    $data2 = array(
                        'picture' => 'default.svg'
                    );
                    $data4 = array(
                        'photo2'=> 'default.svg'
                    );
                    $model->updateData7($data4, $check);
                    $model->updateProfile2($data, $user_id);
                    $model->updateData3($data2, $check);
                    $newdata = [
                            'photo' => 'default.svg'
                    ];
                    session()->set($newdata);
                    session()->setFlashdata('msg', "Your profile has successfully been updated");
                    return redirect()->to(base_url('/serve'));
    }

    public function remove6()
    { 
                $model = new Editpage();
                $user_id = session()->get('user_id');
                $check = session()->get('email');
                $data = array(
                    'photo' => 'default.svg'
                    );
                    $data2 = array(
                        'picture' => 'default.svg'
                    );
                    $data4 = array(
                        'photo2'=> 'default.svg'
                    );
                    $model->updateData7($data4, $check);
                    $model->updateProfile2($data, $user_id);
                    $model->updateData3($data2, $check);
                    $newdata = [
                            'photo' => 'default.svg'
                    ];
                    session()->set($newdata);
                    session()->setFlashdata('msg', "Your profile has successfully been updated");
                    return redirect()->to(base_url('/activation'));
    }
}