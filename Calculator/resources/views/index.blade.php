<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator Laravel</title>
    <style>
        @CHARSET "ISO-8859-1";
*{
	margin:0px;
	padding:0px;
}
.cal{
	width: 350px;
	height: 500px;
	border: solid 1px gray ;
	border-radius: 5px;
	margin :0px;
	background-color:#97FFFF;
}
h1{
	padding: 5px;
	margin: 5px;
	color: white;
	background: #8B4513;
	text-align: right;
}

button {
	padding :5px;
	margin :15px;
	border: solid gray 1px;
	width: 45px;
	height: 45px;
	text-align: center;
	border-radius: 5px;
	font-size: 200%;
}
input{
	width: 300px;
	margin: 25px;
	padding: 0px;
	font-size: 200%;
	text-align: right;
}
.row1 {
	clear:both;
}
div {
	margin-left : 15px;
}
    </style>
</head>
<body>

    <form action="/result">
        <div class="cal">
            <h1> Caculator </h1>
                <input type="text" id="cal"  name="cal" value="<?php if (isset($result)) echo $result;?>">
                <div class=row1>
                    <button onclick="add(1)" type="button"> 1</button>
                    <button onclick="add(2)" type="button"> 2</button>
                    <button onclick="add(3)" type="button"> 3</button>
                    <button onclick="add('+')"  type="button"> +</button>
                </div>
                <div class=row2>
                    <button onclick="add(4)" type="button"> 4</button>
                    <button onclick="add(5)" type="button"> 5</button>
                    <button onclick="add(6)" type="button"> 6</button>
                    <button onclick="add('-')" type="button"> -</button>
                </div>
                <div class=row3>
                    <button onclick="add(7)" type="button"> 7</button>
                    <button onclick="add(8)" type="button"> 8</button>
                    <button onclick="add(9)" type="button"> 9</button>
                    <button onclick="add('x')" type="button"> x</button>
                </div>
                <div class=row4>
                    <button onclick="xoa()" type="button"> C</button>
                    <button onclick="add(0)" type="button"> 0</button>
                    <button type="submit" > =</button>
                    <button onclick="add('/')" type="button"> ÷</button>
                </div>
        </div>
    </form>
<script>
    function add(x){
	var x;
    let a=document.getElementById('cal').value;
    if (a==0) { document.getElementById('cal').value=""; }
    document.getElementById('cal').value+=x;
}
</script>
</body>
</html>
