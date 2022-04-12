<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>clarte</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        #heroSection {
            background-image: url('{{ asset('images/hero2.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        @media screen and (max-width:600px) {
            #heroSection {
                background-size: auto;
                background-position: left;
            }
        }

    </style>

</head>

<body>
    <header>
        <nav class="h-89 w-full border-b flex ">
            <div class="py-5 md:py-0 container mx-auto px-4 flex items-center justify-between">
                <div class="flex items-center gap-3 w-36">
                    <x-jet-authentication-card-logo />
                    <p class="font-Catamaran text-orange-400 font-extrabold text-3xl">Clarté</p>
                </div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/responsibilite/index') }}" class="btn">Votre espace du travail</a>
                    @else
                        <div>
                            <a href="{{ route('login') }}" class="btn">S'identifier</a>
                        </div>
                    @endauth
                @endif
            </div>
        </nav>
    </header>
    <main class="flex flex-col gap-8">
        <section id="heroSection" class="bg-gray-100 h-[667px] mx-5 flex flex-col items-start justify-evenly gap-4">
            <div class="container mx-auto px-4 flex flex-col items-start">
                <div class="flex justify-start items-start flex-col gap-y-4 mb-5 sm:mb-10">
                    <h1 class="hierarchyl1">
                        Libérez votre espace mental.<br>
                        Organisez-vous efficacement,
                        <br>sans stress.
                    </h1>

                    <p class="mt-5 sm:mt-10 lg:w-10/12 text-gray-400 font-normal text-left text-sm sm:text-lg">
                        Avec la solution digitale "clarté".<br> Ayez l'esprit tranquille en ajoutant toutes <br> vos
                        tâches à votre nouvelle to-do list application préférée.</p>
                </div>
                <div class="flex justify-center items-start">
                    @if (Route::has('login'))
                        @auth
                        @else
                            <div>
                                <a href="{{ route('register') }}"
                                    class="bg-sky-600 hover:bg-sky-700 lg:text-xl lg:font-bold  rounded text-white px-4 sm:px-10 py-2 sm:py-4 text-sm">Rejoignez-nous</a>
                            </div>
                        @endauth
                    @endif

                </div>
            </div>
        </section>

        <section class="max-w-8xl bg-white">
            <div class="flex flex-col items-center justify-evenly gap-8">
                <h1 class="text-base text-2xl text-sky-700">Une nouvelle approche à la TODO-list, simple, facile, utile
                    :</h1>
                <h1 class="font-Catamaran text-4xl text-center font-black text-gray-700 px-8 leading-[3rem]">
                    Une personne à des <span class="text-orange-400">responsabilités </span>, étant l'une de ces
                    responsabilités,
                    elle initie des <span class="text-orange-400"> projets, </span>
                    qu'elle complète
                    en réalisant des <span class="text-orange-400"> actions.</span> </h1>
            </div>
        </section>

        <section class="max-w-8xl mx-auto container bg-white">
            <div>
                {{-- <div role="contentinfo" class="flex items-center flex-col px-4">
                    <h1 tabindex="0" class="hierarchyl1">
                        L'application qui vous aide
                    </h1>
                </div> --}}
                <div tabindex="0" aria-label="group of cards"
                    class="focus:outline-none mt-20 flex flex-wrap justify-center gap-10 px-4">
                    <div tabindex="0" aria-label="card 1" class="focus:outline-none flex sm:w-full md:w-5/12 pb-20">
                        <div class="w-20 h-20 relative mr-5">
                            <div class="absolute top-0 right-0 bg-sky-100 rounded w-16 h-16 mt-2 mr-1"></div>
                            <div
                                class="absolute text-white bottom-0 left-0 bg-sky-600 rounded w-16 h-16 flex items-center justify-center mt-2 mr-3">
                                <img class="w-[2.5rem]" src="{{ asset('images/list-01.png') }}" alt="lists icon">
                            </div>
                        </div>
                        <div class="w-10/12">
                            <h2 tabindex="0" class="focus:outline-none text-lg font-bold leading-tight text-gray-800">
                                Créer une liste de tâches</h2>
                            <p tabindex="0" class="focus:outline-none text-base text-gray-600 leading-normal pt-2">Créez
                                facilement de nouvelles tâches et listes de contrôle. Une vue élégante de la liste des
                                tâches vous aidera à vous concentrer sur les éléments les plus importants et à agir
                                immédiatement.
                            </p>
                        </div>
                    </div>
                    <div tabindex="0" aria-label="card 2" class="focus:outline-none flex sm:w-full md:w-5/12 pb-20">
                        <div class="w-20 h-20 relative mr-5">
                            <div class="absolute top-0 right-0 bg-sky-100 rounded w-16 h-16 mt-2 mr-1"></div>
                            <div
                                class="absolute text-white bottom-0 left-0 bg-sky-600 rounded w-16 h-16 flex items-center justify-center mt-2 mr-3">
                                <img class="w-[3.5rem]" src="{{ asset('images/hierarchy-01.png') }}"
                                    alt="hierarchy">
                            </div>
                        </div>
                        <div class="w-10/12">
                            <h2 tabindex="0" class="focus:outline-none text-lg font-bold leading-tight text-gray-800">
                                Transformez
                                une hiérarchie en liste de tâches</h2>
                            <p tabindex="0" class="focus:outline-none text-base text-gray-600 leading-normal pt-2">
                                Une fois que vous avez ajouté des dates d'échéance, des contextes et des dépendances,
                                MLO générera automatiquement une liste intelligente d'éléments d'action qui nécessitent
                                votre attention immédiate.</p>
                        </div>
                    </div>
                    <div tabindex="0" aria-label="card 3" class="focus:outline-none flex sm:w-full md:w-5/12 pb-20">
                        <div class="w-20 h-20 relative mr-5">
                            <div class="absolute top-0 right-0 bg-sky-100 rounded w-16 h-16 mt-2 mr-1"></div>
                            <div
                                class="absolute text-white bottom-0 left-0 bg-sky-600 rounded w-16 h-16 flex items-center justify-center mt-2 mr-3">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/icon_and_text-SVG3.svg"
                                    alt="html tag">
                            </div>
                        </div>
                        <div class="w-10/12">
                            <h2 tabindex="0" class="focus:outline-none text-lg font-bold leading-tight text-gray-800">
                                Faites-en
                                plus
                            </h2>
                            <p tabindex="0" class="focus:outline-none text-base text-gray-600 leading-normal pt-2">
                                La qualité de la sortie augmentera avec Todo Cloud. Affichez le travail par date de
                                début/échéance, propriétaire ou utilisez des listes, des balises et des filtres de liste
                                intelligente pour terminer le travail.</p>
                        </div>
                    </div>
                    <div tabindex="0" aria-label="card 4" class="focus:outline-none flex sm:w-full md:w-5/12 pb-20">
                        <div class="w-20 h-20 relative mr-5">
                            <div class="absolute top-0 right-0 bg-sky-100 rounded w-16 h-16 mt-2 mr-1"></div>
                            <div
                                class="absolute text-white bottom-0 left-0 bg-sky-600 rounded w-16 h-16 flex items-center justify-center mt-2 mr-3">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/icon_and_text-SVG4.svg"
                                    alt="monitor">
                            </div>
                        </div>
                        <div class="w-10/12">
                            <h2 tabindex="0" class="focus:outline-none text-lg font-bold leading-tight text-gray-800">
                                Atteignez
                                vos objectifs
                            </h2>
                            <p tabindex="0" class="focus:outline-none text-base text-gray-600 leading-normal pt-2">
                                Avec un système pour tout suivre, vous pouvez vous détendre lorsque la journée est
                                terminée avec moins de stress en sachant que Todo Cloud suit tout votre travail.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- component -->
    <footer class="w-full  flex items-center justify-center bg-gray-800">
        <div class="md:w-2/3 w-full px-4 text-white flex flex-col">
            {{-- <div class="flex mt-8 flex-col md:flex-row md:justify-between">
                <div class="w-44 pt-6 md:pt-0">
                    <a class="btn">Contact US</a>
                </div>
            </div> --}}
            <div class="flex flex-col">
                <div class="flex mt-24 mb-12 flex-row justify-between">
                    <div class="w-20">
                        <x-jet-authentication-card-logo />
                    </div>
                    <div class="flex space-x-8 items-center justify-between">
                        <a class="hidden md:block cursor-pointer text-orange-200 hover:text-white ">about</a>
                        <a class="hidden md:block cursor-pointer text-orange-200 hover:text-white ">faq</a>
                        <a class="hidden md:block cursor-pointer text-orange-200 hover:text-white ">Contact</a>
                    </div>
                    <div class="flex flex-row space-x-8 items-center justify-between">
                        <a>
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.89782 12V6.53514H5.67481L5.93895 4.39547H3.89782V3.03259C3.89782 2.41516 4.06363 1.99243 4.91774 1.99243H6V0.0847928C5.47342 0.0262443 4.94412 -0.00202566 4.41453 0.000112795C2.84383 0.000112795 1.76542 0.994936 1.76542 2.82122V4.39147H0V6.53114H1.76928V12H3.89782Z"
                                    fill="white" />
                            </svg>
                        </a>
                        <a>
                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.99536 2.91345C5.17815 2.91345 4.39441 3.23809 3.81655 3.81594C3.2387 4.3938 2.91406 5.17754 2.91406 5.99475C2.91406 6.81196 3.2387 7.5957 3.81655 8.17356C4.39441 8.75141 5.17815 9.07605 5.99536 9.07605C6.81257 9.07605 7.59631 8.75141 8.17417 8.17356C8.75202 7.5957 9.07666 6.81196 9.07666 5.99475C9.07666 5.17754 8.75202 4.3938 8.17417 3.81594C7.59631 3.23809 6.81257 2.91345 5.99536 2.91345ZM5.99536 7.99586C5.46446 7.99586 4.9553 7.78496 4.57989 7.40955C4.20448 7.03415 3.99358 6.52499 3.99358 5.99408C3.99358 5.46318 4.20448 4.95402 4.57989 4.57861C4.9553 4.20321 5.46446 3.99231 5.99536 3.99231C6.52626 3.99231 7.03542 4.20321 7.41083 4.57861C7.78624 4.95402 7.99714 5.46318 7.99714 5.99408C7.99714 6.52499 7.78624 7.03415 7.41083 7.40955C7.03542 7.78496 6.52626 7.99586 5.99536 7.99586Z"
                                    fill="white" />
                                <path
                                    d="M9.19863 3.51848C9.59537 3.51848 9.91698 3.19687 9.91698 2.80013C9.91698 2.4034 9.59537 2.08179 9.19863 2.08179C8.8019 2.08179 8.48029 2.4034 8.48029 2.80013C8.48029 3.19687 8.8019 3.51848 9.19863 3.51848Z"
                                    fill="white" />
                                <path
                                    d="M11.6821 2.06975C11.5279 1.67138 11.2921 1.30961 10.99 1.00759C10.6879 0.705576 10.326 0.469972 9.92759 0.31586C9.46135 0.140842 8.9688 0.0462069 8.4709 0.0359839C7.82919 0.00799638 7.62594 0 5.99867 0C4.37139 0 4.16282 -6.70254e-08 3.52643 0.0359839C3.02891 0.0456842 2.53671 0.140339 2.07108 0.31586C1.67255 0.469792 1.31059 0.705333 1.00844 1.00737C0.706289 1.30941 0.47061 1.67127 0.316526 2.06975C0.141474 2.53595 0.0470554 3.02855 0.0373167 3.52643C0.00866281 4.16748 0 4.37072 0 5.99867C0 7.62594 -4.96485e-09 7.83319 0.0373167 8.4709C0.0473123 8.96935 0.14127 9.46113 0.316526 9.92825C0.471042 10.3266 0.70695 10.6883 1.00918 10.9903C1.3114 11.2923 1.6733 11.5279 2.07175 11.6821C2.5365 11.8642 3.0289 11.9656 3.52777 11.982C4.16948 12.01 4.37272 12.0187 6 12.0187C7.62728 12.0187 7.83585 12.0187 8.47223 11.982C8.97008 11.9719 9.46262 11.8775 9.92892 11.7028C10.3272 11.5483 10.689 11.3125 10.9911 11.0104C11.2932 10.7083 11.529 10.3466 11.6835 9.94825C11.8587 9.48179 11.9527 8.99 11.9627 8.49156C11.9913 7.85051 12 7.64727 12 6.01932C12 4.39138 12 4.18481 11.9627 3.54709C11.9549 3.04216 11.86 2.54237 11.6821 2.06975ZM10.8705 8.42159C10.8662 8.80562 10.7961 9.18608 10.6633 9.54642C10.5632 9.80555 10.41 10.0409 10.2135 10.2372C10.017 10.4336 9.78162 10.5867 9.52243 10.6866C9.16608 10.8188 8.78967 10.8889 8.4096 10.8938C7.77654 10.9231 7.59796 10.9305 5.97468 10.9305C4.35007 10.9305 4.18414 10.9305 3.53909 10.8938C3.15921 10.8892 2.78298 10.8191 2.42692 10.6866C2.16683 10.5873 1.93048 10.4345 1.73316 10.2381C1.53584 10.0417 1.38194 9.80605 1.28143 9.54642C1.15045 9.18995 1.08039 8.81398 1.07419 8.43425C1.04554 7.8012 1.03887 7.62261 1.03887 5.99933C1.03887 4.37539 1.03887 4.20946 1.07419 3.56375C1.0785 3.17993 1.14859 2.7997 1.28143 2.43958C1.48467 1.91382 1.90116 1.5 2.42692 1.29876C2.78316 1.16691 3.15928 1.09682 3.53909 1.09151C4.17281 1.06286 4.35073 1.05486 5.97468 1.05486C7.59862 1.05486 7.76522 1.05486 8.4096 1.09151C8.7897 1.09609 9.16617 1.1662 9.52243 1.29876C9.7816 1.39889 10.017 1.55211 10.2134 1.74858C10.4099 1.94504 10.5631 2.18041 10.6633 2.43958C10.7942 2.79606 10.8643 3.17203 10.8705 3.55175C10.8992 4.18547 10.9065 4.36339 10.9065 5.98734C10.9065 7.61062 10.9065 7.78521 10.8778 8.42226H10.8705V8.42159Z"
                                    fill="white" />
                            </svg>
                        </a>
                        <a href="https://www.youtube.com/channel/UCjtCbnkIaiCJgj13sEZ9iqw">
                            <svg width="13" height="9" viewBox="0 0 13 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.7355 1.415C12.6616 1.14357 12.517 0.896024 12.3162 0.697014C12.1154 0.498004 11.8654 0.354468 11.5911 0.280692C10.5739 0.00450089 6.5045 4.87928e-06 6.5045 4.87928e-06C6.5045 4.87928e-06 2.43578 -0.00449139 1.41795 0.259496C1.14379 0.336667 0.894302 0.482233 0.693428 0.68222C0.492554 0.882207 0.347041 1.1299 0.270859 1.40152C0.00259923 2.40737 9.51671e-07 4.49358 9.51671e-07 4.49358C9.51671e-07 4.49358 -0.0025972 6.59006 0.263714 7.58564C0.413109 8.13609 0.851549 8.57094 1.40885 8.71931C2.43643 8.9955 6.49476 9 6.49476 9C6.49476 9 10.5641 9.00449 11.5813 8.74115C11.8557 8.6675 12.106 8.52429 12.3073 8.32569C12.5086 8.12709 12.6539 7.87996 12.729 7.60876C12.998 6.60355 12.9999 4.51798 12.9999 4.51798C12.9999 4.51798 13.0129 2.42086 12.7355 1.415ZM5.20282 6.42628L5.20607 2.57244L8.58823 4.50257L5.20282 6.42628Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
                <p class="w-full text-center my-12 text-orange-200">Copyright © 2022 Brahim</p>
            </div>
        </div>
    </footer>
    {{-- <footer class="h-40 flex flex-row items-center justify-center space-x-80 bg-neutral-800">

        <h2 class="max-w-sm mt-8 mb-12 text-3xl text-white font-bold font-heading">Merci de visiter</h2>
        <div class="space-x-8"><a class="btn" href="#">Rejoinez-nous</a><a class="btn"
                href="#">Contact</a>
        </div>

    </footer> --}}


</body>

</html>
