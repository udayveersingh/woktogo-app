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
                    Algemene voorwaarden
                </div>
                <div class="text-left text-white">
                    <p class="text-sm">Algemene voorwaarden
                    </p>
                    <p class="text-sm">
                        #woktogo<br>
                        Algemene Voorwaarden voor het
                        Spaarpuntenprogramma van Wok to Go
                        Rotterdam Coolsingel 121
                    </p>
                    <br>
                    <p class="text-sm">1. Toepasselijkheid </p>
                    <p class="text-sm"><br>
                        Deze voorwaarden gelden voor het
                        spaarpuntenprogramma van Wok to Go,
                        gevestigd aan de Coolsingel 121, 3012 AG
                        Rotterdam. Deelname is alleen mogelijk bij
                        dit specifieke restaurant.
                    </p>
                    <br>
                    <p class="text-sm">2. Deelname</p>
                    <p class="text-sm"><br>
                        edere klant kan deelnemen aan het
                        spaarprogramma door een account aan te
                        maken in onze app. Deelname is gratis en
                        vrijwillig.
                    </p>
                    <br>
                    <p class="text-sm">3. Punten Sparen </p>
                    <p class="text-sm">
                        - Voor elke euro die u besteedt, ontvangt u 1 spaarpunt.
                        <br>
                        - Punten worden toegekend bij het afrekenen,
                        mits u uw digitale klantenkaart in de app scant.
                        <br>
                        - Er geldt een maximum van 1.000 punten
                        per account. Bij overschrijding van dit
                        maximum worden geen extra punten
                        toegekend totdat u punten inwisselt.
                    </p>
                    <br>
                    <p class="text-sm">4.Punten Inwisselen </p>
                    <p class="text-sm">
                        - Gespaarde punten kunt u inwisselen voor
                        geselecteerde producten uit ons menu.
                        <br>
                        - Het aanbod van inwisselbare producten en
                        het aantal benodigde punten vindt u in de app.
                        <br>
                        - Punten zijn niet inwisselbaar voor contant
                        geld en kunnen niet worden overgedragen.
                    </p>
                    <br>
                    <p class="text-sm">5.Geldigheid van Punten</p>
                    <br>
                    <p class="text-sm">
                        Punten zijn 12 maanden geldig vanaf de
                        datum van toekenning. Na deze periode
                        vervallen de punten automatisch.
                    </p>
                    <br>
                    <p class="text-sm">6.Wijzigingen en Annuleringen</p>
                    <p class="text-sm">
                        - Wok to Go behoudt zich het recht voor om
                        op elk moment het spaarprogramma, inclusief
                        de voorwaarden, te wijzigen of te beëindigen.
                        <br>
                        - Wij behouden ons het recht voor om deals
                        of aanbiedingen te wijzigen of te annuleren
                        zonder voorafgaande kennisgeving.
                        <br>
                        - Wij behouden ons het recht voor om het
                        puntensysteem aan te passen, inclusief het
                        aantal punten dat wordt toegekend per
                        bestede euro.
                    </p>
                    <br>

                    <p class="text-sm">7. Beëindiging Deelname </p>
                    <p class="text-sm">
                        Wok to Go behoudt zich het recht voor om
                        uw deelname aan het spaarprogramma te
                        beëindigen en uw punten te annuleren in
                        geval van fraude, misbruik of andere
                        schendingen van deze voorwaarden.
                    </p>
                    <br>

                    <p class="text-sm">8. Privacy </p>
                    <p class="text-sm">
                        Uw persoonsgegevens worden verwerkt in
                        overeenstemming met onze privacyverklaring,
                        beschikbaar op onze website.
                    </p>

                    <p class="text-sm">9. Aansprakelijkheid </p>
                    <p class="text-sm">
                        Wok to Go is niet aansprakelijk voor verlies
                        of schade voortvloeiend uit of in verband met
                        deelname aan het spaarprogramma, tenzij
                        deze schade het gevolg is van opzet of grove
                        nalatigheid van Wok to Go.
                    </p>
                    <br>
                    <p class="text-sm">10.Contactgegevens </p>
                    <p class="text-sm">
                        Voor vragen of opmerkingen over het
                        spaarprogramma kunt u contact opnemen
                        met Wok to Go Coolsingel 121, 3012 AG
                        Rotterdam.<br>
                        Deze voorwaarden zijn voor het laatst
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