<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  //logs the values in array (is to help ... )
  //var_dump($_POST);
  /* Step 1:
  Get the temperature value (a_temp): is a string so we need to convert to a number using the in built function intval()
  */
  $temperature = $_POST['a_temp'];
  $temperatureNum = intval($temperature);
  //echo("<br />");
  //echo($temperatureNum);


  /* Step 2:
  Get the radio button choice (tempChoice) and then create a variable to hold the converted value::
  PLEASE USE THE FORMULA BELOW TO WRITE THE CONVERSION ALGORITHM - DO NOT USE ANY LIBRARY ETC
  To convert from Fahrenheit to Celsius: Celsius = (5 / 9) * (Fahrenheit – 32)
  To convert from Celsius to Fahrenheit: Fahrenheit = (9 / 5) * Celsius + 32
*/
$choix = $_POST['tempChoice'];

 if($choix == "Celsius"){
 $temperatureConv= (5/9)*($temperatureNum-32);
 $tempbase= "Fahrenheit";

}
 if ($choix == "Fahrenheit"){
  $temperatureConv= (9/5)*($temperatureNum+32);
  $tempbase= "Celsius";
}
//echo("<br />");
//echo ($temperatureConv);


  /* Step 3:
  Get the email address and name from the $_POST array (using the appropriate keys) and send an email
  to that person containing the converted value. Please include a short message in the email (not JUST the value.)
  Use the php inbuilt mail() function
  https://www.w3schools.com/php/func_mail_mail.asp
  The email may end up in your spam folder when testing...
  */
  $mail = $_POST['a_email'];
  $name = $_POST['a_name'];



  //echo("<br />");
  //echo ($name);
  //echo("<br />");
  //echo ($mail);
  /* Step 4: using the echo() - display a custom message i.e. Dear ... to notify the usewr that t
  hey will get an email with the results.*/


  echo "<div class = 'response'>";
  echo "<h3>$name <br />Your Conversion:</h3>";
  echo "<h2>$temperatureNum $tempbase = $temperatureConv $choix</h2>";
  echo "<h2> No Email were send to your address: $mail </h2>";
  //echo ($temperatureNum." ".$tempbase. " = ".$temperatureConv." ".$choix);
  echo "</div>";


}
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Sample Contact and FahrenHeit/Celsius Form </title>
<!--set some style properties::: -->
<link href="https://fonts.googleapis.com/css?family=Tinos:400,700&display=swap" rel="stylesheet">
<style>
body {
  width: 100vw;
  background-color: #f5fefa;
  font-family: 'Tinos', serif;
}
h2{
  text-align: center;
  font-size: 16px;
  font-weight: normal;
}

h3{
  text-align: center;
  text-transform: uppercase;
  margin:10vw;
  margin-bottom:3vw;
  font-size: 2em;
  color: black;
}
.formContainer{
width:60%;
align-content: center;
margin-right:15%;
margin-left:18%;
}
fieldset{
  background-color: #86fecd;
  border: none;
}
p{
  margin:2vw;
  margin-left:8vw;
}
input{
 width: 60%;
 border-radius: 10px;
 border: white solid 3px;
 margin-left: 10px;
}
.short{
  width: 8%;
}
.one{
  margin-left: 15vw;
  margin-bottom: 1vw;
}
.sub{
  background-color: #86fecd;
  border: #86fecd solid 3px;
  margin-left: 10px;
}
.milieu{
  margin-left: 15vw;
}
.response{
  width:90%;
  background-color: #86fecd;
  padding:5%;
  padding-bottom: 10%;
}

</style>
<script type="text/javascript">
window.onload = function(){
let handleClick = function (event){
 document.getElementById('titleconv').innerHTML = "Need another conversion? ";
};
let clickBox = document.getElementById('buttonS');
clickBox.addEventListener('click', handleClick);
};
</script>

</head>
<body>


<div class= "formContainer">
<!--form -->
<!-- You need an action att and a method att within the form tag -->
<form action="exerciseForm.php" method="post" enctype ="multipart/form-data">


<!-- group the related elements in a form -->
<h3 id="titleconv">NEED A CONVERSION?</h3>
<fieldset>
 <p><label>Name: </label><input type="text" size="40" maxlength = "40" name = "a_name" required> </p>
<p><label>Email:</label> <input type ="email" size="40" maxlength = "40" name = 'a_email' required/></p>

</fieldset>
<fieldset>
  <!-- ONLY number entries  -->
  <p><label>Value: </label><input type="number" size="5" maxlength = "5" name = "a_temp" required> </p>

  <div class="one"><input class="short" type="radio" name="tempChoice" value="Celsius">Convert to Celsius</div>
  <div class="one"><input class="short" type="radio" name="tempChoice" value="Fahrenheit">Convert to Fahrenheit</div>

  </fieldset>
<!-- submit button  -->
 <p class="milieu"><input class="sub" type = "submit" name = "submit" value = "submit and convert" id =buttonS /></p>
</form>
</div>
</body>
</html>
