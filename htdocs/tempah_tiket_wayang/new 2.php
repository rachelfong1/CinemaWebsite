<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
    <title>PURATA NOMBOR</title>
</head>
<body>
<center>
<p> <h1>KIRA JUMLAH DAN PURATA 3 NOMBOR</h1></p><br><br>
<form>
    Number 1: <input type="text" name="num1"><br><br>
    Number 2: <input type="text" name="num2"><br><br>
    Number 3: <input type="text" name="num3"><br><br>
    Sum: <input type="text" name="sum"><br><br>
    average: <input type="text" name="avg"><br><br>
    <input class="w3-btn w3-black" type="button" value="Sum" onclick="calcSum()">
</form>
 
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