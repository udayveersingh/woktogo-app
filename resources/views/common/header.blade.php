<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Woktogo</title>
    @vite('resources/css/app.css')
    <style>
        input::placeholder {
            color:#000;
            /* Light gray color for the placeholder text */
        }

        .invalid-feedback {
            color: red;
            font-weight: bold;
        }

        .btn-group li a {
            width: auto;
            display: block;
            margin: 0 auto;
        }

        .btn-group li button {
            display: block;
            margin: 0 auto;
            margin-top: 25%;
            width: 195px;
        }

        .btn-group li:nth-child(4) {
            width: auto;
            color: #000;
        }

        .btn-group li {
            width: 100%;
            float: none;
            margin: 0 auto;
        }

        .btn-group li:nth-child(3) {
            margin-bottom: 30% ! important;
        }

        .custom-hr {
            width: 375px;
            margin-top: 40px;
            margin-bottom: 15px;
            border: none;
            height: 1px;
            background-color: #FFFFFF;
            /* You can change this to any color you prefer */
        }

        /* For screens larger than 768px (desktops and tablets) */
        @media (min-width: 768px) {
            .custom-hr {
                width: 375px;
                margin-left: auto;
                margin-right: auto;
            }
        }

        /* For screens smaller than 768px (mobile devices) */
        @media (max-width: 767px) {
            .custom-hr {
                width: 76%;
                /* This will make the line stretch more on smaller screens */
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>
</head>
<!-- dark:text-white/50  remove class for dark mode screen 01-04-2025 -->
<body class="font-sans antialiased dark:bg-black flex flex-col h-full">
    <div class="bg-secondary py-4 h-[63px] px-5 flex justify-between z-50">
        <a class="relative" href="/public"><img class="h-[55px]" src="{{ asset('images/logo.webp') }}" alt="" /></a>

        @auth
        <!-- Logout Button -->
        <!-- <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="bg-red-600 text-white font-semibold py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                Logout
            </button>
        </form> -->
        @else
        <!-- <p class="text-gray-600">You are not logged in.</p> -->
        @endauth


        @auth
        <div class="cursor-pointer text-white mt-4">
            <nav>
                <!--Hamburger menu icon svg to trigger the slide-in menu when clicked-->
                <div onclick="openNav()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18.853" height="12" viewBox="0 0 18.853 12">
                        <g id="Icon_feather-menu" data-name="Icon feather-menu" transform="translate(-4.5 -8)">
                            <path id="Path_3" data-name="Path 3" d="M4.5,18H23.353" transform="translate(0 -4)" fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="2" />
                            <path id="Path_4" data-name="Path 4" d="M4.5,9H23.353" transform="translate(0)" fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="2" />
                            <path id="Path_5" data-name="Path 5" d="M4.5,27H23.353" transform="translate(0 -8)" fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="2" />
                        </g>
                    </svg>
                </div>
                <!--background overlay element, it will close navbar when clicked-->
                <div onclick="exitNav()" id="sideBar" class="fixed top-0 right-0 bg-transparent w-0 h-full overflow-x-hidden duration-500 z-10">
                    <!--navigation menu box-->
                    <div id="sideNav" onclick="event.stopPropagation()" class="fixed top-0 right-0 bg-greenheader overflow-x-hidden duration-500 font-bold flex justify-center items-start h-full w-0 pt-24">
                        <!--exit icon, it will close navbar when clicked-->
                        <a href="javascript:void(0)" onclick="exitNav()" class="text-3xl absolute top-0 right-0 mr-3 mt-2">&times;</a>
                        @if(Auth::check() && Auth::user()->role == 'user')
                        <ul class="text-md sm:text-xl text-center text-nowrap space-y-5 btn-group">
                            <li><a href="/my-account" class="text-black text-lg font-semibold bg-primary px-5 py-4  rounded-xl d-block">Account aanpassen</a></li>
                            
                            
                            <li><a href="/my-deals" class="text-black text-lg font-semibold bg-primary px-5 py-4  rounded-xl d-block">Mijn deals</a></li>
                            <li><a href="/deal-info" class="text-black text-lg font-semibold bg-primary px-5 py-4  rounded-xl d-block">Meer informatie</a></li>
                            <!-- <li class="px-2 py-4"><a href="#">Shop</a></li> -->
                            <li class="bg-primary px-5 py-4  rounded-xl">Problemen? <a href="
                            {{route('support')}}" class="text-white text-lg font-semibold text-black text-lg font-semibold "><u>Stuur een e-mail</u></a></li>

                            @auth
                            <li>
                                <!-- Logout Button -->
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="bg-red px-7 py-4  rounded-xl d-block rounded-xl">
                                        Logout
                                    </button>
                                </form>
                            </li>
                            @else
                            <!-- <p class="text-gray-600">You are not logged in.</p> -->
                            @endauth
                        </ul>
                        @else
                        <ul class="text-md sm:text-xl text-center text-nowrap space-y-5 btn-group">
                            <li><a href="/my-account" class="text-black text-lg font-semibold bg-primary px-5 py-4  rounded-xl d-block">Account aanpassen</a></li>
                            
                            
                            <!-- <li><a href="/my-deals" class="text-black text-lg font-semibold bg-primary px-5 py-4  rounded-xl d-block">Mijn deals</a></li> -->
                            <li><a href="/deal-info" class="text-black text-lg font-semibold bg-primary px-5 py-4  rounded-xl d-block">Meer informatie</a></li>
                            <!-- <li class="px-2 py-4"><a href="#">Shop</a></li> -->
                            <li class="px-5 py-4 rounded-xl text-black text-lg font-semibold bg-primary">Problemen? <a href="
                            {{route('support')}}" class="text-white text-lg font-semibold text-black text-lg font-semibold "><u>Stuur een e-mail</u></a></li>

                            @auth
                            <li>
                                <!-- Logout Button -->
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="bg-red px-7 py-4  rounded-xl d-block rounded-xl text-white">
                                        Logout
                                    </button>
                                </form>
                            </li>
                            @else
                            <!-- <p class="text-gray-600">You are not logged in.</p> -->
                            @endauth
                        </ul>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
        @endauth
    </div>