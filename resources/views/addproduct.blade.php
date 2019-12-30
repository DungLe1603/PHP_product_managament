@extends('master')
@section('content')
<div class="card">
    <div class="card-header">abc</div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" class="form container">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" class="form-control" id="category">
                    @foreach ($category as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="file" name="images[]" class="form-control" id="images" multiple>
            </div>
            <input type="submit" value="submit" class="btn btn-primary">
            <a href="{{ route('showProduct') }}" class="btn btn-primary">Quay lai</a>
        </form>
    </div>
</div>
@endsection
