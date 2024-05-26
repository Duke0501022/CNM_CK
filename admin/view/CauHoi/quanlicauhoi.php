<?php 

include_once("controller/CauHoi/cCauHoi.php");

$p = new cCauHoi();

$table = $p->select_cauhoi();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Câu Hỏi</title>
    <!-- Include necessary styles and scripts here -->
</head>
<body>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý Câu Hỏi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý Câu Hỏi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách câu hỏi</h3>  | <a href="index.php?addcauhoi">Thêm câu hỏi</a> | <a href="index.php?import">Import câu hỏi</a>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="questionsTable" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                        <th>STT</th>
                      <th>Câu Hỏi</th>
                      <th>Câu 1</th>
                      <th>Câu 2</th>
                      <th>Câu 3</th>
                      <th>Unit</th>
                      <th style="text-align:center">Tác vụ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
	                    if($table){
                            $i = 1;
		                    if(mysqli_num_rows($table) > 0){
			                    while($row = mysqli_fetch_assoc($table)) {
                                    echo "<tr>";
                                    echo "<td>" .$i++.  "</td>";
                                    echo "<td>".$row['cauHoi']."</td>";
                                    echo "<td>".$row['cau1']."</td>";
                                    echo "<td>".$row['cau2']."</td>";
                                    echo "<td>".$row['cau3']."</td>";
                                    echo "<td>".$row['tenUnit']."</td>";
                                    echo "<td><a href='?updatecauhoi&&idcauHoi=".$row['idcauHoi']."'><i class='fa fa-pen' aria-hidden='true'></i></a> | <a href='?deletecauhoi&&idcauHoi=".$row['idcauHoi']."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
                                    echo "</tr>";
			                    }
		                    }
	                    }
                    ?>
                  </tbody>
                </table>
                <div id="pagination" class="pagination"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Add this at the bottom of your page, before the closing </body> tag -->
  <script>
  document.addEventListener("DOMContentLoaded", function () {
      const rowsPerPage = 5;
      const table = document.querySelector("#questionsTable tbody");
      const rows = table.querySelectorAll("tr");
      const pageCount = Math.ceil(rows.length / rowsPerPage);
      const paginationContainer = document.querySelector("#pagination");

      function displayPage(page) {
          const start = (page - 1) * rowsPerPage;
          const end = start + rowsPerPage;

          rows.forEach((row, index) => {
              if (index >= start && index < end) {
                  row.style.display = "";
              } else {
                  row.style.display = "none";
              }
          });

          document.querySelectorAll(".page-link").forEach(link => {
              link.classList.remove("active");
          });

          document.querySelector(`.page-link[data-page='${page}']`).classList.add("active");
      }

      function createPagination() {
          for (let i = 1; i <= pageCount; i++) {
              const pageLink = document.createElement("button");
              pageLink.classList.add("page-link");
              pageLink.dataset.page = i;
              pageLink.textContent = i;
              pageLink.addEventListener("click", function () {
                  displayPage(i);
              });
              paginationContainer.appendChild(pageLink);
          }
      }

      createPagination();
      displayPage(1);
  });
  </script>
</body>
</html>
