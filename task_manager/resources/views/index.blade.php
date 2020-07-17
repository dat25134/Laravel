<?php session_start();
$array = [
            ['Nguyễn Văn A','01234567890','email.test@mail.com'],
            ['Nguyễn Văn B','01234567890','email.test@mail.com'],
            ['Nguyễn Văn C','01234567890','email.test@mail.com'],
            ['Nguyễn Văn D','01234567890','email.test@mail.com'],
            ['Nguyễn Văn E','01234567890','email.test@mail.com'],
            ['Nguyễn Văn F','01234567890','email.test@mail.com'],
        ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>
<h1>Danh sách khách hàng</h1>
<table border="1">
  <thead>
  <tr>
      <th>STT</th>
      <th>Họ và tên</th>
      <th>Số điện thoại</th>
      <th>Email</th>
      <th>Thao tác</th>
  </tr>
  </thead>
  <tbody>
    <?php
        if (isset($_SESSION['customer'])) {$array = $_SESSION['customer'];}
        if (isset($delIndex)) {
            unset($array[$delIndex]);
        }
    ?>

      @foreach ($array as $key => $item)
        <tr>
            <td><?= $key+1?></td>
            <td><?= $item[0]?></td>
            <td><?= $item[1]?></td>
            <td><?= $item[2]?></td>
            <td>
            <a href="/view/{{$key}}">Xem</a> | <a href="/edit/{{$key}}">Sửa</a> | <a href="/del/{{$key}}">Xóa</a>
            </td>
        </tr>
      @endforeach
  </tbody>
</table>
</body>
</html>
<?php $_SESSION['customer'] = $array?>
