<?php

include 'connectdb.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST['search_query'];

    // ป้องกัน SQL Injection
    $search_query = $conn->real_escape_string($search_query);

    // ค้นหาสินค้า
    $sql = "SELECT * FROM Product WHERE Name LIKE '%$search_query%'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="utf-8">
    <title> ElitePixel </title>
    
   

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
   
    
</head>


    <div class="container">
        <h2>ผลลัพธ์การค้นหา: "<?php echo htmlspecialchars($search_query); ?>"</h2>

        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-3">
                        <div class="product-item">
                            <img src="img/' . $row["Iditem"] . '.jpg" class="product-img">
                            <h5>' . $row["Name"] . '</h5>
                            <p>ราคา: $' . $row["Price"] . '</p>
                            <a href="detail1.php?Iditem=' . $row["Iditem"] . '" class="btn btn-primary">ดูรายละเอียด</a>
                        </div>
                    </div>';
                }
            } else {
                echo "<p>ไม่พบสินค้า</p>";
            }
            ?>
        </div>
    </div>






    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    
        
</body>
</html>
