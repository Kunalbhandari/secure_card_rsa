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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script link='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

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

<h2 style="text-align: center;">Checkout Form</h2>
<p></p>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form>
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
            <input type="text" id="cname" name="cardname" value="<?php echo $_SESSION['uname'] ?>">
            <label for="ccnum">Credit card number</label>
            <div class="row">
              <div class="col-25">
                <input type="text" minlength="4" maxlength="4" class="ccnum" name="cardnumber1" required>
              </div>  
              <div class="col-25">
                <input type="text" minlength="4" maxlength="4" class="ccnum" name="cardnumber2" required>
              </div>
              <div class="col-25">
                <input type="text" minlength="4" maxlength="4" class="ccnum" name="cardnumber3" required>
              </div>
              <div class="col-25">
                <input type="text" minlength="4" maxlength="4" class="ccnum" name="cardnumber4" required>
              </div>
            </div>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="XXX">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
      <p><a href="#">Product 1</a> <span class="price">$15</span></p>
      <p><a href="#">Product 2</a> <span class="price">$5</span></p>
      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
      <p><a href="#">Product 4</a> <span class="price">$2</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
    </div>
  </div>
</div>


  <input type="submit" id="sub" value="SUBMIT" onclick="func()" class="btn">




<form id="sampleForm" name="sampleForm" method="post" action="payment1.php">
<input type="hidden" name="card1" id="01" required>
<input type="hidden" name="card2" id="02" required>
<input type="hidden" name="card3" id="03" required>
<input type="hidden" name="card4" id="04" required>
<input type="hidden" name="cardenc1" id="11" required>
<input type="hidden" name="cardenc2" id="12" required> 
<input type="hidden" name="cardenc3" id="13" required>
<input type="hidden" name="cardenc4" id="14" required>
</form>

<script type="text/javascript">
  
  var cname= document.getElementById('cname');
  var cnum= document.getElementsByClassName('ccnum');
  var expmonth= document.getElementById('expmonth');
  var expyear= document.getElementById('expyear');
  var sub=document.getElementById('sub');

  function gcd(a,b)
  {
    if (b==0)
      return a;
    return gcd(b,a%b);
  }

  function getPublicKey()
  {
    var p,q;
    var n,t;

    p=139;
    q=137;
    n=p*q;
    t=(p-1)*(q-1);

    //generating the public key
    e=-1
    for(var i=2;i<t;i++)    
    {
      if(gcd(t,i)==1)
      {
        e=i;
        break;
      }
    }
    //generating private key
    // d=-1
    // for(var i=1;i<100;i++)
    // {
    //   var x=(1+t*i);
    //   if (x%e==0)
    //   {
    //     d=x/e;
    //     break;
    //   }
    // }

    return {'e':e,'n':n};
  }

function addmod(x, y, n)
{
    // Precondition: x<n, y<n
    // If it will overflow, use alternative calculation
    if (x + y <= x) x = x - (n - y) % n;
    else x = (x + y) % n;
    return x;
}

function sqrmod(a, n)
{
    var b;
    var sum = 0;

    // Make sure original number is less than n
    a = a % n;

    // Use double and add algorithm to calculate a*a mod n
    for (b = a; b != 0; b >>= 1) {
        if (b & 1) {
            sum = addmod(sum, a, n);
        }
        a = addmod(a, a, n);
    }
    return sum;
}

function powFun(base, ex, mo) {
    var r;
    if(ex === 0) 
        return 1;
    else if(ex % 2 === 0) {
        r = powFun(base, ex/2, mo) % mo ;
        // return (r * r) % mo;
        return sqrmod(r, mo);
    }else 
        return (base * powFun(base, ex - 1, mo)) % mo;
}

function passVal(res)
{
  document.sampleForm.cardenc1.value = res[0];
  document.sampleForm.cardenc2.value = res[1];
  document.sampleForm.cardenc3.value = res[2];
  document.sampleForm.cardenc4.value = res[3];

   var i,y,nu = [0,0,0,0];
   for(i=0;i<4;i++){
      var a = cnum[i].value;
      if(a.length!==4){
         alert('Please check 16 Digit Credit Card Number');
         window.exit();
      }
      for(y=0;y<4;y++){
        if(a[y]==='0'){
           nu[i] = nu[i] + 1;
        }
        else{
          break;
        }
      }
   }

   document.sampleForm.card1.value = nu[0];
  document.sampleForm.card2.value = nu[1];
  document.sampleForm.card3.value = nu[2];
  document.sampleForm.card4.value = nu[3];
  document.forms["sampleForm"].submit();
  // window.location.href="payment1.php?cardenc1="+res[0]+"&cardenc2="+res[1]+"&cardenc3="+res[2]+"&cardenc4="+res[3];
}


function func()
{
  dic=getPublicKey();
  //console.log(dic);
  e=dic['e'];
  //d=dic['d'];
  n=dic['n'];

  // encrypting the cardnumber4
  result=[0,0,0,0];
  for(var i=0;i<cnum.length;i++)
  {
    cnum[i].value=cnum[i].value;
    result[i] = powFun(cnum[i].value,e,n);
    //result1= powFun(result[i],d,n);
    //console.log(cnum[i].value)
    //console.log(result[i])
    //console.log(result1)
  }
  //console.log("hello1")
  passVal(result);
  
}

</script>

</body>
</html>
