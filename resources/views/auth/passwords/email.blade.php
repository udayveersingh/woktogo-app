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

<div class="bg-black text-white flex flex-col items-center relative min-h-dvh py-4">
    <img class="w-full object-cover h-full absolute top-0 left-0 opacity-30" src="{{ asset('images/signup_screen_bg.jpg') }}" alt="banner" />
    <a class="relative mb-4 md:mb-8" href="/public"><img class="h-[55px]" src="{{ asset('images/logo.webp') }}" alt="" /></a>
  

<div class="px-5 py-4 max-w-[500px] w-full relative flex-auto flex flex-col justify-center">

<div class="my-auto">
   
    <h1 class="text-2xl md:text-4xl relative font-bold uppercase text-center mb-8">Forgot Your Password?</h1>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-6">
            <label for="email" class="text-md font-medium text-gray-700 hidden">Email</label>
            <input id="email" type="email" name="email" placeholder="Enter your Email Address" required autofocus class="w-full rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center" style="background:transparent !important">
        </div>

        <div>
            <button type="submit" class="bg-[#ff0511] rounded-full px-5 py-4 text-xl font-bold w-full text-white">
                Stuur wachtwoord reset link
            </button>
        </div>
    </form>

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

    <div class="text-center mt-7">
        <div class="mt-8"><a class="underline text-sm text-white" href="{{route('login')}}">Log hier in.</a></div>
    </div>


</div>


    <div class="mt-auto text-center text-xs pt-4">
        <a class="px-2" href="{{route('voorwaarden')}}"><u>Algemene Voorwaarden</u></a> | <a class="px-2" href="{{route('privacy')}}"><u>Privacy</u></a> 
    </div> 

</div>
</div>

@endsection