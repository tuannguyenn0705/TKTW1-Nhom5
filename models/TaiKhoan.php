<?php 
class TaiKhoan{
    protected $conn;
    
    public function __construct()
    {
        $database = new BaseModel();
        $this->conn = $database->getConnection();
    }
    public function checkEmail($email){
        $sql = "SELECT * FROM TaiKhoan WHERE email = :email";
        $stmt = $this ->conn->prepare($sql);
        $stmt->execute([
            ':email'=>$email]);
        return$stmt->fetch(PDO::FETCH_ASSOC);

    }
    public function dangki($email ,$password){
    $sql = "INSERT INTO `TaiKhoan`(`Email`, `Password`) VALUES (:email, :password)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        'email' => $email,
        'password' => $password,
    ]);
    return $stmt->rowCount(); // số dòng được thêm, không dùng fetch cho INSERT
}
public function checkLogin($email, $password) {
    // Viết đúng cú pháp SQL, không có khoảng trắng sau dấu :
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    
    // Chuẩn bị câu lệnh
    $stmt = $this->conn->prepare($sql);

    // Thực thi với mảng tham số, dùng => thay vì =
    $stmt->execute([
        'email' => $email,
        'password' => md5($password) // Mã hoá mật khẩu bằng md5
    ]);

    // Trả về kết quả
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}