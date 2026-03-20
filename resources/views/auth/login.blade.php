@extends('common.index')

@section('content')
<style>

.text-line-box {
    position: relative;
    width: 100%;
    float: left;
    margin-top: 40px;
    margin-bottom: 40px;
}
.text-line-inner {
    border-bottom: 1px solid #fff;
   
}
.text-line-box h3 {
   
    width: 35px;
    position: absolute;
    margin: 0 auto;
    z-index: 9;
    color: #fff;
    left: 0px;
    right: 0px;
    top:-13px;

}
</style>

<div class="bg-black text-white flex flex-col items-center relative min-h-dvh py-4">
    <img class="w-full object-cover h-full absolute top-0 left-0 opacity-30" src="{{ asset('images/login_screen_bg2.jpg') }}" alt="banner" />
    <a class="relative mb-4 md:mb-8" href="/public"><img class="h-[55px]" src="{{ asset('images/logo.webp') }}" alt="" /></a>


    


<div class="px-5 py-4 max-w-[500px] w-full relative flex-auto flex flex-col justify-center">

<div class="my-auto">
<h1 class="text-2xl md:text-4xl relative font-bold uppercase text-center mb-8">Login</h1>

    @session('error')
    <div class="bg-[#b91f25]/[0.5] rounded-xl border border-red p-1 text-white text-sm text-center my-1" role="alert">
        {{ $value }}
    </div>
    @endsession

    @session('success')
    <div class="bg-[#196450]/[0.5] rounded-xl border border-secondary p-1 text-white text-sm text-center my-1" role="alert">
        {{ $value }}
    </div>
    @endsession


    <form action="{{route('login.post')}}" method="POST">
        @csrf
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-white hidden">E-mail of gebruikersnaam</label>
            <input type="email" name="email" autocomplete="off" placeholder="E-mail of gebruikersnaam" class="rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center" style="background:transparent !important" />
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C] hidden">Wachtwoord</label>
            <input type="password" name="password" placeholder="Wachtwoord" class="rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center" style="background:transparent !important" />
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="flex flex-col gap-2 mb-4">
            
        <label class="flex gap-2 items-center cursor-pointer group relative">
            <input type="checkbox" name="remember" id="remember" class="peer hidden" />
            
            <!-- Circle border -->
        <span class="w-5 h-5 rounded-full border-2 border-gray-300 
                    peer-checked:border-white peer-checked:bg-white/10
                    transition-all duration-200">
        </span>

    <!-- Check icon (sibling of peer, absolutely positioned over the circle) -->
    <svg class="w-2.5 h-2.5 text-white absolute left-[5px] 
                hidden peer-checked:block" 
         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" 
         fill="none" stroke="currentColor" stroke-width="3" 
         stroke-linecap="round" stroke-linejoin="round">
        <polyline points="20 6 9 17 4 12"></polyline>
    </svg>

    <!-- Label -->
    <span class="text-white/50">Onthoud mij</span>
            
        </label>

        
        </div>

        <button type="submit" class="bg-[#ff0511] rounded-full px-5 py-4 text-xl font-bold w-full text-white">Login</button>

    </form>

    <div class="text-center mt-7">
        <a href="{{ route('password.request') }}" class="underline opacity-50 hover:opacity-100">Wachtwoord vergeten?</a>
        
        <div class="mt-5"><span class=" opacity-50">Geen account?</span> <a class="underline text-white" href="/register">Maak een account aan</a></div>
    </div>

    <div class="text-center">
        <div class="mt-5"><span class="opacity-50 block">Problemen met inloggen? </span><a class="underline text-white" href="{{route('support')}}">Stuur een e-mail</a></div>
    </div>

    </div>


    <div class="mt-auto text-center text-xs pt-4">
        <a class="px-2" href="{{route('voorwaarden')}}"><u>Algemene Voorwaarden</u></a> | <a class="px-2" href="{{route('privacy')}}"><u>Privacy</u></a> 
    </div> 
    

</div>

</div>
@endsection