@extends('master')
@section('content')
<div class="container col-6">
    <div class="card mt-5">
        <div class="card-header">
            <p class="text-center">Login</p>
        </div>
        <div class="card-body">
            <form action="" method="POST" class="form container">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ old("email") }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="submit" value="đăng nhập">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
