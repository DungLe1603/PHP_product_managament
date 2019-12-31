@extends('master')
@section('content')
@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container col-8 mt-5">
    <div class="card">
        <div class="card-header">Detail Product</div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" class="form container">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" class="form-control" id="category">
                        @foreach($categories as $category)
                            @if($product->category->name == $category->name)
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach                    
                    </select>
                </div>
                <div class="form-group">
                    <input type="file" name="images[]" class="form-control" id="images" multiple>
                </div>
                <div class="form-group">
                    <p>Choose the image to delete</p>
                    @foreach($images as $image)
                        <img src="{{URL::to('/upload/product/'.$product->id.'/'.$image->name)}}" class="rounded">
                        <input type="checkbox" class="form-check-input" value="{{$image->id}}" name="Dimages[]">
                    @endforeach   
                </div>
                <input type="submit" value="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection