<h1>Post List</h1>

<a href="/posts/create">Create A Post</a>

<ul>
    @foreach($posts as $post)
    <li>
        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
        [<a href="/posts/{{ $post->id }}/edit/">Edit</a>]
        <form action="/posts/{{ $post->id }}" 
            method="POST" 
            onsubmit="return confirm('Are you sure to delete?')">
            @method('DELETE')
            {{-- <input type="hidden" name="_method" value="DELETE"> --}}
            @csrf
            <button type="submit">Delete</button>
        </form>
    </li>
    @endforeach
</ul>