<?php
require_once '../app/core/controller.php';
class sinhvien extends Controller{

    public function index(){
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhviens = $sinhvienModel->getAllSinhvien();
        $this->view('sinhvien/index', ['sinhviens' => $sinhviens]);
    }

    public function create(){
        $this->view('sinhvien/create');
    }
}
?>