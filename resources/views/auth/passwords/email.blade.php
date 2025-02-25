@extends('common.index')

@section('content')
<style>
    .login-btn {
        display: table;
        justify-content: center;
        width: auto;
        margin: 0 auto;
        margin-top: 10px;

    }
</style>
<div class="container mt-24 mx-auto p-4 md:p-8">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Forgot Your Password?</h1>

    <form method="POST" action="{{ route('password.email') }}" class="max-w-md mx-auto">
        @csrf

        <div class="mb-6">
            <label for="email" class="block text-md font-medium text-gray-700">Email</label>
            <input id="email" type="email" name="email" placeholder="Enter your Email Address" required autofocus class="mt-2 block w-full focus:border-none rounded-md shadow-sm outline-none focus:ring focus:ring-blue-400 py-2 px-4 text-center">
        </div>

        <div>
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-4 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Stuur wachtwoord reset link
            </button>
        </div>
    </form>

    <a href="{{route('login')}}" class="text-white bg-red px-7 py-4 rounded-xl d-block rounded-xl login-btn">Login</a>

    @if(session('status'))
    <div class="mt-4 text-green-500 text-center">
        {{ session('status') }}
    </div>
    @endif

    @if($errors->any())
    <div class="mt-4 text-red-500 text-center">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>

@endsection