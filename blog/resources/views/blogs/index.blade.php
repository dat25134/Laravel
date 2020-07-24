@extends('form')
@extends('blogs.navbar')
@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-10">
            <h2>Những bài post...</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">By</th>
                        <th scope="col">Ngày đăng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                    <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td><a href="/blogs/{{$item->id}}">{{$item->title}}</a></td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="page">
                {{ $posts->links() }}
            </div>
        </div>
        <div class="col-2 new">
            <h2>New</h2>
            @foreach ($new as $item)
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-newspaper" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 2A1.5 1.5 0 0 1 1.5.5h11A1.5 1.5 0 0 1 14 2v12a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 0 14V2zm1.5-.5A.5.5 0 0 0 1 2v12a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V2a.5.5 0 0 0-.5-.5h-11z"/>
                <path fill-rule="evenodd" d="M15.5 3a.5.5 0 0 1 .5.5V14a1.5 1.5 0 0 1-1.5 1.5h-3v-1h3a.5.5 0 0 0 .5-.5V3.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
              </svg><a href="/blogs/{{$item->id}}">{{$item->title}}</a> <br>
            <span> Đăng bởi {{$item->user->name}}</span> <br>
            @endforeach
        </div>
    </div>
</div>
@endsection
