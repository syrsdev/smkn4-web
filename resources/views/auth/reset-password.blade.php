@extends('layouts.auth')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Atur Ulang Password</h4>
        </div>
        <div class="card-body">
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
            <form action="{{ route('password.store') }}" method="POST" class="needs-validation">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}" required>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" value="{{ old('email', $email) }}" required readonly>
                </div>
                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" placeholder="********" autofocus required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" tabindex="2" placeholder="********" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Atur Ulang Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection
