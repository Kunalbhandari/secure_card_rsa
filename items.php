<?php

  session_start();
  if(!(isset($_SESSION['uname']))){
     echo "<script type='text/javascript'>alert('Authenticate please!');
     window.location='login.html';
     </script>";
       exit();
}

?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script link='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 300px;
  /* margin: auto; */
  height: 200px;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<h2 style="text-align:center">Product Card</h2>

<h4 style="text-align:center">
  <?php 

    echo  "Hello :";
    echo $_SESSION['uname'];

  ?>
</h4>

<div class="col-md-3" style="position: absolute;left:0%;top:2%">
    <input class="btn btn-lg btn-primary" style="background-color:orange;" onclick="logout()" type="button" value="Logout">
    </div>


<form action="payment.php">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <img src="jeans.jpg" alt="Denim Jeans" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Buy</button></p>
        </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="oneplus-7pro.jpg" alt="Denim Jeans" style="width:100%">
                <h1>Mobile Phones</h1>
                <p class="price">$19.99</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Buy</button></p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img src="rado.jpg" alt="Denim Jeans" style="width:100%">
                <h1>Watches</h1>
                <p class="price">$19.99</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Buy</button></p>
            </div>
        </div>
    </div>
</form>


<script type="text/javascript">
function logout(){
      window.location = "logout.php";
    }
    
</script>


</body>
</html>
