<?php
 session_start();
 if(isset($_SESSION['uname'])){
  session_destroy();
  echo "<script type='text/javascript'>alert('Logged out!');
			 window.location='login.html';
		 	</script>";
}
else{
     echo "<script type='text/javascript'>alert('Authenticate please!');
     window.location='login.html';
     </script>";
       exit();
    }
?>