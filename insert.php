
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connection.php';

    $email = $_POST['email'];
    $numberpone = $_POST['numberpone'];
    $blood_type = $_POST['blood_type'];
    $Col=$_POST['College'];
    $m=$_POST['major'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $photo = $target_file;
        $sql = "INSERT INTO info (email, numberpone, photo, blood_type,College,major) VALUES ('$email', '$numberpone', '$photo', '$blood_type','$col','$m')";
        if (mysqli_query($conn, $sql)) {
?><script>alert("تم الاضافة بنجاح");</script>
<?php  
    mysqli_close($conn);

            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        
    
}
    } else {
        echo "خطا";
    }

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدخال وعرض البيانات</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .logo {
    width: 90px; /* Adjust as needed */
    height: 40px; /* This will maintain the aspect ratio */
    margin-right: 10px; /* Example margin */
    /* Add any other styling properties you need */
}

form{
    text-align:center;
}
</style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light " style=" background-color:#CB8C56;">
        <a class="navbar-brand" href="#">    
        <img src="uploads/kjhj.png" alt="imag logo" class="logo">
 </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
        <!--        <li class="nav-item active">
                    <a class="nav-link" href="#">الصفحة الرئيسية <span class="sr-only"></span></a>
                </li>
         
                    <li class="nav-item">
                    <a href="logout.php">تسجيل الخروج</a>
                </li>-->
            
              <li class="navbar-item">
                    <a  class="nav-link"  href="#"> عن الموقع</a>
                </li>
                
            </ul>
        </div>
    </nav>


    
    
    <div class="container mt-5">
        <div class="row justify-content-center">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
                <div class="card">

    <div class="container">
        <h2>إدخال البيانات</h2>
        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>البريد الإلكتروني:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label>رقم الهاتف:</label>
                <input type="tel" class="form-control" name="numberpone" required>
            </div>
            <div class="form-group">
                <label>الصورة:</label>
                <input type="file" class="form-control-file" name="photo" required>
            </div>
            <div class="form-group">
                <label>فصيلة الدم:</label>
                <input type="text" class="form-control" name="blood_type" required>
            </div>
            <div class="form-group">
                <label> الكلية:</label>
                <input type="text" class="form-control" name="College" required>
            </div>

            <div class="form-group">
                <label> التخصص:</label>
                <input type="text" class="form-control" name="major" required>
            </div>
      

            <button type="submit" class="btn btn-primary">إدخال</button>
        </form>
    </div></div>

</div>
<div class="col-md-3">
        </div>
        </div>
        <hr>
</div>
</div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

