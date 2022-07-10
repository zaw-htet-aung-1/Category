@csrf
<div class="mb-3">
    <label class="form-label">Name</label>
    <input 
    class="form-control @error('name') is-invalid @enderror"
     type="text" 
     name="name"
     value="{{ old('name', $category->name) }}">
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>