<?php
require_once '../app/core/controller.php';
class sinhvien extends Controller{

    public function index($limit = 5, $offset = 0, $search=""){
        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->paging($limit, $offset, $search);
        $sinhviens = $result['sinhviens'];
        $totalpage = $result['totalpage'];
        $this->view('layout/masterlayout', ['viewname' => 'sinhvien/index', 'sinhviens' => $sinhviens, 'title' => 'Danh sách sinh viên', 'totalpage'=>$totalpage]);
    }

    public function create(){
        $this->view('sinhvien/create');
    }

    public function store(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $hoten = $_POST['hoten'] ??'';
            $gioitinh = $_POST['gioitinh'] ??'';
            $mssv = $_POST['mssv'] ??'';
            $sinhvienModel = $this->model('sinhvienModel');
            $result = $sinhvienModel->create($hoten, $gioitinh, $mssv);
            if($result){
                echo "Thêm mới thành công";
            }else{
                echo "Thêm mới thất bại";
            }
        }
    }

    
}
?>