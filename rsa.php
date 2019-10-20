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
            echo $message,$this->d,$this->n."<br>";
        return bcpowmod($message,$this->d,$this->n);
    }
}

$data = new RSA();
$message = 3217;
echo "$message<br>";
$encrypt = $data->encrypt_rsa($message);
echo "$encrypt<br>";
$decrypt = $data->decrypt_rsa($encrypt);
echo "$decrypt<br>";
 

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