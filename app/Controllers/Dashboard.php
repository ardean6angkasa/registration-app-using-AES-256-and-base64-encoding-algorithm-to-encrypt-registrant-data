<?php namespace App\Controllers;
use App\Models\FormPay;
use App\Models\UserModel;
use App\Models\Pendaftar;
use App\Models\FormReg;
use CodeIgniter\Controller;


class Dashboard extends Controller
{
  
    public function index()
    {
        if(! session()->get('logged_in')){
            return redirect()->to(base_url('/login')); 
        }
        $model = new FormReg();
        $model2 = new FormPay();
        $model3 = new UserModel();
        $model4 = new Pendaftar();
        $jumlah_registrant=  $model->countAllResults();
        $jumlah_receipt=  $model2->countAllResults();
        $registrant = $model3->select('COUNT(users.user_id) AS jumlah, users.status AS kategori')->groupBy('users.status')->get();
        $detail2 = $model4->select('YEAR(date_created) AS jenis, COUNT(id) AS jumlah')->groupBy('YEAR(date_created)')->get();
        $data = [
            'jumlah_registrant' => $jumlah_registrant,
            'jumlah_receipt' => $jumlah_receipt,
            'registrant' => $registrant,
            'validation' => \Config\Services::validation(),
            'detail2' => $detail2
            ];
        echo view('/welcome_message', $data);
 	}
   
}