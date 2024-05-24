@extends("layouts.app")
@section('title',"Edit")
@section('content')

<form action="/posts/{{$post['id']}}" method="post">
    @csrf
    @method('put')
    Title<input type="text" name="title" value="{{$post['title']}}" placeholder="Title"><br>
    Body<input type="text" name="body" value="{{$post['body']}}" placeholder="body"><br>
    Posted By<input type="text" name="user_id" value="{{$post->user->id}}" placeholder="user id"><br>
    <input type="submit" value="Edit Post">

</form>

@endsection