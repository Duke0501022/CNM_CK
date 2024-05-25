<?php 

	include_once("controller/ChatBot/cChatbot.php");

	$p = new cChatbot();

	$table = $p -> select_chatbot();

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý CHAT BOT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý CHATBOT</li>
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
                <h3 class="card-title">Danh sách chatbot</h3>  | <a href="index.php?addcb">Thêm chat bot</a>
                

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
                <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th class="border-bottom-header">STT</th>
                        <th class="border-bottom-header">Câu hỏi</th>
                        <th class="border-bottom-header">Trả lời</th>
                   
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
                                    echo "<td>".$row['query']."</td>";
                                    echo "<td>".$row['answer']."</td>";
                                    
                                    echo "<td><a href='?updatecb&&idChatBot=".$row['idChatBot']."'><i class='fa fa-pen' aria-hidden='true'></i></a> | <a href='?delcb&&idChatBot=".$row['idChatBot']."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
                                    echo "</tr>";
			                    }
		                    }
	                    }

                    ?>
                  
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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
  <!-- /.content-wrapper -->
