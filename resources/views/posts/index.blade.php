<h1>Post List</h1>

<a href="/posts/create">Create A Post</a>

<ul>
    @foreach($posts as $post)
    <li>
        <a href="/posts/show/{{ $post->id }}">{{ $post->title }}</a>
        [<a href="/posts/edit/{{ $post->id }}">Edit</a>]
        [<a href="">Delete</a>]
    </li>
    @endforeach
</ul>