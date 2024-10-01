<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

// Kiểm tra id người dùng để xóa
if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $userModel->deleteUserById($id);//Delete existing user
}
// Chuyển đổi
header('location: list_users.php');
?>