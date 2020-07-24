@extends('form')
@extends('blogs.navbar')
@section('title', 'Edit bài viết')
@section('content')
<form action="/blogs/creatpost" class="text-center" method="POST">
    @csrf
    <div class="input-group input-group-sm mb-3 mt-5">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Title</span>
        </div>
        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="title">
      </div>
    <div class="container-fluid mt-5">
        <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <textarea name="editor1"></textarea>
        <script>
                config = {};
                config.entities_latin = false;
                config.language = 'vi';
                CKEDITOR.replace( 'editor1',config );
        </script>
    </div>
    <input type="submit" value=" THÊM BÀI VIẾT " class="btn btn-secondary mt-3">
</form>

@endsection


