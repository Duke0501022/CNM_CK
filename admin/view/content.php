  <?php 

    include_once("controller/PhuHuynh/cdoanhnghiep.php");
    // include_once("controller/NhanVienKiemDinh/cnvphanphoi.php");
    include_once("controller/NhanVienPhanPhoi/cnvphanphoi.php");
    include_once("controller/CauHoi/cCauHoi.php");
    include_once("controller/LienHe/cLienHe.php");

    $p = new cLienHe();
    // $tv = new cKHTV();
    $dn = new cKHDN();
    $ncc = new cCauHoi();
    $nvpp = new cNVPP();
    
    // var_dump($nvpp);
    // echo "dccmmm";
    
   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DASHBOARD</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
              <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php $sl = $dn->count_dn(); ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php 
                //var_dump(mysqli_fetch_array($sl));
                while($row = mysqli_fetch_array($sl)){
                  echo $row['count(*)'];
                } ?></h3>

                <p>Số lượng Phụ Huynh</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
           <?php $sl = $p->count_lh(); ?>
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php 
                //var_dump(mysqli_fetch_array($sl));
                while($row = mysqli_fetch_array($sl)){
                  echo $row['count(*)'];
                } ?></h3>
                <p>Số lượng yêu cầu phản hồi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
           <?php $sl = $nvpp->count_nhanvien(); ?>
            <div class="small-box bg-warning">
              <div class="inner">
              <h3><?php 
                //var_dump(mysqli_fetch_array($sl));
                while($row = mysqli_fetch_array($sl)){
                  echo $row['count(*)'];
                } ?></h3>
                <p>Số lượng chuyên viên</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
          <?php $sl = $ncc->count_cauhoi(); ?>
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php 
                  //var_dump(mysqli_fetch_array($sl));
                  while($row = mysqli_fetch_array($sl)){
                    echo $row['count(*)'];
                  } ?></h3>

                <p>Số lượng câu hỏi cho bài test</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          
          <div class="row">
    <div class="col-lg-6">
        <!-- Pie Chart -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pie Chart: Tin Tức</h3>
            </div>
            <div class="card-body">
                <canvas id="pieChart" style="height:230px"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-lg-6">
        <!-- Bar Chart -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Bar Chart: </h3>
            </div>
            <div class="card-body">
                <canvas id="barChart" style="height:230px"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
      
            <!-- /.card -->
          </div>
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php
  $tinTucData = array(
    array("title" => "Trẻ em", "views" => 500),
    array("title" => "Môi trường", "views" => 700),
    array("title" => "Dấu hiệu", "views" => 300),
    array("title" => "Học tập", "views" => 400),
    array("title" => "Ăn uống", "views" => 600)
);
?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Sample data for the charts
    var tinTucData = <?php echo json_encode($tinTucData); ?>;

// Extracting labels and data for the charts
var pieLabels = tinTucData.map(function(item) {
    return item.title;
});

var pieData = {
    labels: pieLabels,
    datasets: [{
        data: tinTucData.map(function(item) {
            return item.views;
        }),
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc']
    }]
};

var barLabels = tinTucData.map(function(item) {
    return item.title;
});

var barData = {
    labels: barLabels,
    datasets: [{
        label: 'Views',
        backgroundColor: '#007bff',
        data: tinTucData.map(function(item) {
            return item.views;
        })
    }]
};

// Draw the pie chart
var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
var pieChart = new Chart(pieChartCanvas, {
    type: 'pie',
    data: pieData,
    options: {
        maintainAspectRatio: false,
        responsive: true,
    }
});

    // Draw the bar chart
    var barChartCanvas = $('#barChart').get(0).getContext('2d');
    var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barData,
        options: {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
