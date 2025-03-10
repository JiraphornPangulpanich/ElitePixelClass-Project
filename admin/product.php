<?php include 'condb.php'; ?>

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
        max-width: 300px; /* กำหนดความกว้างสูงสุดของช่อง Detail */
    }

    /* หรือเจาะจงเฉพาะช่อง Detail (column ที่ 4) */
    #datatablesSimple td:nth-child(4) {
        word-wrap: break-word;
        white-space: normal;
        max-width: 300px; /* ปรับขนาดตามต้องการ */
    }
</style>

    </head>
    <body class="sb-nav-fixed">
        <?php include 'menu1.php'; ?>




        <div class="card-body">
    <div style="overflow-x:auto;"> <!-- เพิ่ม div ครอบ table -->
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>IDItem</th>
                    <th>Categories</th>
                    <th>Name</th>
                    <th>Detail</th>
                    <th>Price</th>
                    <th>Ext</th>
                    <th>Num</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from Product order by IDItem DESC";
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?=$row['IDItem']?></td>
                    <td><?=$row['Categories']?></td>
                    <td><?=$row['Name']?></td>
                    <td><?=$row['Detail']?></td>
                    <td><?=$row['Price']?></td>
                    <td><?=$row['Ext']?></td>
                    <td><?=$row['Num']?></td>
                </tr>
                <?php
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
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
