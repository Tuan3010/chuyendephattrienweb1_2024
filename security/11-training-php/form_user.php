<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();
//-------------------------
$user = NULL; //Add new user
$_id = NULL;
$error = '';

$secret_key = "my_secret_key"; // Khóa bí mật dùng để mã hóa/giải mã

function decryptId($encoded_id, $secret_key) {
    // Giải mã id
    $cipher = "AES-128-CTR";
    $options = 0;
    
    // Tách chuỗi mã hóa và iv
    list($encrypted_data, $iv) = explode("::", base64_decode($encoded_id), 2);
     
    // Giải mã để lấy lại id
    $decrypted_id = openssl_decrypt($encrypted_data, $cipher, $secret_key, $options, $iv);
    return $decrypted_id;
}

if (!empty($_GET['id'])) {

    $_id = decryptId($_GET['id'],$secret_key);
    echo $_id;
    $user = $userModel->findUserById($_id);

}
// 
if (!empty($_POST['submit'])) {

    $validateName = $_POST['name'];
    $validatePassword = $_POST['password'];
    // kiểm tra có id
    if (!empty($_id) && !empty($_POST['name']) && !empty($_POST['password']) ) {
        if (preg_match("/^[a-zA-Z0-9]{5,15}$/", $validateName) && preg_match("/^[a-zA-Z0-9~!@#$%^&*()]{5,15}$/", $validatePassword)) {
            $userModel->updateUser($_POST);
            header('location: list_users.php');
        } else {
            $error = 'Nhập thông tin hợp lệ (a-z, A-Z, 0-9)';
        }
    } else {
       $error = 'Yêu cầu nhập thông tin các trường đầy đủ ';
    }
    // kiểm tra ko có id thì thêm user mới
    if (empty($_id)) {
        if (!empty($_POST['name']) && !empty($_POST['password']) ) {
            if (preg_match("/^[a-zA-Z0-9]{5,15}$/", $validateName) && preg_match("/^[a-zA-Z0-9!@#$%^&*()\-+=?]{5,15}$/", $validatePassword)) {
                $userModel->insertUser($_POST);
                header('location: list_users.php');
            } else {
                $error = 'Nhập thông tin hợp lệ (a-z, A-Z, 0-9)';
            }
        } else {
           $error = 'Yêu cầu nhập thông tin các trường đầy đủ ';
        }
    }
    
}
//-----------------------------------
?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">

            <?php if ($user || !isset($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <?php echo '<p style= "color: red">'.$error.'</p>' ?>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $_id ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                        
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>