<?php 
    session_start();
     if(!(isset($_SESSION['uname']))){
     echo "<script type='text/javascript'>alert('Authenticate please!');
     window.location='login.html';
     </script>";
       exit();
}

  $c1=$_POST['cardenc1'];
  $c2=$_POST['cardenc2'];
  $c3=$_POST['cardenc3'];
  $c4=$_POST['cardenc4'];

  $q1=$_POST['card1'];
  $q2=$_POST['card2'];
  $q3=$_POST['card3'];
  $q4=$_POST['card4'];


  $num0 = [$q1,$q2,$q3,$q4];
  for($i=0;$i<4;$i++){
     if($num0[$i]==4){
       $num0[$i] = 3;
     }
  }

  //echo $num0[0]."<br>".$num0[1]."<br>".$num0[2]."<br>".$num0[3]."<br>";

   $cardno = (string)$c1.(string)$c2.(string)$c3.(string)$c4;
    // $c1 = (int)$c1;
    // $c2 = (int)$c2;
    // $c3 = (int)$c3;
    // $c4 = (int)$c4;

   
class RSA{

    var $p;       /* Prime number #1 */
    var $q;       /* Prime number #2 */
    var $n;       /* Modulus to be used */
    var $t; /* Totient of $n, used to find public key $e */
    var $e;       /* The public key */
    var $d;       /* The private key */
    public function __construct() {
        $this->p = 139;      //99999989     //993319  //100000007  //7907
        $this->q = 137;      //99999847     //999331  //100000049  //7919
        $this->n = $this->p * $this->q;
        $this->t = ($this->p - 1) * ($this->q - 1);
    } 
    
    public function gcd($a,$b){
        if($b==0){
           return $a;
        }
        return $this->gcd($b,$a%$b);
    }

    // public function encrypt_rsa($message){
    //       for ($x = 2; $x < $this->t; $x++) {
    //         if($this->gcd($x,$this->t)==1){
    //             $this->e = $x;
    //             break;
    //         }
    //     }
    //     return bcpowmod($message,$this->e,$this->n);
    // }

    public function gete(){
          for ($x = 2; $x < $this->t; $x++) {
            if($this->gcd($x,$this->t)==1){
                $this->e = $x;
                break;
            }
        }
         for ($x = 1; $x <= $this->e; $x++) {
                $q = 1 + $x*$this->t;
                if($q%$this->e==0){
                   $this->d = $q/$this->e;
                   $this->d = (int)$this->d;
                   break;
                }
            }
    }

    // public function bcpow1($msg,$d,$n)
    // {
    //  $res=1;
    //  for ($i=0; $i < $d; $i++) { 
    //    # code...
    //    $res*=$msg;
    //    $res%=$n;
    //  }
    //  return $res;
    // }

    public function decrypt_rsa($message){
           //echo $message." ".$this->d." ".$this->n."<br>";
        return bcpowmod($message,$this->d,$this->n);
    }
}

$data = new RSA();
$data->gete();
$decrypt1=$data->decrypt_rsa($c1);
$decrypt2=$data->decrypt_rsa($c2);
$decrypt3=$data->decrypt_rsa($c3);
$decrypt4=$data->decrypt_rsa($c4);

$decrypt = "";
$d = [$decrypt1,$decrypt2,$decrypt3,$decrypt4];

for ($x = 0; $x < 4; $x++) {
    $qaa = $num0[$x];
      for($ze = 0 ; $ze < $qaa ; $ze++){
        $d[$x] = "0".$d[$x];
      }
    }

$decrypt1 = $d[0];
$decrypt2 = $d[1];
$decrypt3 = $d[2];
$decrypt4 = $d[3];
//echo $d[0]." ".$d[1]." ".$d[2]." ".$d[3]."<br>";

$decrypt = (string)$decrypt1.(string)$decrypt2.(string)$decrypt3.(string)$decrypt4;
$x=1;
//echo $decrypt;


 include('mysql_connecti.php');

  $user  = $_SESSION['uname'];
  $sql="SELECT encr_cardnum,cardnum from card where uname='$user'";
  $result = $conn->query($sql);

  if($result==NULL){
    echo "<script type='text/javascript'>alert('Wrong Username/Password!');
       window.location='login.html';
      </script>";
        exit();
  }


?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script link='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>

<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<h2 style="text-align: center;">Securing Payment Gateway......Please Wait</h2>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="#">
      
        <div class="row">
          
          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>

            <label for="cname">Name on Card</label>
            <input type="text" id="name" name="name" value="<?php echo $_SESSION['uname'] ?>">
            <label for="ccnum">Credit card Encrypted number</label>
            <input type="text" id="enum" name="cnumber" value="<?php echo $cardno ?>">
            <label for="ccnum">Credit card Decrypted number</label>
            <input type="text" id="dnum" name="dnumber" value="<?php echo $decrypt ?>">
            
          </div>
          
        </div>
      </form>
<?php 
 
   while($row=$result->fetch_assoc()){
    if($row['cardnum']==$decrypt && $row['encr_cardnum']==$cardno){
      echo '<h4 style="text-align: center;color:green;">Successfull Record Decryption And Payment</h4>';
         $x=0;
      echo '<img src="suc.png" style="position:relative;left: 40%" />';
         break;
      }
     }

     if($x!==0){
        echo '<h4 style="text-align: center;color:red;">Record Decryption Failed or Credit Card Number Not Registered</h4>';
      echo '<img src="fai.png" style="position:relative;left: 40%" />';
     }

?>
         
    </div>
  </div>
</div>


</body>
</html>

 



