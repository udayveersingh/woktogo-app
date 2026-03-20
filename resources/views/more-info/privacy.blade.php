@extends('common.index')

@section('content')

<style>
      .scrollbar-hide {
    -ms-overflow-style: none;  /* IE & Edge */
    scrollbar-width: none;     /* Firefox */
  }

  .scrollbar-hide::-webkit-scrollbar {
    display: none;             /* Chrome, Safari */
  }
</style>

<div class="bg-black text-white flex flex-col items-center relative min-h-dvh py-4">
    <img class="w-full object-cover h-full absolute top-0 left-0 opacity-30" src="{{ asset('images/signup_screen_bg.jpg') }}" alt="banner" />
    <a class="relative mb-4 md:mb-8" href="/public"><img class="h-[55px]" src="{{ asset('images/logo.webp') }}" alt="" /></a>
  


<div class="px-5 py-4 max-w-[500px] w-full relative flex-auto flex flex-col justify-center">

<div class="my-auto">
    
    <a href="{{ url()->previous() }}" class="rounded-full bg-[#ff0511] w-8 h-8 border-none flex justify-center items-center mb-4 mx-auto">
        <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="arrow-ios-back">
                    <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                    <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                </g>
            </g>
        </svg>
    </a>
    
    <h1 class="text-2xl md:text-4xl relative font-bold uppercase text-center mb-8">Meer informatie</h1>

    <div class="overflow-auto max-h-[60vh] h-full scrollbar-hide">
        <div class="flex flex-col rounded-lg overflow-hidden group relative">            
                <div class="font-bold text-xl text-white mb-4">
                    Privacy
                </div>
                
                <div class="text-left text-white">
                    <p class="text-sm">1. Wie zijn wij? </p>
                    <p class="text-sm">
                        Wij zijn Wok to Go Rotterdam, gevestigd aan
                        de Coolsingel 121, 3012 AG Rotterdam.
                        Onze app stelt u in staat om bestellingen te
                        plaatsen en deel te nemen aan ons
                        spaarprogramma.
                    </p>
                    <br>
                    <p class="text-sm">2.Welke gegevens verzamelen wij? </p>
                    <p class="text-sm"><br>
                        Wanneer u onze app gebruikt, verzamelen wij
                        de volgende persoonsgegevens:
                        <br></br>
                        Naam: uw voor- en achternaam.
                        <br></br>
                        E-mailadres: om u te kunnen bereiken.
                        <br></br>
                        Geboortedatum: om uw leeftijd te bevestigen.
                        <br></br>
                        Woonplaats: om onze diensten beter op u af
                        te stemmen.
                        <br></br>
                        Gebruikersnaam en wachtwoord: voor
                        toegang tot uw account.
                    </p>
                    <br>
                    <p class="text-sm">3.Waarom verzamelen wij deze gegevens? </p>
                    <p class="text-sm"><br>
                        Wij gebruiken uw gegevens om:
                        <br></br>
                        Uw account aan te maken en te beheren.
                        <br></br>
                        Uw bestellingen te verwerken.
                        <br></br>
                        U te informeren over uw spaarpunten en
                        aanbiedingen.
                        <br></br>
                        Onze diensten te verbeteren en aan te
                        passen aan uw voorkeuren.
                        <br></br>
                    </p>
                    <br>
                    <p class="text-sm">4. Hoe beveiligen wij uw gegevens? </p>
                    <p class="text-sm">
                        Wij nemen passende maatregelen om uw
                        gegevens te beschermen tegen verlies of
                        ongeoorloofde toegang. Uw gegevens worden
                        veilig opgeslagen en zijn alleen toegankelijk
                        voor geautoriseerd personeel.
                    </p>
                    <br>
                    <p class="text-sm">5. Delen wij uw gegevens met derden? </p>
                    <p class="text-sm">
                        Wij delen uw persoonsgegevens niet met
                        derden, tenzij dit noodzakelijk is voor onze
                        dienstverlening, zoals bezorging van uw
                        bestelling, of wanneer wij wettelijk verplicht
                        zijn dit te doen. De app wordt ontwikkeld en
                        beheerd door Brown & Brown in opdracht van
                        Wok to Go Rotterdam. Brown & Brown heeft
                        toegang tot uw gegevens om de app goed te
                        laten functioneren en technische
                        ondersteuning te bieden.
                    </p>
                    <br>
                    <p class="text-sm">6. Hoe lang bewaren wij uw gegevens? </p>
                    <p class="text-sm">
                        Wij bewaren uw gegevens niet langer dan
                        nodig is voor de doeleinden waarvoor ze zijn
                        verzameld, tenzij een langere bewaartermijn
                        wettelijk is vereist.
                    </p>
                    <br>
                    <p class="text-sm">7. Uw rechten</p>
                    <br>
                    <p class="text-sm">
                        U heeft het recht om:
                        <br>
                        Uw gegevens in te zien.
                        <br>
                        Onjuiste gegevens te laten corrigeren.
                        <br>
                        Uw gegevens te laten verwijderen, mits dit
                        niet in strijd is met wettelijke verplichtingen.
                        <br></br>
                        Beperking van de verwerking te vragen.
                        <br></br>
                        Bezwaar te maken tegen bepaalde
                        verwerkingen.
                        <br><br>
                        Uw gegevens over te dragen aan een andere
                        partij.
                        <br></br>
                        Voor vragen of verzoeken kunt u contact
                        opnemen via kern@brown-brown.nl.
                    </p>

                    <br>
                    <p class="text-sm">8. Wijzigingen in deze privacyverklaring </p>
                    <p class="text-sm">
                        Wij kunnen deze privacyverklaring
                        aanpassen. Wij raden u aan regelmatig deze
                        verklaring te raadplegen.
                    </p>

                    <p class="text-sm">9. Contactgegevens </p>
                    <p class="text-sm">
                        Wok to Go RotterdamCoolsingel 1213012 AG
                        RotterdamE-mail: james@woktogo.nl
                        Deze privacyverklaring is voor het laatst
                        bijgewerkt op 18 maart 2025.
                    </p>
                </div>
        </div><!--/Deal card -->


    </div>


</div>


    <div class="mt-auto text-center text-xs pt-4">
        <a class="px-2" href="{{route('voorwaarden')}}"><u>Algemene Voorwaarden</u></a> | <a class="px-2" href="{{route('privacy')}}"><u>Privacy</u></a> 
    </div> 

</div>
</div>

@endsection