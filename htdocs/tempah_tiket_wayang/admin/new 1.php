<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title></title>
</head>
<body>
  
  
<div class="w3-card-4">
    <div class="w3-container w3-teal">
      <h1>KIRA JUMLAH DAN PURATA 3 NOMBOR</h1>
    </div>

    <form class="w3-container w3-margin-top">
	
      Number 1: 
	  <input class= "w3-block w3-cursive w3-border w3-round-large" type="text" name="num1"><br><br>
      Number 2: 
	  <input class="w3-round-large w3-block w3-border" type="text" name="num2"><br><br>
      Number 3: 
	  <input class="w3-round-large w3-block w3-border" type="text" name="num3"><br><br>
      Sum: 
	  <input class="w3-round-large w3-block w3-border" type="text" name="sum"><br><br>
      Average: 
	  <input class="w3-round-large w3-block w3-border" type="text" name="avg"><br><br>
    <input class= "w3-round-xxlarge w3-btn w3-block w3-teal w3-margin-bottom " type="button" value="Sum" onclick="calcSum()">
    </form>
  </div>
</div>


<script>
    function calcSum() {
        let num1 = document.getElementsByName("num1")[0].value;
        let num2 = document.getElementsByName("num2")[0].value;
   let num3 = document.getElementsByName("num3")[0].value;
        let sum = Number(num1) + Number(num2)+ Number(num3);
  let avg = (Number(num1) + Number(num2)+ Number(num3))/3;
        document.getElementsByName("sum")[0].value = sum;
  document.getElementsByName("avg")[0].value = avg;
    }
</script>
 
 
</body>
</html>