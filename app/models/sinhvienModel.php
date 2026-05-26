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

    public function getSinhvienById($id){
        $query = "SELECT * FROM tbl_sinhviens WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>