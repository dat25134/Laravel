@extends('form')
@extends('blogs.navbar')
@section('title', 'Home')

@section('content')
<div class="container-fluid mt-5">
    <h2>{{$post->title}}</h2>
    <div class="container">
        {!!$post->content!!}
    </div>
</div>
@endsection

