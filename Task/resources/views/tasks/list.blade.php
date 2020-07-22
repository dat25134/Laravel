@extends('home')
@section('title', 'Danh sách khách hàng')
@section('content')
     <div class="col-12">
           <div class="row">
               <div class="col-12"><h1>Danh Sách Công Việc</h1></div>
               <div class="col-12">
                   @if (Session::has('success'))
                      <p class="text-success">
                         <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                      </p>
                   @endif
               </div>
          <table class="table table-striped">
          <thead>
          <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Create - Date</th>
                <th scope="col">Update - Date</th>
                <th></th>
                <th></th>
          </tr>
          </thead>
          <tbody>
          @if(count($tasks) == 0)
          <tr><td colspan="7">Không có dữ liệu</td></tr>
          @else
                @foreach($tasks as $key => $task)
                <tr>
                      <th scope="row">{{ $key+1 }}</th>
                      <td>{{ $task->title }}</td>
                      <td>{{ $task->content }}</td>
                      <td class="text-center"><img src="{{ asset('storage/'.$task->image) }}" alt="" class="rounded w-50 p-3 mx-auto"></td>
                      <td>{{ $task->created_at }}</td>
                      <td>{{ $task->updated_at }}</td>
                      <td><a href="{{ route('tasks.edit', $task->id) }}">sửa</a></td>
                      <td><a href="{{ route('tasks.destroy', $task->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                </tr>
                @endforeach
          @endif
          </tbody>
          </table>
          <a class="btn btn-primary" href="{{ route('tasks.create') }}">Thêm mới</a>
          </div>
      </div>
@endsection
