@extends('layouts')

@section('content')
    <h1 class="text-center">Login</h1>
    <form action="{{ route('sign') }}" method="POST">
        @csrf
        <div class="card card-shadow col-6 mt-5 mx-auto">
            <div class="card-body">
                <div class="form-group">
                    <p class="form-label">E-mail</p>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <p class="form-label">Password</p>
                    <input type="password" class="form-control" name="password">
                </div>
                <button class="btn btn-primary">Sign In</button>
            </div>
        </div>
    </form>
@endsection
