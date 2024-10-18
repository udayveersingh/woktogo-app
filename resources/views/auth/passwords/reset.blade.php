@extends('common.index')

@section('content')

<!-- resources/views/auth/passwords/reset.blade.php -->
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    
    <div>
        <label for="email">Email Address</label>
        <input type="email" name="email" value="{{ old('email', $email) }}" required autofocus>
    </div>
    <div>
        <label for="password">New Password</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" required>
    </div>
    <div>
        <button type="submit">Reset Password</button>
    </div>
    
    @if($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>

@if(session('status'))
    <div class="text-green-500">
        {{ session('status') }}
    </div>
@endif

@endsection