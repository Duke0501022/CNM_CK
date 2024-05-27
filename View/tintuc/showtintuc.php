<?php
include_once(__DIR__ . '/../../Controller/cTinTuc.php');

if (isset($_GET['idTinTuc'])) {
    $idTinTuc = $_GET['idTinTuc'];
    $tintuc = new cTinTuc();
    $tinTucDetail = $tintuc->getTinTuc($idTinTuc);
    if ($tinTucDetail && $tinTucDetail->num_rows > 0) {
        $tinTuc = $tinTucDetail->fetch_assoc();
    }
}
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
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .content-wrapper {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            overflow-y: auto;
            max-height: calc(100vh - 40px);
        }
        h1 {
            color: #28a745;
            border-bottom: 1px solid #28a745;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        p {
            color: #6c757d;
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
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            color: #ffffff;
            background-color: #007bff;
            border: 1px solid #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }
        .back-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content-wrapper">
            <h1><?php echo htmlspecialchars($tinTuc['tieuDe']); ?></h1>
            <p><?php echo nl2br(htmlspecialchars($tinTuc['noiDung'])); ?></p>
           
            <p>Danh mục: <?php echo htmlspecialchars($tinTuc['tenDanhMuc']); ?></p>
            <a href="http://localhost/CNM_CK/index.php?tintuc" class="back-link">Trở về trang chủ</a>
        </div>
    </div>
</body>
</html>

