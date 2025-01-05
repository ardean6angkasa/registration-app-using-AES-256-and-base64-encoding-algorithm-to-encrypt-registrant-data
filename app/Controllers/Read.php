<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\FormReg;
use App\Models\FormPay;
use App\Models\FormCust;
use App\Models\Information;

class Read extends Controller
{
  
    public function index3($id = null)
    {
        if(! session()->get('logged_in')){
            return redirect()->to(base_url('/login')); 
        }
        $model = new Information();
        $data = [
            'encrypter' => \Config\Services::encrypter(),
            'validation' => \Config\Services::validation()
        ];
        $data['help_info'] = $model->where('id', $id)->first();
        echo view('/form_view3', $data);
    }
  
    public function index4($id = null)
    {
 
        $model = new Information();
        $data = [
            'encrypter' => \Config\Services::encrypter()
        ];
        $data['help_info'] = $model->where('id', $id)->first();
     
        echo view('/form_view4', $data);
    }

    public function index5($id = null)
    {
        if(! session()->get('logged_in2')){
            return redirect()->to(base_url('/login')); 
        }
        $model = new Information();
        $data = [
            'encrypter' => \Config\Services::encrypter()
        ];
        $data['help_info'] = $model->where('id', $id)->first();
    
        echo view('/form_view4', $data);
    }
    
    public function formpdf()
	{
        if(! session()->get('logged_in')){
            return redirect()->to(base_url('/login')); 
        }
        $model = new FormReg();
        $check=$this->request->getVar('search');
        if(isset($check)){
            $fetch=$this->request->getVar('keyword');
             session()->set('keyword01',$fetch);
        }else{
            $fetch = session()->get('keyword01');
        }
        $model->getProduct($fetch);
        $data = [
            'formulir_pendaftaran' => $model->getProduct()->getResult(),
            'encrypter' => \Config\Services::encrypter(),
            'formulir_pendaftaran'=>  $model->paginate(100000000000000, 'formulir_pendaftaran')
        ];
		echo view("/form1", $data);
	}
    public function form2()
	{
        if(! session()->get('logged_in')){
            return redirect()->to(base_url('/login')); 
        }
        $model = new FormPay();
        $check=$this->request->getVar('search');
        if(isset($check)){
            $fetch=$this->request->getVar('keyword');
             session()->set('keyword02',$fetch);
        }else{
            $fetch = session()->get('keyword02');
        }
        $model->getProduct($fetch);
        $data = [
            'pendaftaran' => $model->getProduct()->getResult(),
            'encrypter' => \Config\Services::encrypter(),
            'pendaftaran'=>  $model->paginate(100000000000000, 'pendaftaran')
        ];
		echo view("/form", $data);
	}
 
    public function form3()
	{
        if(! session()->get('logged_in')){
            return redirect()->to(base_url('/login')); 
        }
        $model = new FormCust();
        $check=$this->request->getVar('search');
        if(isset($check)){
            $fetch=$this->request->getVar('keyword');
             session()->set('keyword03',$fetch);
        }else{
            $fetch = session()->get('keyword03');
        }
        $model->getProduct($fetch);
        $data = [
            'customer_service' => $model->getProduct()->getResult(),
            'encrypter' => \Config\Services::encrypter(),
            'customer_service'=>  $model->paginate(100000000000000, 'customer_service')
        ];
		echo view("/formCS", $data);
	}
}