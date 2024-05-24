<table border=2>
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Body</th>
    <th>Posted by</th>
</tr>

@foreach ( $posts as $post )
<tr>
    <td>{{$post['id']}}</td>
    <td>{{$post['title']}}</td>
    <td>{{$post['body']}}</td>
    <td>{{$post['posted_by']}}</td>
</tr>

@endforeach

</table>