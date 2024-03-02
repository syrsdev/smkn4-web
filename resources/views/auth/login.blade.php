@extends('layouts.auth')

@section('content')    
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>
        <div class="card-body">
            @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
            @endif
            <form action="{{ route('login.store') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" value="{{ old('email') }}" placeholder="email@domain.com" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" placeholder="********" aria-describedby="passwordHelpBlock" required>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        <a href="{{ route('password.request') }}">Lupa Password?</a>
                    </small>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection