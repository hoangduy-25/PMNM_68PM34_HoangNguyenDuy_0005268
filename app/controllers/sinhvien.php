<?php
require_once '../app/core/controller.php';
class sinhvien extends Controller{

    public function index($limit = 5, $offset = 0, $search = ""){
        $limit = (int)$limit;
        $offset = (int)$offset;
        $search = trim($_GET['search'] ?? '');

        if ($limit <= 0) {
            $limit = 5;
        }

        if ($offset < 0) {
            $offset = 0;
        }

        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->paging($limit, $offset, $search);

        $sinhviens = $result['sinhviens'];
        $totalpage = $result['totalpage'];
        $currentPage = floor($offset / $limit) + 1;

        $this->view('layout/masterlayout', [
            'viewname' => 'sinhvien/index',
            'sinhviens' => $sinhviens,
            'title' => 'Danh sách sinh viên',
            'totalpage' => $totalpage,
            'limit' => $limit,
            'offset' => $offset,
            'currentPage' => $currentPage,
            'search' => $search
        ]);
    }
    
    public function create(){
        $this->view('sinhvien/create');
    }

    public function store(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $hoten = $_POST['hoten'] ??'';
            $gioitinh = $_POST['gioitinh'] ??'';
            $mssv = $_POST['mssv'] ??'';
            $malop = $_POST['malop'] ??'';
            $sinhvienModel = $this->model('sinhvienModel');
            $result = $sinhvienModel->create($hoten, $gioitinh, $mssv, $malop);
            if($result){
                echo "Thêm mới thành công";
            }else{
                echo "Thêm mới thất bại";
            }
        }
    }

    public function edit($id){
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhvien = $sinhvienModel->getById($id);
        $this->view('sinhvien/edit', ['sinhvien' => $sinhvien]);
    }

    public function update($id){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $hoten = $_POST['hoten'] ??'';
            $gioitinh = $_POST['gioitinh'] ??'';
            $mssv = $_POST['mssv'] ??'';
            $malop = $_POST['malop'] ??'';
            $sinhvienModel = $this->model('sinhvienModel');
            $result = $sinhvienModel->update($id, $hoten, $gioitinh, $mssv, $malop);
            if($result){
                echo "Cập nhật thành công";
            }else{
                echo "Cập nhật thất bại";
            }
        }
    }

    public function delete($id){
        $sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->delete($id);
        if($result){
            echo "Xóa thành công";
        }else{
            echo "Xóa thất bại";
        }
    }
}
?>