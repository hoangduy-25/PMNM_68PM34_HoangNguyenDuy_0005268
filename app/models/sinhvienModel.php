<?php
require_once '../app/core/DB.php';
class SinhvienModel{
    private $conn;

    public function __construct(){
        $this->conn = ConnectDB::Connect();
    }

    public function getAllSinhvien(){
        $query = "SELECT * FROM tbl_sinhviens";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($hoten, $gioitinh, $mssv, $malop){
        $query = "INSERT INTO tbl_sinhviens(hoten, gioitinh, mssv, malop) VALUES(:hoten, :gioitinh, :mssv, :malop)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindParam(':malop', $malop);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function paging($limit = 5, $offset = 0, $search = "", $sort = "id", $dir = "ASC"){
    $where = "";
    $searchValue = "%" . $search . "%";

    $allowedSort = [
        "id" => "sv.id",
        "mssv" => "sv.mssv",
        "hoten" => "sv.hoten"
    ];

    $orderBy = $allowedSort[$sort] ?? "sv.id";
    $dir = strtoupper($dir) === "DESC" ? "DESC" : "ASC";

    if (!empty($search)) {
        $where = "WHERE sv.hoten LIKE :search 
                  OR sv.mssv LIKE :search 
                  OR sv.malop LIKE :search 
                  OR l.tenlop LIKE :search";
    }

    $query = "
        SELECT sv.*, l.tenlop
        FROM tbl_sinhviens sv
        LEFT JOIN tbl_lops l ON sv.malop = l.malop
        $where
        ORDER BY $orderBy $dir
        LIMIT :limit OFFSET :offset
    ";

    $stmt = $this->conn->prepare($query);

    if (!empty($search)) {
        $stmt->bindParam(':search', $searchValue);
    }

    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $countQuery = "
        SELECT COUNT(*)
        FROM tbl_sinhviens sv
        LEFT JOIN tbl_lops l ON sv.malop = l.malop
        $where
    ";

    $countStmt = $this->conn->prepare($countQuery);

    if (!empty($search)) {
        $countStmt->bindParam(':search', $searchValue);
    }

    $countStmt->execute();
    $totalRecord = $countStmt->fetchColumn();

        return [
            "sinhviens" => $result,
            "totalpage" => ceil($totalRecord / $limit)
        ];
    }
    
    public function getById($id){
        $query = "SELECT * FROM tbl_sinhviens WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $hoten, $gioitinh, $mssv, $malop){
        $query = "UPDATE tbl_sinhviens SET hoten = :hoten, gioitinh = :gioitinh, mssv = :mssv, malop = :malop WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':hoten', $hoten);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':mssv', $mssv);
        $stmt->bindParam(':malop', $malop);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id){
        $query = "DELETE FROM tbl_sinhviens WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
}
?>