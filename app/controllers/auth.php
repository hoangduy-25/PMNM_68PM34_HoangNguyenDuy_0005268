<?php
class auth{
    public $user = [
        "admin" => "123456",
        "user" => "654321"
    ];
    public function login(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"] ?? '';
            $password = $_POST["password"] ?? '';
            if (isset($this->user[$username]) && $this->user[$username] === $password) {
                $_SESSION["username"] = $username;
                header("Location: /home/index/");
                exit();
            } else {
                header("Location: /home/login/");
                exit();
            }
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        header("Location: /home/login/");
        exit();
    }
}
?>