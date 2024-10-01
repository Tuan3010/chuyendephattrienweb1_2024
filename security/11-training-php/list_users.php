<?php
// Start the session
session_start();

require_once 'models/UserModel.php';
$userModel = new UserModel();

$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
}

$users = $userModel->getUsers($params);


// Hàm xử lý tạo ra các kí tự chữ ngẫu
function encryptId($id, $secret_key) {
    
    // Mã hóa id
    $cipher = "AES-128-CTR"; // Thuật toán mã hóa
    $iv_length = openssl_cipher_iv_length($cipher); // Lấy độ dài IV yêu cầu
    $options = 0;
    $iv = openssl_random_pseudo_bytes($iv_length); // Tạo IV với độ dài chính xác 16 byte
    
    // Mã hóa id
    $encrypted_id = openssl_encrypt($id, $cipher, $secret_key, $options, $iv);
    
    // Kết hợp mã hóa và iv để giải mã sau này
    return base64_encode($encrypted_id . "::" . $iv);
}

$secret_key = "my_secret_key"; // Khóa bí mật dùng để mã hóa/giải mã



?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">
        <?php if (!empty($users)) {?>
            <div class="alert alert-warning" role="alert">
                List of users! <br>
                Hacker: http://php.local/list_users.php?keyword=ASDF%25%22%3BTRUNCATE+banks%3B%23%23
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) {?>
                        <tr>
                            <th scope="row"><?php echo $user['id']?></th>
                            <td>
                                <?php echo $user['name']?>
                            </td>
                            <td>
                                <?php echo $user['fullname']?>
                            </td>
                            <td>
                                <?php echo $user['type']?>
                            </td>
                            <td>
                                <a href="form_user.php?id=<?php echo $result = encryptId($user['id'],$secret_key) ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_user.php?id=<?php echo $user['id'] ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <form action="delete_user.php" method="post">
                                    <input type="hidden" name='id' value='<?php echo $user['id'] ?>'>
                                    <button type='submit'> <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i> </button>
                                </form>
                                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }else { ?>
            <div class="alert alert-dark" role="alert">
                This is a dark alert—check it out!
            </div>
        <?php } ?>
    </div>
</body>
</html>