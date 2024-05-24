@extends("layouts.app")
@section('title', 'Show post')
@section('content')

{{$post['id']}}
<br>
{{$post['title']}}
<br>
{{$post['body']}}

@endsection
