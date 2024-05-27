<?php 

	class ketnoi{
		public function moketnoi(&$conn){
<<<<<<< HEAD
			$conn = mysqli_connect('localhost','root','','testdv1');
=======
			$conn = mysqli_connect('localhost','root','','kinderdb1');
>>>>>>> 62221744e38d632c3d636f70c5b1e08344b63433
			//set charset utf8
			mysqli_set_charset($conn,'utf8');
			// Check connection
			if (!$conn) {
  				echo "Failed to connect to MySQL: " . mysqli_connect_error();
  				exit();
			}else{
				return $conn;
			}
		}
		public function dongketnoi($conn){
			mysqli_close($conn);
		}
	}

 ?>