<div>
    @foreach ($service as $item)
    {{$item->title}}
    @endforeach

</div>

<form action="/view" method="POST">
    @csrf
    <h1>Creat Services</h1>
    <p>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        @error('title')
    <p>{{$message}}</p>
        @enderror
    </p>
    <p>
        <input type="submit" value="ADD" name="submit">
    </p>
</form>
