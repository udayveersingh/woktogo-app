@extends('common.index')

@section('content')
<div class="px-5 py-12 max-w-[500px] mx-auto">
    <!-- resources/views/auth/passwords/reset.blade.php -->
    <!-- <form method="POST" action="{{ route('password-update') }}">
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
@endif -->

    <form action="{{ route('password-update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">E-mailadres</label>
            <input type="email" name="email" autocomplete="off" placeholder="E-mailadres" value="{{ old('email', $email) }}" class="bg-white rounded-xl px-5 py-4 text-sm" />
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Nieuw wachtwoord</label>
            <input type="password" name="password" placeholder="Nieuw wachtwoord" class="bg-white rounded-xl px-5 py-4 text-sm" />
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Bevestig wachtwoord</label>
            <input type="password" name="password_confirmation" class="bg-white rounded-xl px-5 py-4 text-sm" />
        </div>
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <button class="bg-red rounded-xl px-5 py-4 text-xl font-bold w-full text-white">Wachtwoord opnieuw instellen</button>

    </form>
</div>

@endsection