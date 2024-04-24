<?php
include 'db_connection.php';

if(isset($_POST['register'])){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password=$_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql_check_email = "SELECT * FROM admin WHERE email='$email'";
    $result_check_email = mysqli_query($conn, $sql_check_email);

    if (mysqli_num_rows($result_check_email) > 0) {
        echo "Email already exists. Please use a different email.";
    } else {
        $sql = "INSERT INTO admin (full_name, email, password) VALUES ('$full_name', '$email', '$hashed_password')";
        if (mysqli_query($conn, $sql)) {
            header('location:login.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التسجيل</title>
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
        <h2><i class="fas fa-user-plus"></i> التسجيل</h2>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="full_name" placeholder="الاسم الكامل" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="كلمة المرور" required>
            </div>
            <button type="submit" class="btn btn-primary" name="register"><i class="fas fa-user-plus"></i> التسجيل</button>
        </form>
    </div>
</body>
</html>
