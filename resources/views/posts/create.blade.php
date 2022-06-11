<h1>Create A Post</h1>

<form action="/posts/store" method="POST">
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    @csrf

    <label>Post Title</label>
    <input type="text" name="title">
    <br><br>

    <label>Post Body</label>
    <textarea name="body"></textarea>
    <br><br>

    <button type="submit">Create</button>
</form>