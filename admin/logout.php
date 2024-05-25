<?php 

	if (!isset($_SESSION))
  	{
		session_start();
  	}
	session_destroy();
	//echo header("refresh: 0; url=../admincp");
	header("Location:../admin/");
 ?>