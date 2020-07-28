@extends('home')

@section('title', 'Thêm mới công viêc')


@section('content')

  <div class="row">

      <div class="col-md-12">

          <h2>Thêm mới công việc</h2>

      </div>

      <div class="col-md-12">

          <form method="post" action="{{ route('tasks.store') }}" enctype="multipart/form-data">

              @csrf

              <div class="form-group">

                  <label >Tên công việc</label>

                  <input type="text" class="form-control" name="title" required>

                  @error('title')
              <p class="text-warning">{{$message}}</p>
                  @enderror


              </div>

              <div class="form-group">

                  <label >Nội dung</label>

                  <textarea class="form-control" rows="3" name="content" required></textarea>

                  @error('content')
                  <p class="text-warning">{{$message}}</p>
                    @enderror

              </div>

              <div class="form-group">

                  <label for="exampleFormControlFile1">Ảnh</label>

                  <input type="file" name="image" class="form-control-file" required>
                  @error('image')
                  <p class="text-warning">{{$message}}</p>
                    @enderror

              </div>

              <div class="form-group">

                  <label for="exampleFormControlFile1">Ngày hết hạn</label>

                  <input type="date" name="due_date" class="form-control" required>
                  @error('due_date')
                  <p class="text-warning">{{$message}}</p>
                    @enderror

              </div>

              <button type="submit" class="btn btn-primary">Thêm mới</button>

              <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

          </form>

      </div>

  </div>


@endsection

<?php if (isset($_POST['image'])) dd($_POST['image']) ?>
