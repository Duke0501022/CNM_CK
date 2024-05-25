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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner" id="chart-container">
                <canvas id="graph"></canvas>
                <p>Tỉ lệ kiểm định nông sản</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner" id="barchart-container">
                <canvas id="barchart" width="600px" height="600px"></canvas>
                <p>Số lượng người dùng</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner" id="barchart-container">
                <canvas id="qr_chart" width="600px" height="600px"></canvas>
                <p>Thống kê đơn đặt hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner" id="barchart-container">
                <canvas id="kiemdinhchart" width="600px" height="600px"></canvas>
                <p>Thống kê số phiếu kiểm định trong tháng</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
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
  <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph(){
                $.post("API/thongke/api_phanloainongsan.php",
                function (data){
                    var labels = [];
                    var result = [];
                    for (var i in data) {
                        labels.push(data[i].status);
                        result.push(data[i].size_status);
                    }
                    var pie = $("#graph");
                    var myChart = new Chart(pie, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    data: result,
                                    borderColor: ["rgba(217, 83, 79,1)","rgba(240, 173, 78, 1)","rgba(92, 184, 92, 1)"],
                                    backgroundColor: ["white","blue","yellow"],
                                }
                            ]
                        },
                        options: {
                            title: {
                                display: true,
                                text: "Chuyên ngành"
                            }
                        }
                    });
                });
        }
  </script>
  <script>
        $(document).ready(function () {
            showbarchart();
        });

        function showbarchart(){
        
            $.post("API/thongke/api_phanloainguoidung.php",
                function (data){
                    console.log(data);
                    var formStatusVar = [];
                    var total = []; 

                    for (var i in data) {
                        formStatusVar.push(data[i].status);
                        total.push(data[i].size_status);
                    }

                    var options = {
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                display: true
                            }],
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    };

                    var myChart = {
                        labels: formStatusVar,
                        datasets: [
                            {
                                label: 'Tổng số',
                                backgroundColor: '#17cbd1',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#0ec2b6',
                                hoverBorderColor: '#42f5ef',
                                data: total
                            }
                        ]
                    };

                    var bar = $("#barchart"); 
                    var barGraph = new Chart(bar, {
                        type: 'bar',
                        data: myChart,
                        options: options
                    });


                });
        }
  </script>
  <script type="text/javascript">
    var ctx = document.getElementById('qr_chart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["January","February","March","April","May","June","July","August","September","October","November","December"],
        datasets: [{
          label: "Số đơn hàng",
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: [0,10,5,2,20,30,45,50,10,40,34,31],
        }]
      },
      options: {}
    });
  </script>
  <script>
        $(document).ready(function () {
            showkiemdinhchart();
        });

        function showkiemdinhchart(){
        
            $.post("API/thongke/api_sophieu_kiemdinh_theothang.php",
                function (data){
                    console.log(data);
                    var Thang = [];
                    var SoPhieuKD = []; 

                    for (var i in data) {
                        Thang.push(data[i].Thang);
                        SoPhieuKD.push(data[i].SoPhieuKD);
                    }

                    var options = {
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                display: true
                            }],
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    };

                    var myChart = {
                        labels: Thang,
                        datasets: [
                            {
                                label: 'Số phiếu kiểm định',
                                backgroundColor: 'white',
                                borderColor: 'white',
                                hoverBackgroundColor: '#0ec2b6',
                                hoverBorderColor: '#42f5ef',
                                data: SoPhieuKD
                            }
                        ]
                    };

                    var bar = $("#kiemdinhchart"); 
                    var barGraph = new Chart(bar, {
                        type: 'line',
                        data: myChart,
                        options: options
                    });


                });
        }
  </script>