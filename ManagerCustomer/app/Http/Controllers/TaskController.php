<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
{
    //Lấy ra toàn bộ các task từ database thông qua truy vấn bằng Eloquent
    $tasks = Task::all();

    // Trả về view index và truyền biến tasks chứa danh sách các task
    return view('index',compact('tasks'));
}
}
