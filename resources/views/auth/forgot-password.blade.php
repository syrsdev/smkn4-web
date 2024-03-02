@extends('layouts.auth')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Lupa Password</h4>
        </div>
        <div class="card-body">
            <p class="text-muted">Kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.</p>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
            @endif
            <form action="{{ route('password.email') }}" method="POST" class="needs-validation">
                @csrf
                <div class="form-group">
                    <label for="email">Email Kamu</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" value="{{ old('email') }}" placeholder="email@domain.com" required autofocus>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Lupa Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection