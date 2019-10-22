<?php

session_start();
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

    public function encrypt_rsa($message){
          for ($x = 2; $x < $this->t; $x++) {
            if($this->gcd($x,$this->t)==1){
                $this->e = $x;
                break;
            }
        }
        return bcpowmod($message,$this->e,$this->n);
    }

    public function decrypt_rsa($message){
         for ($x = 1; $x <= $this->e; $x++) {
                $q = 1 + $x*$this->t;
                if($q%$this->e==0){
                   $this->d = $q/$this->e;
                   $this->d = (int)$this->d;
                   break;
                }
            }
            //echo $message,$this->d,$this->n."<br>";
        return bcpowmod($message,$this->d,$this->n);
    }
}

$data = new RSA();
$message1 = '0007';
$message2 = '0001';
$message3 = '0099';
$message4 = '0791';
echo "$message1"."$message2"."$message3"."$message4<br>";

$encrypt1 = $data->encrypt_rsa($message1);
$encrypt2 = $data->encrypt_rsa($message2);
$encrypt3 = $data->encrypt_rsa($message3);
$encrypt4 = $data->encrypt_rsa($message4);
echo "$encrypt1$encrypt2$encrypt3$encrypt4<br>";

$decrypt1 = $data->decrypt_rsa($encrypt1);
$decrypt2 = $data->decrypt_rsa($encrypt2);
$decrypt3 = $data->decrypt_rsa($encrypt3);
$decrypt4 = $data->decrypt_rsa($encrypt4);
echo "$decrypt1$decrypt2$decrypt3$decrypt4<br>";


 // require 'mysql_connecti.php';
    
 //    $sql="select from login";
 //    $ret=mysql_query($sql,$conn);
 //    if(!$ret)
 //    {
 //        die('Could not retrive login data: ' . mysql_error());
 //    }

 //    while($row=mysql_fetch_array($ret,MYSQL_ASSOC))
 //    {
 //        echo "hello";
 //        echo $row['uname'];
 //        if($row['uname']==$_POST['uname'] && $row['encr_pass']==md5($_POST['password']))
 //        {
 //            session_start();
 //            $_SESSION['uname']=$row['uname'];
 //            header('Location: items.php');
 //            exit();
 //        }
 //    }

?>