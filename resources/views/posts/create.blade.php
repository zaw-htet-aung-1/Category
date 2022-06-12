<h1>Create A Post</h1>

{{-- @if($errors->any()) 
    <ul>
        @foreach($errors->all() as $error)
        <li style="color: red;">{{ $error }}</li>
        @endforeach
    </ul>
@endif --}}

<form action="/posts" method="POST">
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    @csrf

    <label>Post Title</label>
    <input type="text" name="title" value="{{ old('title') }}">
    @error('title')
    <div style="color: red">{{ $message }}</div>
    @enderror
    <br><br>

    <label>Post Body</label>
    <textarea name="body">{{ old('body') }}</textarea>
    @error('body')
    <div style="color: red">{{ $message }}</div>
    @enderror
    <br><br>

    <button type="submit">Create</button>
</form>