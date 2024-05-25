<?php
include_once(__DIR__ . '/../../Controller/cTinTuc.php');

if (isset($_GET['idTinTuc'])) {
    $idTinTuc = $_GET['idTinTuc'];
    $tintuc = new cTinTuc();
    $tinTucDetail = $tintuc->getTinTuc($idTinTuc);
    if ($tinTucDetail && $tinTucDetail->num_rows > 0) {
        $tinTuc = $tinTucDetail->fetch_assoc();
?>
        <head>
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
                    height: 100pv;
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
                }
                p {
                    color: #666;
                }
                img {
                    max-width: 100%;
                    height: auto;
                    margin-top: 20px;
                    margin-bottom: 20px;
                    /* Thêm khoảng cách dưới hình ảnh */
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
                }
            </style>
            <head>
                <title><?php echo htmlspecialchars($tinTuc['tieuDe']); ?></title>
            </head>
        <body>
            <div class="container">
                <div class="content">
                    <h1><?php echo htmlspecialchars($tinTuc['tieuDe']); ?></h1>
                    <p><?php echo nl2br(htmlspecialchars($tinTuc['noiDung'])); ?></p>
                    <img src="<?php echo htmlspecialchars($tinTuc['hinhAnh']); ?>" alt="<?php echo htmlspecialchars($tinTuc['tieuDe']); ?>">
                    <p>Danh mục: <?php echo htmlspecialchars($tinTuc['tenDanhMuc']); ?></p>
                    <a href="http://localhost/CNM/CNM_Project/index.php?tintuc" class="back-link">Trở về trang chủ</a>
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