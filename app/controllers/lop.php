<?php
require_once '../app/core/controller.php';
class lop extends Controller{

    public function index($limit = 5, $offset = 0, $search = ""){
        $limit = (int)$limit;
        $offset = (int)$offset;
        $search = trim($_GET['search'] ?? $search);
        $sort = $_GET['sort'] ?? 'id';
        $dir = $_GET['dir'] ?? 'ASC';

        if ($limit <= 0) $limit = 5;
        if ($offset < 0) $offset = 0;

        $lopModel = $this->model('lopModel');
        $result = $lopModel->paging($limit, $offset, $search, $sort, $dir);

        $this->view('layout/masterlayout', [
            'viewname' => 'lop/index',
            'lops' => $result['lops'],
            'title' => 'Danh sách lớp',
            'totalpage' => $result['totalpage'],
            'limit' => $limit,
            'offset' => $offset,
            'currentPage' => floor($offset / $limit) + 1,
            'search' => $search,
            'sort' => $sort,
            'dir' => $dir
        ]);
    }
    public function create(){
        $this->view('lop/create');
    }

    public function store(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $malop = trim($_POST['malop'] ?? '');
            $tenlop = trim($_POST['tenlop'] ?? '');
            $ghichu = trim($_POST['ghichu'] ?? '');

            $lopModel = $this->model('lopModel');
            $result = $lopModel->create($malop, $tenlop, $ghichu);

            if($result === true){
                header("Location: /lop/index/");
                exit();
            }

            if($result === "duplicate_malop"){
                echo "Mã lớp đã tồn tại. Vui lòng nhập mã lớp khác.";
                return;
            }

            echo "Thêm mới thất bại";
        }
    }

    public function edit($id){
        $lopModel = $this->model('lopModel');
        $lop = $lopModel->getById($id);
        $this->view('lop/edit', ['lop' => $lop]);
    }

    public function update($id){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $malop = $_POST['malop'] ??'';
            $tenlop = $_POST['tenlop'] ??'';
            $ghichu = $_POST['ghichu'] ??'';
            $lopModel = $this->model('lopModel');
            $result = $lopModel->update($id, $malop, $tenlop, $ghichu);
            if($result){
                echo "Cập nhật thành công";
            }else{
                echo "Cập nhật thất bại";
            }
        }
    }

    public function delete($id){
        $lopModel = $this->model('lopModel');
        $result = $lopModel->delete($id);
        if($result){
            echo "Xóa thành công";
        }else{
            echo "Xóa thất bại";
        }
    }
}
?>