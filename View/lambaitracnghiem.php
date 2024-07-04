<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #318EA5;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .btn-primary {
        background-color: #318EA5;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>
<script>
        function validateForm() {
            const radios = document.querySelectorAll('input[type="radio"]');
            let isValid = true;

            radios.forEach(radio => {
                const name = radio.name;
                if (!document.querySelector(`input[name="${name}"]:checked`)) {
                    isValid = false;
                }
            });

            if (!isValid) {
                alert('Vui lòng trả lời tất cả các câu hỏi trước khi nộp bài.');
            }

            return isValid;
        }
    </script>
<?php
include_once("Controller/cTracNghiem.php");

// Xử lý yêu cầu và lấy danh sách câu hỏi từ cơ sở dữ liệu
if (isset($_GET['idUnit'])) {
    // Lấy idUnit từ URL
    $idUnit = $_GET['idUnit'];

    // Thực hiện truy vấn cơ sở dữ liệu để lấy danh sách câu hỏi trong đơn vị trắc nghiệm tương ứng
    $tracnghiem = new cTracNghiem();
    $questions = $tracnghiem->select_tracnghiem($idUnit);

    // Hiển thị danh sách câu hỏi và chức năng gửi kết quả
    if ($questions) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the test result submission
            $answer = $_POST['answer'] ?? [];
            $idPhuHuynh = $_SESSION['idPhuHuynh'];

            $totalScore = 0;
            foreach ($answer as $ans) {
                switch ($ans) {
                    case 'a':
                        $totalScore += 5;
                        break;
                    case 'b':
                        $totalScore += 3;
                        break;
                    case 'c':
                        $totalScore += 2;
                        break;
                }
            }

            if ($totalScore < 50) {
                $result = "Con đang có những dấu hiệu phát triển không tốt, khả năng phát triển chậm nhiều so với trẻ bt, hãy cho con đến trung tâm uy tín thăm khám";
            } elseif ($totalScore >= 50 && $totalScore < 70) {
                $result = "Con có dấu hiệu phát triển chậm hơn so với sự phát triển của trẻ bình thường, hãy lưu ý những điểm con chưa đạt và hỗ trợ con.";
            } else {
                $result = "Mức độ phát triển của con bình thường";
            }

            // Hiển thị điểm số và kết quả
            // echo "<p>Tổng điểm: $totalScore</p>";
            // echo "<p>Kết quả: $result</p>";
        }
?>
        <div style="overflow: auto; max-height: 500px; text-align: center;">
            <h1>Trắc nghiệm Unit <?= $idUnit ?></h1>
            <form action="index.php?lambaitracnghiem=<?= $idUnit ?>&idUnit=<?= $idUnit ?>" method="post" onsubmit="return validateForm();">
                <table border="1" cellpadding="10" cellspacing="0" style="margin: 0 auto;">
                    <thead>
                        <tr>
                            <th>Câu hỏi</th>
                            <th>Câu trả lời</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($questions as $key => $question) : ?>
                            <tr>
                                <td>Câu <?= ($key + 1) ?>: <?= $question['cauHoi'] ?></td>
                                <td>
                                    <label><input type="radio" name="answer[<?= $key ?>]" value="a"> <?= $question['cau1'] ?></label><br>
                                    <label><input type="radio" name="answer[<?= $key ?>]" value="b"> <?= $question['cau2'] ?></label><br>
                                    <label><input type="radio" name="answer[<?= $key ?>]" value="c"> <?= $question['cau3'] ?></label>
                                    <input type="hidden" name="idcauHoi[]" value="<?= $question['idcauHoi'] ?>">
                                    <input type="hidden" name="idPhuHuynh" value="<?= $_SESSION['idPhuHuynh'] ?>">
                                </td>
                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>
                </table>
                <br>
                <button type="submit" class="btn btn-primary px-4" name="nopbai">Nộp bài</button>
            </form>
        </div>
<?php
    } else {
        echo "Không thể lấy danh sách câu hỏi.";
    }
} else {
    // Hiển thị thông báo lỗi nếu không có idUnit được cung cấp
    echo "Lỗi: Không có đơn vị trắc nghiệm được cung cấp.";
}
?>
<?php
// lưu kết quả vào database
if (isset($_REQUEST['nopbai'])) {
    $p = new cTracNghiem();
    $username = $_SESSION['username'];
    $kq = $p->get_saveResult($result, $_SESSION['idPhuHuynh'], $idUnit, $totalScore, $username);
    if ($kq > 0) {
        echo "<script>alert('Kết quả bài trắc nghiệm đã được lưu vào lịch sử bài làm.')</script>";
    } else {
        echo "<script>alert('Đã xảy ra lỗi khi lưu kết quả bài trắc nghiệm.')</script>";
    }
}

