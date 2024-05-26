<?php
include_once(__DIR__ . '/../../Controller/cTinTuc.php');

if (isset($_GET['idTinTuc'])) {
    $idTinTuc = $_GET['idTinTuc'];
    $tintuc = new cTinTuc();
    $tinTucDetail = $tintuc->getTinTuc($idTinTuc);
    if ($tinTucDetail && $tinTucDetail->num_rows > 0) {
        $tinTuc = $tinTucDetail->fetch_assoc();
?>
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($tinTuc['tieuDe']); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #333;
            border-bottom: 1px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            color: #0056b3;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .back-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1><?php echo htmlspecialchars($tinTuc['tieuDe']); ?></h1>
            <p><?php echo nl2br(htmlspecialchars($tinTuc['noiDung'])); ?></p>
            <?php 
            if ($tinTuc['hinhAnh'] == NULL) {
                echo "<img src='/assets/uploads/images/user.png' alt='' height='100px' width='150px'>";
            } else {
                echo "<img src='admin/admin/assets/uploads/images/" . $tinTuc['hinhAnh'] . "' alt='' height='100px' width='300px'>";
            }
            ?>
            <p>Danh mục: <?php echo htmlspecialchars($tinTuc['tenDanhMuc']); ?></p>
            <a href="http://localhost/CNM_Project/index.php?tintuc" class="back-link">Trở về trang chủ</a>
        </div>
    </div>
</body>
</html>

<?php
    } else {
        echo "The news article was not found.";
    }
} else {
    echo "No news article specified.";
}
?>