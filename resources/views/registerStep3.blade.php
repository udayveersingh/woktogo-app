@extends('common.index')

@section('content')

<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Maak een wachtwoord</h1>
</div>

<div class="px-5 py-12 max-w-[500px] mx-auto">

    <a href="{{ url()->previous() }}" class="rounded-full bg-red w-8 h-8 border-none inline-flex justify-center items-center mb-20">
    <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">  <g data-name="Layer 2">  <g data-name="arrow-ios-back">  <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>  <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path></g></g></svg>
    </a>

    <form>
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Naam</label>
            <input type="text" placeholder="Dit is jouw profielnaam" class="bg-white rounded-xl px-5 py-4 text-sm"  />
        </div>

        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Geboortedatum</label>
            <div class="flex gap-2">
                <input type="text" placeholder="21" class="w-full bg-white rounded-xl px-5 py-4 text-sm"  />
                <input type="text" placeholder="Juni" class="w-full bg-white rounded-xl px-5 py-4 text-sm"  />
                <input type="text" placeholder="1999" class="w-full bg-white rounded-xl px-5 py-4 text-sm"  />
            </div>
        </div>

        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Gelacht</label>
            <select class="bg-white rounded-xl px-5 py-4 text-sm">
                <option>Vrouw</option>
                <option>Vrouw</option>
                <option>Vrouw</option>
                <option>Vrouw</option>
            </select>
        </div>

        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Telefoonnummer</label>
            <input type="text" placeholder="Telefoonnummer" class="bg-white rounded-xl px-5 py-4 text-sm"  />
        </div>

        <div class="flex flex-col gap-1 mb-4">
            <h3 class="text-lg font-bold">De vragen hieronder zijn niet verplicht</h3> 
            <p class="text-sm">
            Maar het helpt ons betere deals voor je te maken.
            </p>
        </div>

        <div class="flex flex-col gap-1 mb-4">
            <label class="text-base font-bold text-[#3C3C3C] mb-2">1. Hoe vaak eet je Wok To Go?</label>
            <label class="flex gap-2"><input type="radio" name="signupQOne"/> Elke week</label>
            <label class="flex gap-2"><input type="radio" name="signupQOne"/> 1 keer per maand</label>
            <label class="flex gap-2"><input type="radio" name="signupQOne"/> 2 keer per maand</label>
        </div>

        <div class="flex flex-col gap-1 mb-4">
            <label class="text-base font-bold text-[#3C3C3C] mb-2">2. Welke deals zijn gewenst?</label>
            <label class="flex gap-2"><input type="radio" name="signupQTwo"/> Korting op hoofdgerechten</label>
            <label class="flex gap-2"><input type="radio" name="signupQTwo"/> Gratis drankjes</label>
            <label class="flex gap-2"><input type="radio" name="signupQTwo"/> Combo aanbiedingen</label>
            <label class="flex gap-2"><input type="radio" name="signupQTwo"/> Seizoensgebonden specials</label>
        </div>

        <div class="flex flex-col gap-1 mb-4">
            <label class="text-base font-bold text-[#3C3C3C] mb-2">3. Favoriet gerecht</label>
            <label class="flex gap-2"><input type="radio" name="signupQThree"/> Kip</label>
            <label class="flex gap-2"><input type="radio" name="signupQThree"/> Rund</label>
            <label class="flex gap-2"><input type="radio" name="signupQThree"/> Vis</label>
            <label class="flex gap-2"><input type="radio" name="signupQThree"/> Vega</label>
        </div>

        <div class="flex flex-col gap-1 mb-4">
            <label class="text-base font-bold text-[#3C3C3C] mb-2">4. Met wie eet je?</label>
            <label class="flex gap-2"><input type="radio" name="signupQFour"/> Alleen</label>
            <label class="flex gap-2"><input type="radio" name="signupQFour"/> Vrienden</label>
            <label class="flex gap-2"><input type="radio" name="signupQFour"/> Collega’s</label>
            <label class="flex gap-2"><input type="radio" name="signupQFour"/> Familie</label>
        </div>

        <div class="flex flex-col gap-1 mb-4">
            <label class="text-base font-bold text-[#3C3C3C] mb-2">5. Van waar kom je?</label>
            <label class="flex gap-2"><input type="radio" name="signupQFive"/> Binnenstad</label>
            <label class="flex gap-2"><input type="radio" name="signupQFive"/> Buitenwijken</label>
            <label class="flex gap-2"><input type="radio" name="signupQFive"/> Buiten Rotterdam</label>
        </div>
        
       
        <button class="bg-red rounded-xl px-5 py-3 text-xl font-bold w-full text-white">Volgende</button>

    </form>

</div>

@endsection