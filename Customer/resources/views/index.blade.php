<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Manager</title>
    <style>
        body{
            display: flex;
        }
        form{
            flex: 30%;
            padding: 5px 80px;
        }
        table{
            flex: 70%;
            padding: 50px 80px;
        }

        form p {
            display: flex;
        }
        form p label{
            flex: 30%;
        }
        form p input{
            flex: 70%;
        }
        .container{
            border: 1px solid gray;
            padding: 20px 50px
        }
    </style>
</head>
<body>
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
            @foreach ($customers as $key => $item)
              <tr>
                  <td><?= $item->id?></td>
                  <td><?= $item->name?></td>
                  <td><?= $item->phone?></td>
                  <td><?= $item->email?></td>
                  <td>
                  <a href="/{{$item->id}}">Xem</a> | <a href="/{{$item->id}}">Sửa</a> | <a href="/{{$item->id}}/del">Xóa</a>
                  </td>
              </tr>
            @endforeach
        </tbody>
      </table>
    <form action="/create" method="POST">
        <h2>Thêm khách hàng</h2>
        <div class="container">
            @csrf
            <p>
                <label for="">Name</label>
                <input type="text" name="name" required>
            </p>
            <p>
                <label for="">SDT</label>
                <input type="text" name="phone" required>
            </p>
            <p>
                <label for="">email</label>
                <input type="email" name="email" required>
            </p>
            <input type="submit" name="submit" value="ADD">
        </div>
    </form>
</body>
</html>
