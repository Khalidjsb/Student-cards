<?php
 session_start();
 if(!isset($_SESSION['id_admin'])){
    header('location:login.php');

 }else {

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
    width: 90px; 
    height: 40px; 
    margin-right: 10px; 
   
}
.navbar-brand, .navbar-nav .nav-link {
            color: #ffffff !important;
                        text-align:right;
  background-color:#CB8C56;color:white;
  margin:5px;
        }
        .navbar-nav .nav-link {
            padding: 8px 15px;
            transition: all 0.3s ease;
                        text-align:right;
                        background-color: #abaaa4;
        }
        .navbar-nav .nav-link:hover {
            background-color: #454d55 !important;
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
              
            <li class="navbar-nav">
                    <a class="nav-link" href="#">الصفحة الرئيسية <span class="sr-only"></span></a>
                </li>
         
         
                    <li class="navbar-nav">
                    <a class="nav-link"  href="insert.php"> اضافة بيانات</a>
                </li>
                
                    <li class="navbar-nav">
                    <a class="nav-link" href="logout.php">تسجيل الخروج</a>
                </li>
            </ul>
        </div>
    </nav>


    

    <div class="container mt-5">
        <div class="row justify-content-center">
        <div class="col-md-12">
        <h2>عرض البيانات
        الادمن</h2>
        <div class="table-responsive">

        <table class="table">
            <thead>
                <tr>
                    <th>الرقم التسلسلي</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>الصورة</th>
                    <th>فصيلة الدم</th>
                    <th>الكلية</th>
                    <th>التخصص</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connection.php';

                $sql = "SELECT * FROM info";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["id"]."</td>";
                        echo "<td>".$row["email"]."</td>";
                        echo "<td>".$row["numberpone"]."</td>";
                        echo "<td><img src='".$row['photo']."' height='50' width='50'/></td>";
                        echo "<td>".$row["blood_type"]."</td>";
                        echo "<td>".$row["College"]."</td>";
                        echo "<td>".$row["major"]."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>لا توجد بيانات</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>  </div>  </div>
</div>
</div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



