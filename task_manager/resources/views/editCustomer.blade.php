<?php
session_start();
?>
<h2>Chỉnh sửa thông tin khách hàng</h2>

<form action="/edit/{{$index}}" method="GET">
    <?php
    if(isset($_GET['name'])){
        foreach ($_SESSION['customer'] as $key => $val){
            if ($index == $key){
                $_SESSION['customer'][$key][0] = $_GET['name'];
                $_SESSION['customer'][$key][1] = $_GET['sdt'];
                $_SESSION['customer'][$key][2] = $_GET['email'];
            }
        }
    }
    ?>
    <p>
        <label for="STT"> STT: {{$index +1}} </label>
    </p>
    <p>
    <label for="name"> Tên: </label><input type="text" name="name" id="name" value="{{$_SESSION['customer'][$index][0]}}">
    </p>
    <p>
        <label for="SDT"> SĐT: </label><input type="text" name="sdt" id="sdt" value="{{$_SESSION['customer'][$index][1]}}" >
    </p>
    <p>
        <label for="email"> Email: </label><input type="text" name="email" id="email" value="{{$_SESSION['customer'][$index][2]}}">
    </p>
    <p>
        <input type="submit" value="Apply" name="submit">
    </p>
</form>
<a href="/">Quay lại trang chủ</a>
