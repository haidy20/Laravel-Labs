@extends("layouts.app")
@section('title', 'Create')
@section('content')

<style>
    /* Add your custom styles here */
    form {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .alert ul {
        margin-top: 0;
        margin-bottom: 0;
    }

    .alert li {
        list-style: none;
    }
</style>

<form action="/posts" method="post">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" placeholder="Title" class="form-control"><br>
    <label for="body">Body:</label>
    <input type="text" name="body" placeholder="Body" class="form-control"><br>
    <input type="submit" value="Add Post">
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
