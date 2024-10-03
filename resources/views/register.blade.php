@extends('common.index')

@section('content')

<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Maak een account</h1>
</div>

<div class="px-5 py-12 max-w-[500px] mx-auto">
    

   

    <form>
        <div class="flex flex-col gap-2 mb-4 mt-8">
            <label class="text-sm text-[#3C3C3C]">E-mail</label>
            <input type="email" autocomplete="off" placeholder="naam@domein.com" class="bg-white rounded-xl px-5 py-4 text-sm"  />
        </div>        
        <button class="bg-red rounded-xl px-5 py-4 text-xl font-bold w-full text-white">Volgende</button>

    </form>

    <hr class="my-8" />


    <div class="flex flex-col gap-2">
        <button class="bg-white rounded-xl px-5 py-4 flex gap-4 items-center justify-center">
        <svg fill="#000000"  version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  width="20"
	 height="20" viewBox="0 0 512 512" xml:space="preserve">
<g id="7935ec95c421cee6d86eb22ecd114eed">
<path style="display: inline;" d="M248.644,123.476c-5.45-29.71,8.598-60.285,25.516-80.89
		c18.645-22.735,50.642-40.17,77.986-42.086c4.619,31.149-8.093,61.498-24.826,82.965
		C309.37,106.527,278.508,124.411,248.644,123.476z M409.034,231.131c8.461-23.606,25.223-44.845,51.227-59.175
		c-26.278-32.792-63.173-51.83-97.99-51.83c-46.065,0-65.542,21.947-97.538,21.947c-32.96,0-57.965-21.947-97.866-21.947
		c-39.127,0-80.776,23.848-107.19,64.577c-9.712,15.055-16.291,33.758-19.879,54.59c-9.956,58.439,4.916,134.557,49.279,202.144
		c21.57,32.796,50.321,69.737,87.881,70.059c33.459,0.327,42.951-21.392,88.246-21.616c45.362-0.258,53.959,21.841,87.372,21.522
		c37.571-0.317,67.906-41.199,89.476-73.991c15.359-23.532,21.167-35.418,33.11-62.023
		C414.435,352.487,389.459,285.571,409.034,231.131z">

</path>
</g>
</svg>
Maak een account via Apple</button>

        <button class="bg-white rounded-xl px-5 py-4 flex gap-4 items-center justify-center">
        <svg width="20"   height="20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0.21 0.53 45.93 46.93">   <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">         <g id="Color-" transform="translate(-401.000000, -860.000000)">             <g id="Google" transform="translate(401.000000, 860.000000)">                 <path d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24" id="Fill-1" fill="#FBBC05">  </path>                 <path d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333" id="Fill-2" fill="#EB4335">  </path>                 <path d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667" id="Fill-3" fill="#34A853">  </path>                 <path d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24" id="Fill-4" fill="#4285F4">  </path>             </g>         </g>     </g> </svg>
        Maak een account via Google</button>
        <button class="bg-white rounded-xl px-5 py-4 flex gap-4 items-center justify-center">       
        <svg width="20" height="20" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none"><path fill="#F35325" d="M1 1h6.5v6.5H1V1z"/><path fill="#81BC06" d="M8.5 1H15v6.5H8.5V1z"/><path fill="#05A6F0" d="M1 8.5h6.5V15H1V8.5z"/><path fill="#FFBA08" d="M8.5 8.5H15V15H8.5V8.5z"/></svg>
        Maak een account via Microsoft</button>
    </div>
    <hr class="my-8" />

    <div class="text-center mt-7">
        <div class="mt-8">Heb je al een account? <a class="underline text-white" href="/">Log hier in.</a></div>
    </div>

</div>

@endsection