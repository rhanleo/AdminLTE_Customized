<?php 
//require 'facebook-php-sdk/index.php'
include('head.php');
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php 
include('aside.php');
include('header.php');


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  
 <!--.content -->
	  <section class="content">
			<?php
	
	$db = new db();
	$conn = $db->connect();
	
	
	class getuser{
		function getid($id){
			$db = new db();
			$conn = $db->connect();
			$data = mysqli_query($conn, "SELECT * FROM products WHERE serial=$id");
		return mysqli_fetch_array($data);
	}
	}
	$usr = new getuser();
	$user = $usr;
	echo $user->getid(1)[0]."<br>";
	echo $user->getid(1)[1]."<br>";
	echo $user->getid(1)[2]."<br>";
	echo $user->getid(1)[3]."<br>";	
	?>
	  </section>
 <!-- /.content -->
	<p>

<?php
if(isset($_POST['signup'])){
		 $curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://chatapi.viber.com/pa/set_webhook",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
			"X-Viber-Auth-Token: 445da6az1s345z78-dazcczb2542zv51a-e0vc5fva17480im9"
		  ),
		));

		$response = curl_exec($curl);

		$err = curl_error($curl);

		curl_close($curl);
			
		$result = json_decode($response);
		
}    
?>
<form action="landing.php" method="post" enctype="multipart/form-data">
<input type="submit" name="signup" value="Sign up" class="btn-success">
</form>
	</p>
 
  </div>
  <!-- /Content Wrapper. Contains page content -->
 <?php include('footer.php'); ?>
</div>
<!-- ./wrapper -->


</body>
</html>
