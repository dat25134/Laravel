<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin khách hàng</title>
</head>
<body>
    <h2>Thông tin khách hàng</h2>
    <form action="/{{$customer->id}}/edit" method="POST">
        @csrf
        <p>
            <label for="STT">STT</label>
            <input type="text" name="id" id="id" value="{{$customer->id}}" readonly>
        </p>
        <p>
            <label for="">Name</label>
        <input type="text" name="name" required value="{{$customer->name}}">
        </p>
        <p>
            <label for="">SDT</label>
            <input type="text" name="phone" required value="{{$customer->phone}}">
        </p>
        <p>
            <label for="">email</label>
            <input type="email" name="email" required value="{{$customer->email}}">
        </p>
        <input type="submit" name="edit" value="Apply">
    </form>
    <a href="/"> Quay lại trang chủ </a>
</body>
</html>
