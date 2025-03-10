<?php include 'condb.php'; 
$sql = "SELECT * FROM 'Categories' WHERE Id = '{$_GET['id']}' ";
$rs = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($rs); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        /* จัดการตารางทั้งหมด */
        #datatablesSimple td {
            word-wrap: break-word;
            white-space: normal;
            max-width: 300px;
            vertical-align: top;
        }

        #datatablesSimple td:nth-child(4) {
            max-width: 350px;
        }

        .action-btn a {
            margin-right: 5px;
        }

        .btn-add {
            margin-bottom: 15px;
            display: inline-block;
            padding: 8px 16px;
            background-color: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>

</head>

<body class="sb-nav-fixed">
    <?php include 'menu1.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-4">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div><i class="fas fa-table me-1"></i> Products</div>
                        <!-- ปุ่มเพิ่มสินค้า -->
                        <a href="addcategories.php" class="btn-add">+ เพิ่มหมวดหมู่สินค้า</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Id</th>
                                    <th>name</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM Categories ORDER BY Id DESC";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $row['Id'] ?></td>
                                        <td class="text-center"><?= $row['name'] ?></td>
                                        <td class="text-center action-btn">
                                            <!-- ปุ่มแก้ไข -->
                                            <a href="editcategories.php?id=<?= $row['Id'] ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                                            <!-- ปุ่มลบ -->
                                            <a href="deletecategories.php?id=<?= $row['Id'] ?>" onclick="return confirm('คุณแน่ใจว่าต้องการลบสินค้านี้?');" class="btn btn-danger btn-sm">ลบ</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'footer.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
