<?php

 session_start();
 if(isset($_SESSION['id_admin'])){
    header('location:index.php');

 }else {
    echo"";
 }
 

?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 400px;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php

if(isset($_POST['login'])){
    include 'db_connection.php';

    $username = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE email='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])) {
            $_SESSION['admin_loggedin'] = true;
            $_SESSION['id_admin'] = $row['id_admin'];
   header('location:index.php');
        } else {
            echo "<br><div class='alert alert-danger' role='alert'>خطأ في اسم البريد الإلكتروني أو كلمة المرور</div>";
        }
    } else {
        echo "<br><div class='alert alert-danger' role='alert'>خطأ في اسم البريد الإلكتروني أو كلمة المرور</div>";
    }
}
?>

        <h2><i class="fas fa-sign-in-alt"></i> تسجيل الدخول</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="الايميل" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="كلمة السر" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login"><i class="fas fa-sign-in-alt"></i> دخول</button>
        </form>
        <a href="register.php">التسجيل</a>
    </div>
</body>
</html>
