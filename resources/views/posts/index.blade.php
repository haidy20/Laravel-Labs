@extends("layouts.app")
@section('title',"My Project")
@section('content')
<a href="/posts/create" class="btn btn-primary">Create</a>

<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
  <!-- <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        form input[type="submit"] {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>-->
</head>
<body>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Body</th>
            <th>Posted by</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post['id']}}</td>
            <td>{{$post['title']}}</td>
            <td>{{$post['body']}}</td>
           <td>{{$post->user->name}}</td>

            <td><a href="{{route('posts.show',$post['id'])}}" class="btn btn-primary">view </a></td>
            <td><a href="/posts/{{$post['id']}}/edit" class="btn btn-warning">Edit </a></td>

            <td>
                <form action="/posts/{{$post['id']}}" method="post">
                    @method("delete")
                    @csrf
                    <input type="submit" value="delete" class="btn btn-danger">
                </form>
            </td>

        </tr>
        @endforeach
    </table>
    {{$posts->links()}}
 
    @endsection
    <!-- <script>
        // Hide pagination arrows
        document.addEventListener("DOMContentLoaded", function() {
            var pagination = document.querySelector('.pagination');
            pagination.style.display = 'none';
        });
    </script> -->
</body>
</html>
