
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Tasks</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
</head>
<body>
    @if (session('create-success'))
        {!!session('create-success')!!}
    @endif
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Tasks List
        </div>
        @if(!isset($tasks))
    <h5 class="text-primary">Dữ liệu không tồn tại!</h5>
@else
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Task title</th>
            <th scope="col">Content</th>
            <th scope="col">Created</th>
            <th scope="col">Due Date</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        <tbody>
        {{-- // Kiểm tra, nếu biến tasks có số lượng bằng 0 (Không có task nào) thì trả về thông báo --}}
        @if(count($tasks) == 0)
            <tr>
                <td colspan="5"><h5 class="text-primary">Hiện tại chưa có task nào được tạo!</h5></td>
            </tr>
        @else
            {{-- // Duyệt mảng $tasks, lấy ra từng trường của từng task để hiển thị ra bảng --}}
            @foreach($tasks as $key => $task)
                <tr>
                    <td scope="row">{{ ++$key }}</td>
                    <td>{{ $task->task_title }}</td>
                    <td>{{ $task->content }}</td>
                    <td>{{ $task->created }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>
                        <img src="{{ asset('storage/images/' . $task->image) }}" alt="" style="width: 150px">
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endif

    </div>
</div>
<!-- Bootstrap JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
       {{-- @if (session('create-success')) --}}

    {{-- @endif --}}

    </body>
</html>
