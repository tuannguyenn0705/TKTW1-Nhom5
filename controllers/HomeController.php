<?php

class HomeController
{
    public function index()
    {
        $title = "Trang chủ ";
        $view = "home";
        require_once PATH_VIEW . 'main.php';
    }
    public function login()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST') {
            $taikhoan = new TaiKhoan();
            $check =$taikhoan->checkLogin($_POST['email'],$_POST['password']);
            if($check){
                 $_SESSION['success'][]= "Đăng nhập thành công";
                    header("location: ".BASE_URL );
                    exit();
            }else{
                 $_SESSION['error'][] = "Email đã tồn tại";
                header("location: ".BASE_URL ."?action=dangki");
                    exit();
            }
        }
        $title = "Trang đang nhập ";
        $view = "login";
        require_once PATH_VIEW . 'main.php';
    }
    public function dangki()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST') {
            if ($_POST['password'] == $_POST['confirm']) {
                $taikhoan = new TaiKhoan();
                $check = $taikhoan->checkEmail($_POST['email']);
                if (!$check) {
                    $taikhoan->dangki(
                        $_POST['email'],
                        $_POST['password'],

                    );
                    $_SESSION['success'][]= "Đăng nhập thành công";
                    header("location: ".BASE_URL ."?action=login");
                    exit();
                }
                $_SESSION['error'][] = "Email đã tồn tại";
                header("location: ".BASE_URL ."?action=dangki");
                    exit();
            }
            $_SESSION['error'][] = "Mật khấu phải trùng với Xác nhận mật khấu";
            header("location: ".BASE_URL ."?action=dangki");
                    exit();
        }
        $title = "Trang đăng kí ";
        $view = "dangki";
        require_once PATH_VIEW . 'main.php';
    }
}
