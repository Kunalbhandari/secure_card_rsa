<?php 

if (isset($_POST['login'])) {

  function test($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
 }

  $uname = test($_POST['uname']);
  $pass = test($_POST['password']);

  include('mysql_connecti.php');
  $sql = "SELECT * from login where uname='$uname'";
  $x=1;
  $result = $conn->query($sql);
  while($result->num_rows==1 && $row=$result->fetch_assoc()){
	if($row['uname']==$uname && $row['encr_pass']==md5($pass)){
         echo "<script type='text/javascript'>alert('Connected and logged in successfully!');
		 </script>"; 
		session_start();
		$_SESSION['uname']=$uname;
		$x=0;
		break;
	}
  }

	if($x!==0){
		 echo "<script type='text/javascript'>alert('Wrong Username/Password!');
			 window.location='login.html';
		 	</script>";
	     	exit();
	}


	$conn->close();
	echo "<script type='text/javascript'>window.location='items.php';</script>";
}

?>
