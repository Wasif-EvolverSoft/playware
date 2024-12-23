function addHeaderAndFooter() {

    // GET AND GENERATE HEADER
    document.getElementById('header').innerHTML += `       
    <nav class="container mx-auto flex justify-center items-center py-1 px-4 lg:px-0">
            <ul class="hidden items-center gap-6 xl:gap-8 min-[992px]:flex">
                <!-- LOGO -->
                <li class="nav-link xl:mr-12">
                    <a href="/">
                        <img class="w-40 h-auto" src="./assets/images/logo/circuit.svg">
                    </a>
                </li>

                <!-- {{-- MAIN LINKS ON HOVER OPENS MEGAMENU --}} -->

                <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a href="/shop.html">Store</a></li>
                <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a href="/product-details.html">Mac</a>
                </li>
                <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a href="/product-details.html">iPad</a>
                </li>
                <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a
                        href="/product-details.html">iPhone</a></li>
                <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a href="/product-details.html">Watch</a>
                </li>
                <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a
                        href="/product-details.html">Vision</a></li>
                <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a
                        href="/product-details.html">AirPods</a></li>
                <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a href="/product-details.html">TV &
                        Home</a>
                </li>
                <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a
                        href="/product-details.html">Entertainment</a>
                </li>
                <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a
                        href="/product-details.html">Accessories</a>
                </li>
                <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a href="">Support</a></li>
                <li onclick="toggleSubcategoryMegaMenu('searchBarMenu')"
                    onmouseover="toggleOutSubcategoryMegaMenu('searchBarMenu')" class="nav-link text-2xl">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="1" version="1.1" id="search-icon"
                        x="0px" y="0px" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path d="M20.031,20.79c0.46,0.46,1.17-0.25,0.71-0.7l-3.75-3.76c1.27-1.41,2.04-3.27,2.04-5.31
                        c0-4.39-3.57-7.96-7.96-7.96s-7.96,3.57-7.96,7.96c0,4.39,3.57,7.96,7.96,7.96c1.98,0,3.81-0.73,5.21-1.94L20.031,20.79z
                         M4.11,11.02c0-3.84,3.13-6.96,6.96-6.96c3.84,0,6.96,3.12,6.96,6.96c0,3.84-3.12,6.96-6.96,6.96C7.24,17.98,4.11,14.86,4.11,11.02
                        z"></path>
                        </g>
                    </svg>
                </li>
                <li class="nav-link text-2xl">
                    <a href="/cart.html">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="1" viewBox="0 0 24 24" height="1em"
                            width="1em" xmlns="http://www.w3.org/2000/svg">
                            <g id="Shopping_Cart">
                                <path
                                    d="M17.437,19.934c0,0.552 -0.448,1 -1,1c-0.552,0 -1,-0.448 -1,-1c0,-0.552 0.448,-1 1,-1c0.552,0 1,0.448 1,1Zm-11.217,-4.266l-0.945,-10.9c-0.03,-0.391 -0.356,-0.693 -0.749,-0.693l-0.966,-0c-0.276,-0 -0.5,-0.224 -0.5,-0.5c0,-0.276 0.224,-0.5 0.5,-0.5l0.966,-0c0.916,-0 1.676,0.704 1.746,1.617l0.139,1.818l13.03,-0c0.885,-0 1.577,0.76 1.494,1.638l-0.668,7.52c-0.121,1.285 -1.199,2.267 -2.489,2.267l-9.069,0c-1.29,0 -2.367,-0.981 -2.489,-2.267Zm0.274,-8.158l0.722,8.066c0.073,0.77 0.719,1.359 1.493,1.359l9.069,0c0.774,0 1.42,-0.589 1.493,-1.359l0.668,-7.518c0.028,-0.294 -0.203,-0.548 -0.498,-0.548l-12.947,-0Zm4.454,12.424c-0,0.552 -0.448,1 -1,1c-0.552,0 -1,-0.448 -1,-1c-0,-0.552 0.448,-1 1,-1c0.552,0 1,0.448 1,1Z">
                                </path>
                            </g>
                        </svg>
                    </a>
                </li>
            </ul>

            <ul class="w-full flex items-center justify-between gap-6 lg:gap-8 min-[992px]:hidden">
                <li class="nav-link">
                    <a href="/">
                    <img class="w-40 h-auto" src="./assets/images/logo/circuit.svg">

                    </a>
                </li>
                <li class="nav-link flex items-center gap-6">
                    <button class="" onclick="toggleMobMenu('searchBarMobMenu')">
                        <svg class=" w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="1" version="1.1"
                            id="search-icon" x="0px" y="0px" viewBox="0 0 24 24" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M20.031,20.79c0.46,0.46,1.17-0.25,0.71-0.7l-3.75-3.76c1.27-1.41,2.04-3.27,2.04-5.31
                        c0-4.39-3.57-7.96-7.96-7.96s-7.96,3.57-7.96,7.96c0,4.39,3.57,7.96,7.96,7.96c1.98,0,3.81-0.73,5.21-1.94L20.031,20.79z
                         M4.11,11.02c0-3.84,3.13-6.96,6.96-6.96c3.84,0,6.96,3.12,6.96,6.96c0,3.84-3.12,6.96-6.96,6.96C7.24,17.98,4.11,14.86,4.11,11.02
                        z"></path>
                            </g>
                        </svg>
                    </button>

                    <a href="/cart.html">
                        <svg class="h-5 w-5" stroke="currentColor" fill="currentColor" stroke-width="1"
                            viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <g id="Shopping_Cart">
                                <path
                                    d="M17.437,19.934c0,0.552 -0.448,1 -1,1c-0.552,0 -1,-0.448 -1,-1c0,-0.552 0.448,-1 1,-1c0.552,0 1,0.448 1,1Zm-11.217,-4.266l-0.945,-10.9c-0.03,-0.391 -0.356,-0.693 -0.749,-0.693l-0.966,-0c-0.276,-0 -0.5,-0.224 -0.5,-0.5c0,-0.276 0.224,-0.5 0.5,-0.5l0.966,-0c0.916,-0 1.676,0.704 1.746,1.617l0.139,1.818l13.03,-0c0.885,-0 1.577,0.76 1.494,1.638l-0.668,7.52c-0.121,1.285 -1.199,2.267 -2.489,2.267l-9.069,0c-1.29,0 -2.367,-0.981 -2.489,-2.267Zm0.274,-8.158l0.722,8.066c0.073,0.77 0.719,1.359 1.493,1.359l9.069,0c0.774,0 1.42,-0.589 1.493,-1.359l0.668,-7.518c0.028,-0.294 -0.203,-0.548 -0.498,-0.548l-12.947,-0Zm4.454,12.424c-0,0.552 -0.448,1 -1,1c-0.552,0 -1,-0.448 -1,-1c-0,-0.552 0.448,-1 1,-1c0.552,0 1,0.448 1,1Z">
                                </path>
                            </g>
                        </svg>
                    </a>
                </li>
            </ul>

            <!-- {{-- MOBILE MENU TOGGLE BUTTON --}} -->

            <button id="toggleMobileMenu" onclick="toggleMobMenu()"
                class="relative z-10 ml-10 mr-4 nav-link min-[992px]:hidden">
                <span class="sr-only">Open main menu</span>
                <div class="block w-5 absolute left-0 top-[-2px] transform -translate-x-1/2 -translate-y-1/2">
                    <span id="toggleMenuBar1" aria-hidden="true"
                        class="block absolute h-[2px] w-4 bg-current transform transition duration-500 -translate-y-1 ease-in-out"
                        :class="{ 'rotate-45': open, ' -translate-y-1.5': !open }"></span>
                    <!-- <span aria-hidden="true"
                            class="block absolute  h-[2px] w-5 bg-current   transform transition duration-500 ease-in-out"
                            :class="{ 'opacity-0': open }"></span> -->
                    <span id="toggleMenuBar2" aria-hidden="true"
                        class="block absolute h-[2px] w-4 bg-current transform  transition duration-500 translate-y-1 ease-in-out"
                        :class="{ '-rotate-45': open, ' translate-y-1.5': !open }"></span>
                </div>
            </button>

        </nav>

        <!-- {{-- SUBMENU LINKS MEGAMENU ON HOVER OPENS MEGAMENU --}} -->

        <div id="subcategoryMegaMenu" class="hide-submenu">
            <div class="flex gap-8">

                <div class="flex flex-col gap-2 pe-12">
                    <h5 class="sub-category-heading">Shop</h5>
                    <ul class="flex flex-col gap-2">
                        <li class="sub-category-link"><a href="">Shop the Latest</a></li>
                        <li class="sub-category-link"><a href="">Mac</a></li>
                        <li class="sub-category-link"><a href="">iPad</a></li>
                        <li class="sub-category-link"><a href="">iPhone</a></li>
                        <li class="sub-category-link"><a href="">Apple Watch</a></li>
                        <li class="sub-category-link"><a href="">Apple Vision Pro</a></li>
                        <li class="sub-category-link"><a href="">Acessories</a></li>
                    </ul>
                </div>

                <div class="flex flex-col gap-2">
                    <h5 class="sub-category-heading">Quick Links</h5>
                    <ul class="flex flex-col gap-2">
                        <li class="sub-category-link-2"><a href="">Shop the Latest</a></li>
                        <li class="sub-category-link-2"><a href="">Mac</a></li>
                        <li class="sub-category-link-2"><a href="">iPad</a></li>
                        <li class="sub-category-link-2"><a href="">iPhone</a></li>
                        <li class="sub-category-link-2"><a href="">Apple Watch</a></li>
                        <li class="sub-category-link-2"><a href="">Apple Vision Pro</a></li>
                        <li class="sub-category-link-2"><a href="">Acessories</a></li>
                    </ul>
                </div>

                <div class="flex flex-col gap-2">
                    <h5 class="sub-category-heading">Shop Special Stores</h5>
                    <ul class="flex flex-col gap-2">
                        <li class="sub-category-link-2"><a href="">Shop the Latest</a></li>
                        <li class="sub-category-link-2"><a href="">Mac</a></li>
                        <li class="sub-category-link-2"><a href="">iPad</a></li>
                        <li class="sub-category-link-2"><a href="">iPhone</a></li>
                        <li class="sub-category-link-2"><a href="">Apple Watch</a></li>
                        <li class="sub-category-link-2"><a href="">Apple Vision Pro</a></li>
                        <li class="sub-category-link-2"><a href="">Acessories</a></li>
                    </ul>
                </div>

            </div>
        </div>


        <!-- SEARCH ON CLICK OPENS SEARCH -->
        <div id="searchBarMenu" class="hide-submenu">
            <form action="">
                <div class="relative flex items-center w-full mb-4">
                    <div class="inset-y-0 left-0 flex items-center pointer-events-none">
                        <svg class="w-6 h-6 text-skin-inverted/80" stroke="currentColor" fill="currentColor" stroke-width="1"
                            version="1.1" id="search-icon" x="0px" y="0px" viewBox="0 0 24 24" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M20.031,20.79c0.46,0.46,1.17-0.25,0.71-0.7l-3.75-3.76c1.27-1.41,2.04-3.27,2.04-5.31
                    c0-4.39-3.57-7.96-7.96-7.96s-7.96,3.57-7.96,7.96c0,4.39,3.57,7.96,7.96,7.96c1.98,0,3.81-0.73,5.21-1.94L20.031,20.79z
                     M4.11,11.02c0-3.84,3.13-6.96,6.96-6.96c3.84,0,6.96,3.12,6.96,6.96c0,3.84-3.12,6.96-6.96,6.96C7.24,17.98,4.11,14.86,4.11,11.02
                    z"></path>
                            </g>
                        </svg>
                    </div>
                    <input type="text" name="search" id="search"
                        class="w-full bg-transparent py-2 pl-4 pr-4 rounded-lg focus:outline-none text-skin-inverted text-2xl"
                        placeholder="Search Playware">
                </div>
            </form>

            <div class="flex gap-8">

                <div class="flex flex-col gap-2">
                    <h5 class="sub-category-heading">Quick Links</h5>
                    <ul class="flex flex-col gap-2">
                        <li class="sub-category-link-2"><a href="">Shop the Latest</a></li>
                        <li class="sub-category-link-2"><a href="">Mac</a></li>
                        <li class="sub-category-link-2"><a href="">iPad</a></li>
                        <li class="sub-category-link-2"><a href="">iPhone</a></li>
                        <li class="sub-category-link-2"><a href="">Apple Watch</a></li>
                        <li class="sub-category-link-2"><a href="">Apple Vision Pro</a></li>
                        <li class="sub-category-link-2"><a href="">Acessories</a></li>
                    </ul>
                </div>

            </div>
        </div>


        <!-- {{-- MOBILE MENU --}} -->

        <div id="MobMenu" class="hide-mob-menu">
            <button id="goBackBtn" onclick="goBackToMainMenu()"
                class="absolute top-3 left-10 text-skin-inverted transition-all duration-700 ease-in-out opacity-0 translate-x-12">
                <svg class="h-8 w-auto" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
                </button>

            <div class="flex relative h-max overflow-hidden">

                <div id="mobMainMenu" class="active-mob-mainmenu">
                    <ul class="flex flex-col gap-4">
                        <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">Store</a>
                        </li>
                        <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">Mac</a>
                        </li>
                        <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">iPad</a>
                        </li>
                        <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">iPhone</a>
                        </li>
                        <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">Watch</a>
                        </li>
                        <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">Vision</a>
                        </li>
                        <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">AirPods</a>
                        </li>
                        <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">TV &
                                Home</a>
                        </li>
                        <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a
                                href="#">Entertainment</a>
                        </li>
                        <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a
                                href="#">Accessories</a></li>
                    </ul>
                </div>

                <div id='storeMobSubmenu' class="hide-mob-submenu">
                    <ul class="flex flex-col gap-4">
                        <li onclick="" class="mob-nav-link"><a href="">Shop the Latest</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">Mac</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">iPad</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">iPhone</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">Apple Watch</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">Apple Vision Pro</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">Accessories</a></li>
                    </ul>

                    <div class="flex gap-8 w-max">
                        <div class="flex flex-col gap-2">
                            <h5 class="sub-category-heading">Quick Links</h5>
                            <ul class="flex flex-col gap-2">
                                <li class="sub-category-link-2"><a href="">Shop the Latest</a></li>
                                <li class="sub-category-link-2"><a href="">Mac</a></li>
                                <li class="sub-category-link-2"><a href="">iPad</a></li>
                                <li class="sub-category-link-2"><a href="">iPhone</a></li>
                                <li class="sub-category-link-2"><a href="">Apple Watch</a></li>
                                <li class="sub-category-link-2"><a href="">Apple Vision Pro</a></li>
                                <li class="sub-category-link-2"><a href="">Acessories</a></li>
                            </ul>
                        </div>

                        <div class="flex flex-col gap-2">
                            <h5 class="sub-category-heading">Shop Special Stores</h5>
                            <ul class="flex flex-col gap-2">
                                <li class="sub-category-link-2"><a href="">Shop the Latest</a></li>
                                <li class="sub-category-link-2"><a href="">Mac</a></li>
                                <li class="sub-category-link-2"><a href="">iPad</a></li>
                                <li class="sub-category-link-2"><a href="">iPhone</a></li>
                                <li class="sub-category-link-2"><a href="">Apple Watch</a></li>
                                <li class="sub-category-link-2"><a href="">Apple Vision Pro</a></li>
                                <li class="sub-category-link-2"><a href="">Acessories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="hidden flex-col gap-2 p-12 w-0 overflow-hidden">
                    <ul class="flex flex-col gap-4">
                        <li onclick="" class="mob-nav-link"><a href="">Store</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">Mac</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">iPad</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">iPhone</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">Watch</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">Vision</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">AirPods</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">TV & Home</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">Entertainment</a></li>
                        <li onclick="" class="mob-nav-link"><a href="">Accessories</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- {{-- SEARCH BAR MOBILE MENU --}} -->

        <div id="searchBarMobMenu" class="hide-mob-menu">
            <div class="px-12 pt-8">
                <form action="">
                    <div class="relative flex items-center mb-4">
                        <div class="inset-y-0 left-0 flex items-center pointer-events-none">
                            <svg class="w-6 h-6 text-skin-inverted/80" stroke="currentColor" fill="currentColor"
                                stroke-width="1" version="1.1" id="search-icon" x="0px" y="0px" viewBox="0 0 24 24"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path d="M20.031,20.79c0.46,0.46,1.17-0.25,0.71-0.7l-3.75-3.76c1.27-1.41,2.04-3.27,2.04-5.31
                    c0-4.39-3.57-7.96-7.96-7.96s-7.96,3.57-7.96,7.96c0,4.39,3.57,7.96,7.96,7.96c1.98,0,3.81-0.73,5.21-1.94L20.031,20.79z
                     M4.11,11.02c0-3.84,3.13-6.96,6.96-6.96c3.84,0,6.96,3.12,6.96,6.96c0,3.84-3.12,6.96-6.96,6.96C7.24,17.98,4.11,14.86,4.11,11.02
                    z"></path>
                                </g>
                            </svg>
                        </div>
                        <input type="text" name="search" id="searchMob"
                            class="w-full bg-transparent py-2 pl-4 pr-4 rounded-lg focus:outline-none text-skin-inverted text-3xl"
                            placeholder="Search">
                    </div>
                </form>

                <div class="flex gap-8">

                    <div class="flex flex-col gap-2">
                        <h5 class="sub-category-heading text-2xl">Quick Links</h5>
                        <ul class="flex flex-col gap-2">
                            <li class="sub-category-link-2"><a href="">Shop the Latest</a></li>
                            <li class="sub-category-link-2"><a href="">Mac</a></li>
                            <li class="sub-category-link-2"><a href="">iPad</a></li>
                            <li class="sub-category-link-2"><a href="">iPhone</a></li>
                            <li class="sub-category-link-2"><a href="">Apple Watch</a></li>
                            <li class="sub-category-link-2"><a href="">Apple Vision Pro</a></li>
                            <li class="sub-category-link-2"><a href="">Acessories</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
`

    // GET AND GENERATE HEADER
    document.getElementById('footer').innerHTML += `       
    <div class="container px-6 pt-6">
    <!-- Social media icons container -->
    <div class="mb-6 flex justify-center">
        <a href="#!" type="button"
            class="m-1 h-9 w-9 rounded-full border-2 border-white uppercase leading-normal text-skin-inverted transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
            data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-full w-4" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
            </svg>
        </a>

        <a href="#!" type="button"
            class="m-1 h-9 w-9 rounded-full border-2 border-white uppercase leading-normal text-skin-inverted transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
            data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-full w-4" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
            </svg>
        </a>

        <a href="#!" type="button"
            class="m-1 h-9 w-9 rounded-full border-2 border-white uppercase leading-normal text-skin-inverted transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
            data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-full w-4" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M7 11v2.4h3.97c-.16 1.029-1.2 3.02-3.97 3.02-2.39 0-4.34-1.979-4.34-4.42 0-2.44 1.95-4.42 4.34-4.42 1.36 0 2.27.58 2.79 1.08l1.9-1.83c-1.22-1.14-2.8-1.83-4.69-1.83-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.721-2.84 6.721-6.84 0-.46-.051-.81-.111-1.16h-6.61zm0 0 17 2h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2z"
                    fill-rule="evenodd" clip-rule="evenodd" />
            </svg>
        </a>

        <a href="#!" type="button"
            class="m-1 h-9 w-9 rounded-full border-2 border-white uppercase leading-normal text-skin-inverted transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
            data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-full w-4" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
            </svg>
        </a>

        <a href="#!" type="button"
            class="m-1 h-9 w-9 rounded-full border-2 border-white uppercase leading-normal text-skin-inverted transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
            data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-full w-4" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
            </svg>
        </a>

        <a href="#!" type="button"
            class="m-1 h-9 w-9 rounded-full border-2 border-white uppercase leading-normal text-skin-inverted transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
            data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-full w-4" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
            </svg>
        </a>
    </div>

    <!-- Newsletter sign-up form -->
    <div>
        <form action="">
            <div class="gird-cols-1 grid items-center justify-center gap-4 md:grid-cols-3">
                <div class="md:mb-6 md:ml-auto">
                    <p class="">
                        <strong>Sign up for our newsletter</strong>
                    </p>
                </div>

                <!-- Newsletter sign-up input field -->
                <div class="relative md:mb-6" data-te-input-wrapper-init>
                    <input type="text"
                        class="peer block min-h-[auto] w-full border-b bg-transparent px-3 py-[0.32rem] leading-[1.6] text-neutral-200 outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="exampleFormControlInput1" placeholder="Email address" />
                    <label for="exampleFormControlInput1"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-200 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-neutral-200 peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200">Email
                        address
                    </label>
                </div>

                <!-- Newsletter sign-up submit button -->
                <div class="mb-6 md:mr-auto">
                    <button type="submit"
                        class="inline-block rounded border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                        data-te-ripple-init data-te-ripple-color="light">
                        Subscribe
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Copyright information -->
    <div class="mb-6">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
            distinctio earum repellat quaerat voluptatibus placeat nam,
            commodi optio pariatur est quia magnam eum harum corrupti dicta,
            aliquam sequi voluptate quas.
        </p>
    </div>

    <!-- Links section -->
    <div class="grid grid-cols-2 lg:grid-cols-4">
        <div class="mb-6 text-start sm:mx-auto">
            <h5 class="mb-2.5 font-bold uppercase">Quick Links</h5>

            <ul class="mb-0 list-none">
                <li>
                    <a href="#!" class="text-skin-inverted">Shop</a>
                </li>
                <li>
                    <a href="#!" class="text-skin-inverted">About us</a>
                </li>
                <li>
                    <a href="#!" class="text-skin-inverted">Contact Us</a>
                </li>
                <li>
                    <a href="#!" class="text-skin-inverted">Support</a>
                </li>
            </ul>
        </div>

        <div class="mb-6 text-start sm:mx-auto">
            <h5 class="mb-2.5 font-bold uppercase">Useful Links</h5>

            <ul class="mb-0 list-none">
                <li>
                    <a href="#!" class="text-skin-inverted">Terms & Conditions</a>
                </li>
                <li>
                    <a href="#!" class="text-skin-inverted">FAQ's</a>
                </li>
                <li>
                    <a href="#!" class="text-skin-inverted">About Us</a>
                </li>
                <li>
                    <a href="#!" class="text-skin-inverted">Contact Us</a>
                </li>
            </ul>
        </div>

        <div class="mb-6 text-start sm:mx-auto">
            <h5 class="mb-2.5 font-bold uppercase">Find More</h5>

            <ul class="mb-0 list-none">
                <li>
                    <a href="#!" class="text-skin-inverted">Monitor</a>
                </li>
                <li>
                    <a href="#!" class="text-skin-inverted">Headphone</a>
                </li>
                <li>
                    <a href="#!" class="text-skin-inverted">Graphic Card</a>
                </li>
                <li>
                    <a href="#!" class="text-skin-inverted">Mouse</a>
                </li>
            </ul>
        </div>

        <div class="mb-6 text-start sm:mx-auto">
            <h5 class="mb-2.5 font-bold uppercase">Brands</h5>

            <ul class="mb-0 list-none">
                <li>
                    <a href="#!" class="text-skin-inverted">BenQ</a>
                </li>
                <li>
                    <a href="#!" class="text-skin-inverted">Asus</a>
                </li>
                <li>
                    <a href="#!" class="text-skin-inverted">Razer</a>
                </li>
                <li>
                    <a href="#!" class="text-skin-inverted">Logitech</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Copyright section -->
<div class="w-full p-4 text-center bg-black/20">
    © 2023 Copyright:
    <a class="text-skin-inverted" href="">Playware</a>
</div>
`
}


// TOGGLE IN NAV SUBCATEGORIES ON HOVER OR SEARCHBAR ON CLICK

const toggleSubcategoryMegaMenu = (search) => {

    if (search) {
        document.getElementById('searchBarMenu').className = 'active-submenu'
        setTimeout(() => {
            document.getElementById('search').focus();
        }, 500);
    } else {
        document.getElementById('subcategoryMegaMenu').className = 'active-submenu'
        document.getElementById('searchBarMenu').className = 'hide-submenu'
    }

}

// TOGGLE OUT NAV SUBCATEGORIES ON HOVER

const toggleOutSubcategoryMegaMenu = (search) => {

    if (search !== 'searchBarMenu') {
        document.getElementById('searchBarMenu').className = 'hide-submenu'
    }
    document.getElementById('subcategoryMegaMenu').className = 'hide-submenu'
}


// TOGGLE MOBILE MENU

const toggleMobMenu = (search) => {

    let searchMenuClassName = document.getElementById('searchBarMobMenu').className
    let MobMenuclassName = document.getElementById('MobMenu').className


    if (MobMenuclassName == 'active-mob-menu' || searchMenuClassName == 'active-mob-menu') {
        document.getElementById('searchBarMobMenu').className = 'hide-mob-menu'
        document.getElementById('MobMenu').className = 'hide-mob-menu'

        document.getElementById('toggleMenuBar1').classList.remove('translate-y-0', 'rotate-45')
        document.getElementById('toggleMenuBar1').classList.add('-translate-y-1', 'rotate-0')

        document.getElementById('toggleMenuBar2').classList.remove('translate-y-0', '-rotate-45')
        document.getElementById('toggleMenuBar2').classList.add('translate-y-1', 'rotate-0')
        console.log('inside close');

    } else if (MobMenuclassName == 'hide-mob-menu' || searchMenuClassName == 'hide-mob-menu') {
        if (search) {
            document.getElementById('searchBarMobMenu').className = 'active-mob-menu'
            setTimeout(() => {
                document.getElementById('searchMob').focus()
            }, 500);
        } else {
            document.getElementById('MobMenu').className = 'active-mob-menu'
        }

        document.getElementById('toggleMenuBar1').classList.remove('-translate-y-1', 'rotate-0')
        document.getElementById('toggleMenuBar1').classList.add('translate-y-0', 'rotate-45')

        document.getElementById('toggleMenuBar2').classList.remove('translate-y-1', 'rotate-0')
        document.getElementById('toggleMenuBar2').classList.add('translate-y-0', '-rotate-45')

        console.log('inside open');
    }

    // else {
    //     if (MobMenuclassName == 'hide-mob-menu') {
    //         document.getElementById('MobMenu').className = 'active-mob-menu'
    //         // document.getElementById('toggleMenuBar1').style.transform = 'rotate(45deg)'
    //         // document.getElementById('toggleMenuBar2').style.transform = 'rotate(-45deg)'

    //         document.getElementById('toggleMenuBar1').classList.remove('-translate-y-1', 'rotate-0')
    //         document.getElementById('toggleMenuBar1').classList.add('translate-y-0', 'rotate-45')

    //         document.getElementById('toggleMenuBar2').classList.remove('translate-y-1', 'rotate-0')
    //         document.getElementById('toggleMenuBar2').classList.add('translate-y-0', '-rotate-45')
    //     }
    //     else {
    //         document.getElementById('MobMenu').className = 'hide-mob-menu'
    //         // document.getElementById('toggleMenuBar1').style.transform = new DOMMatrix('rotate(0deg) trasnlateY(-0.25rem)')
    //         // document.getElementById('toggleMenuBar1').style.transform = ''
    //         // document.getElementById('toggleMenuBar2').style.transform = new DOMMatrix('rotate(0deg) trasnlateY(0.25rem)')
    //         // document.getElementById('toggleMenuBar2').style.transform = 'trasnlateY(0.25rem)'

    //         document.getElementById('toggleMenuBar1').classList.remove('translate-y-0', 'rotate-45')
    //         document.getElementById('toggleMenuBar1').classList.add('-translate-y-1', 'rotate-0')

    //         document.getElementById('toggleMenuBar2').classList.remove('translate-y-0', '-rotate-45')
    //         document.getElementById('toggleMenuBar2').classList.add('translate-y-1', 'rotate-0')
    //     }
    // }



}


// TOGGLE MOBILE SUBCATEGORY MENU

const toggleMobSubmenu = (toggleMobSubmenuDivId) => {



    document.getElementById('mobMainMenu').className = 'hide-mob-mainmenu'
    document.getElementById(toggleMobSubmenuDivId).className = 'active-mob-submenu'


    document.getElementById('goBackBtn').style.transform = "translateX(0)"
    document.getElementById('goBackBtn').style.opacity = '100'

}


// GO BACK TO MOBILE MAIN MENU

const goBackToMainMenu = () => {
    const activeMobSubMenus = Array.from(document.getElementsByClassName('active-mob-submenu'));

    activeMobSubMenus.forEach(element => {
        element.className = 'hide-mob-submenu'
    });

    document.getElementById('mobMainMenu').className = 'active-mob-mainmenu'

    document.getElementById('goBackBtn').style.transform = "translateX(3rem)"
    document.getElementById('goBackBtn').style.opacity = '0'
}


(function () {

    if (window.location.pathname !== '/' || window.location.pathname !== "127.0.0.1:8000") return

    const nextYear = new Date().getFullYear() + 1
    const countDownDate = new Date(`Jan 5, ${nextYear} 15:37:25`).getTime()

    let interval = setInterval(() => {
        const now = new Date().getTime();
        const distance = countDownDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24))
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
        const seconds = Math.floor((distance % (1000 * 60)) / 1000)

        const remainingTime = `${days}d ${hours}h ${minutes}m ${seconds}s`

        document.getElementById('countdown').innerHTML = remainingTime;


    }, 1000)

}())









































//     < nav class="max-w-5xl mx-auto flex justify-center items-center px-4 lg:px-0" >
// <ul class="hidden items-center gap-6 lg:gap-8 min-[992px]:flex">
//     <!-- LOGO -->
//     <li class="nav-link">
//         <a href="/">
//             <svg stroke="currentColor" fill="currentColor" height="44" viewBox="0 0 14 44" width="14"
//                 xmlns="http://www.w3.org/2000/svg">
//                 <path
//                     d="m13.0729 17.6825a3.61 3.61 0 0 0 -1.7248 3.0365 3.5132 3.5132 0 0 0 2.1379 3.2223 8.394 8.394 0 0 1 -1.0948 2.2618c-.6816.9812-1.3943 1.9623-2.4787 1.9623s-1.3633-.63-2.613-.63c-1.2187 0-1.6525.6507-2.644.6507s-1.6834-.9089-2.4787-2.0243a9.7842 9.7842 0 0 1 -1.6628-5.2776c0-3.0984 2.014-4.7405 3.9969-4.7405 1.0535 0 1.9314.6919 2.5924.6919.63 0 1.6112-.7333 2.8092-.7333a3.7579 3.7579 0 0 1 3.1604 1.5802zm-3.7284-2.8918a3.5615 3.5615 0 0 0 .8469-2.22 1.5353 1.5353 0 0 0 -.031-.32 3.5686 3.5686 0 0 0 -2.3445 1.2084 3.4629 3.4629 0 0 0 -.8779 2.1585 1.419 1.419 0 0 0 .031.2892 1.19 1.19 0 0 0 .2169.0207 3.0935 3.0935 0 0 0 2.1586-1.1368z">
//                 </path>
//             </svg>
//         </a>
//     </li>

//     <!-- {{-- MAIN LINKS ON HOVER OPENS MEGAMENU --}} -->

//     <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a href="/shop.html">Store</a></li>
//     <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a href="/product-details.html">Mac</a>
//     </li>
//     <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a href="/product-details.html">iPad</a>
//     </li>
//     <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a
//             href="/product-details.html">iPhone</a></li>
//     <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a href="/product-details.html">Watch</a>
//     </li>
//     <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a
//             href="/product-details.html">Vision</a></li>
//     <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a
//             href="/product-details.html">AirPods</a></li>
//     <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a href="/product-details.html">TV &
//             Home</a>
//     </li>
//     <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a
//             href="/product-details.html">Entertainment</a>
//     </li>
//     <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a
//             href="/product-details.html">Accessories</a>
//     </li>
//     <li onmouseover="toggleSubcategoryMegaMenu()" class="nav-link"><a href="">Support</a></li>
//     <li onclick="toggleSubcategoryMegaMenu('searchBarMenu')"
//         onmouseover="toggleOutSubcategoryMegaMenu('searchBarMenu')" class="nav-link text-2xl">
//         <svg stroke="currentColor" fill="currentColor" stroke-width="1" version="1.1" id="search-icon"
//             x="0px" y="0px" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
//             <g>
//                 <path d="M20.031,20.79c0.46,0.46,1.17-0.25,0.71-0.7l-3.75-3.76c1.27-1.41,2.04-3.27,2.04-5.31
//             c0-4.39-3.57-7.96-7.96-7.96s-7.96,3.57-7.96,7.96c0,4.39,3.57,7.96,7.96,7.96c1.98,0,3.81-0.73,5.21-1.94L20.031,20.79z
//              M4.11,11.02c0-3.84,3.13-6.96,6.96-6.96c3.84,0,6.96,3.12,6.96,6.96c0,3.84-3.12,6.96-6.96,6.96C7.24,17.98,4.11,14.86,4.11,11.02
//             z"></path>
//             </g>
//         </svg>
//     </li>
//     <li class="nav-link text-2xl">
//         <a href="/cart.html">
//             <svg stroke="currentColor" fill="currentColor" stroke-width="1" viewBox="0 0 24 24" height="1em"
//                 width="1em" xmlns="http://www.w3.org/2000/svg">
//                 <g id="Shopping_Cart">
//                     <path
//                         d="M17.437,19.934c0,0.552 -0.448,1 -1,1c-0.552,0 -1,-0.448 -1,-1c0,-0.552 0.448,-1 1,-1c0.552,0 1,0.448 1,1Zm-11.217,-4.266l-0.945,-10.9c-0.03,-0.391 -0.356,-0.693 -0.749,-0.693l-0.966,-0c-0.276,-0 -0.5,-0.224 -0.5,-0.5c0,-0.276 0.224,-0.5 0.5,-0.5l0.966,-0c0.916,-0 1.676,0.704 1.746,1.617l0.139,1.818l13.03,-0c0.885,-0 1.577,0.76 1.494,1.638l-0.668,7.52c-0.121,1.285 -1.199,2.267 -2.489,2.267l-9.069,0c-1.29,0 -2.367,-0.981 -2.489,-2.267Zm0.274,-8.158l0.722,8.066c0.073,0.77 0.719,1.359 1.493,1.359l9.069,0c0.774,0 1.42,-0.589 1.493,-1.359l0.668,-7.518c0.028,-0.294 -0.203,-0.548 -0.498,-0.548l-12.947,-0Zm4.454,12.424c-0,0.552 -0.448,1 -1,1c-0.552,0 -1,-0.448 -1,-1c-0,-0.552 0.448,-1 1,-1c0.552,0 1,0.448 1,1Z">
//                     </path>
//                 </g>
//             </svg>
//         </a>
//     </li>
// </ul>

// <ul class="w-full flex items-center justify-between gap-6 lg:gap-8 min-[992px]:hidden">
//     <li class="nav-link">
//         <a href="/">
//             <svg stroke="currentColor" fill="currentColor" height="44" viewBox="0 0 14 44" width="14"
//                 xmlns="http://www.w3.org/2000/svg">
//                 <path
//                     d="m13.0729 17.6825a3.61 3.61 0 0 0 -1.7248 3.0365 3.5132 3.5132 0 0 0 2.1379 3.2223 8.394 8.394 0 0 1 -1.0948 2.2618c-.6816.9812-1.3943 1.9623-2.4787 1.9623s-1.3633-.63-2.613-.63c-1.2187 0-1.6525.6507-2.644.6507s-1.6834-.9089-2.4787-2.0243a9.7842 9.7842 0 0 1 -1.6628-5.2776c0-3.0984 2.014-4.7405 3.9969-4.7405 1.0535 0 1.9314.6919 2.5924.6919.63 0 1.6112-.7333 2.8092-.7333a3.7579 3.7579 0 0 1 3.1604 1.5802zm-3.7284-2.8918a3.5615 3.5615 0 0 0 .8469-2.22 1.5353 1.5353 0 0 0 -.031-.32 3.5686 3.5686 0 0 0 -2.3445 1.2084 3.4629 3.4629 0 0 0 -.8779 2.1585 1.419 1.419 0 0 0 .031.2892 1.19 1.19 0 0 0 .2169.0207 3.0935 3.0935 0 0 0 2.1586-1.1368z">
//                 </path>
//             </svg>
//         </a>
//     </li>
//     <li class="nav-link flex items-center gap-6">
//         <button class="" onclick="toggleMobMenu('searchBarMobMenu')">
//             <svg class=" w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="1" version="1.1"
//                 id="search-icon" x="0px" y="0px" viewBox="0 0 24 24" height="1em" width="1em"
//                 xmlns="http://www.w3.org/2000/svg">
//                 <g>
//                     <path d="M20.031,20.79c0.46,0.46,1.17-0.25,0.71-0.7l-3.75-3.76c1.27-1.41,2.04-3.27,2.04-5.31
//             c0-4.39-3.57-7.96-7.96-7.96s-7.96,3.57-7.96,7.96c0,4.39,3.57,7.96,7.96,7.96c1.98,0,3.81-0.73,5.21-1.94L20.031,20.79z
//              M4.11,11.02c0-3.84,3.13-6.96,6.96-6.96c3.84,0,6.96,3.12,6.96,6.96c0,3.84-3.12,6.96-6.96,6.96C7.24,17.98,4.11,14.86,4.11,11.02
//             z"></path>
//                 </g>
//             </svg>
//         </button>

//         <a href="/cart.html">
//             <svg class="h-5 w-5" stroke="currentColor" fill="currentColor" stroke-width="1"
//                 viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
//                 <g id="Shopping_Cart">
//                     <path
//                         d="M17.437,19.934c0,0.552 -0.448,1 -1,1c-0.552,0 -1,-0.448 -1,-1c0,-0.552 0.448,-1 1,-1c0.552,0 1,0.448 1,1Zm-11.217,-4.266l-0.945,-10.9c-0.03,-0.391 -0.356,-0.693 -0.749,-0.693l-0.966,-0c-0.276,-0 -0.5,-0.224 -0.5,-0.5c0,-0.276 0.224,-0.5 0.5,-0.5l0.966,-0c0.916,-0 1.676,0.704 1.746,1.617l0.139,1.818l13.03,-0c0.885,-0 1.577,0.76 1.494,1.638l-0.668,7.52c-0.121,1.285 -1.199,2.267 -2.489,2.267l-9.069,0c-1.29,0 -2.367,-0.981 -2.489,-2.267Zm0.274,-8.158l0.722,8.066c0.073,0.77 0.719,1.359 1.493,1.359l9.069,0c0.774,0 1.42,-0.589 1.493,-1.359l0.668,-7.518c0.028,-0.294 -0.203,-0.548 -0.498,-0.548l-12.947,-0Zm4.454,12.424c-0,0.552 -0.448,1 -1,1c-0.552,0 -1,-0.448 -1,-1c-0,-0.552 0.448,-1 1,-1c0.552,0 1,0.448 1,1Z">
//                     </path>
//                 </g>
//             </svg>
//         </a>
//     </li>
// </ul>

// <!--{{ --MOBILE MENU TOGGLE BUTTON-- }} -->

//     <button id="toggleMobileMenu" onclick="toggleMobMenu()"
//         class="relative z-10 ml-10 mr-4 nav-link min-[992px]:hidden">
//         <span class="sr-only">Open main menu</span>
//         <div class="block w-5 absolute left-0 top-[-2px] transform -translate-x-1/2 -translate-y-1/2">
//             <span id="toggleMenuBar1" aria-hidden="true"
//                 class="block absolute h-[2px] w-4 bg-current transform transition duration-500 -translate-y-1 ease-in-out"
//             :class="{'rotate-45': open, ' -translate-y-1.5': !open }"></span>
//         <!-- <span aria-hidden="true"
//             class="block absolute  h-[2px] w-5 bg-current   transform transition duration-500 ease-in-out"
//                 :class="{'opacity-0': open }"></span> -->
//     <span id="toggleMenuBar2" aria-hidden="true"
//         class="block absolute h-[2px] w-4 bg-current transform  transition duration-500 translate-y-1 ease-in-out"
//             : class="{ '-rotate-45': open, ' translate-y-1.5': !open }"></span>
//     </div >
// </button >

// </nav >

// < !--{{ --SUBMENU LINKS MEGAMENU ON HOVER OPENS MEGAMENU-- }} -->

// <div id="subcategoryMegaMenu" class="hide-submenu">
// <div class="flex gap-8">

//     <div class="flex flex-col gap-2 pe-12">
//         <h5 class="sub-category-heading">Shop</h5>
//         <ul class="flex flex-col gap-2">
//             <li class="sub-category-link"><a href="">Shop the Latest</a></li>
//             <li class="sub-category-link"><a href="">Mac</a></li>
//             <li class="sub-category-link"><a href="">iPad</a></li>
//             <li class="sub-category-link"><a href="">iPhone</a></li>
//             <li class="sub-category-link"><a href="">Apple Watch</a></li>
//             <li class="sub-category-link"><a href="">Apple Vision Pro</a></li>
//             <li class="sub-category-link"><a href="">Acessories</a></li>
//         </ul>
//     </div>

//     <div class="flex flex-col gap-2">
//         <h5 class="sub-category-heading">Quick Links</h5>
//         <ul class="flex flex-col gap-2">
//             <li class="sub-category-link-2"><a href="">Shop the Latest</a></li>
//             <li class="sub-category-link-2"><a href="">Mac</a></li>
//             <li class="sub-category-link-2"><a href="">iPad</a></li>
//             <li class="sub-category-link-2"><a href="">iPhone</a></li>
//             <li class="sub-category-link-2"><a href="">Apple Watch</a></li>
//             <li class="sub-category-link-2"><a href="">Apple Vision Pro</a></li>
//             <li class="sub-category-link-2"><a href="">Acessories</a></li>
//         </ul>
//     </div>

//     <div class="flex flex-col gap-2">
//         <h5 class="sub-category-heading">Shop Special Stores</h5>
//         <ul class="flex flex-col gap-2">
//             <li class="sub-category-link-2"><a href="">Shop the Latest</a></li>
//             <li class="sub-category-link-2"><a href="">Mac</a></li>
//             <li class="sub-category-link-2"><a href="">iPad</a></li>
//             <li class="sub-category-link-2"><a href="">iPhone</a></li>
//             <li class="sub-category-link-2"><a href="">Apple Watch</a></li>
//             <li class="sub-category-link-2"><a href="">Apple Vision Pro</a></li>
//             <li class="sub-category-link-2"><a href="">Acessories</a></li>
//         </ul>
//     </div>

// </div>
// </div>


// <!--SEARCH ON CLICK OPENS SEARCH-- >
// <div id="searchBarMenu" class="hide-submenu">
// <form action="">
//     <div class="relative flex items-center w-full mb-4">
//         <div class="inset-y-0 left-0 flex items-center pointer-events-none">
//             <svg class="w-6 h-6 text-skin-inverted/80" stroke="currentColor" fill="currentColor" stroke-width="1"
//                 version="1.1" id="search-icon" x="0px" y="0px" viewBox="0 0 24 24" height="1em" width="1em"
//                 xmlns="http://www.w3.org/2000/svg">
//                 <g>
//                     <path d="M20.031,20.79c0.46,0.46,1.17-0.25,0.71-0.7l-3.75-3.76c1.27-1.41,2.04-3.27,2.04-5.31
//         c0-4.39-3.57-7.96-7.96-7.96s-7.96,3.57-7.96,7.96c0,4.39,3.57,7.96,7.96,7.96c1.98,0,3.81-0.73,5.21-1.94L20.031,20.79z
//          M4.11,11.02c0-3.84,3.13-6.96,6.96-6.96c3.84,0,6.96,3.12,6.96,6.96c0,3.84-3.12,6.96-6.96,6.96C7.24,17.98,4.11,14.86,4.11,11.02
//         z"></path>
//                 </g>
//             </svg>
//         </div>
//         <input type="text" name="search" id="search"
//             class="w-full bg-transparent py-2 pl-4 pr-4 rounded-lg focus:outline-none text-skin-inverted text-2xl"
//             placeholder="Search apple.com">
//     </div>
// </form>

// <div class="flex gap-8">

//     <div class="flex flex-col gap-2">
//         <h5 class="sub-category-heading">Quick Links</h5>
//         <ul class="flex flex-col gap-2">
//             <li class="sub-category-link-2"><a href="">Shop the Latest</a></li>
//             <li class="sub-category-link-2"><a href="">Mac</a></li>
//             <li class="sub-category-link-2"><a href="">iPad</a></li>
//             <li class="sub-category-link-2"><a href="">iPhone</a></li>
//             <li class="sub-category-link-2"><a href="">Apple Watch</a></li>
//             <li class="sub-category-link-2"><a href="">Apple Vision Pro</a></li>
//             <li class="sub-category-link-2"><a href="">Acessories</a></li>
//         </ul>
//     </div>

// </div>
// </div>


// <!--{{ --MOBILE MENU-- }} -->

// <div id="MobMenu" class="hide-mob-menu">
// <button id="goBackBtn" onclick="goBackToMainMenu()"
//     class="absolute top-4 left-2 text-skin-inverted transition-all duration-700 ease-in-out opacity-0 translate-x-12">Go
//     Back</button>

// <div class="flex relative h-max overflow-hidden">

//     <div id="mobMainMenu" class="active-mob-mainmenu">
//         <ul class="flex flex-col gap-4">
//             <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">Store</a>
//             </li>
//             <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">Mac</a>
//             </li>
//             <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">iPad</a>
//             </li>
//             <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">iPhone</a>
//             </li>
//             <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">Watch</a>
//             </li>
//             <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">Vision</a>
//             </li>
//             <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">AirPods</a>
//             </li>
//             <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a href="#">TV &
//                     Home</a>
//             </li>
//             <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a
//                     href="#">Entertainment</a>
//             </li>
//             <li onclick="toggleMobSubmenu('storeMobSubmenu')" class="mob-nav-link"><a
//                     href="#">Accessories</a></li>
//         </ul>
//     </div>

//     <div id='storeMobSubmenu' class="hide-mob-submenu">
//         <ul class="flex flex-col gap-4">
//             <li onclick="" class="mob-nav-link"><a href="">Shop the Latest</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">Mac</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">iPad</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">iPhone</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">Apple Watch</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">Apple Vision Pro</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">Accessories</a></li>
//         </ul>

//         <div class="flex gap-8">
//             <div class="flex flex-col gap-2">
//                 <h5 class="sub-category-heading">Quick Links</h5>
//                 <ul class="flex flex-col gap-2">
//                     <li class="sub-category-link-2"><a href="">Shop the Latest</a></li>
//                     <li class="sub-category-link-2"><a href="">Mac</a></li>
//                     <li class="sub-category-link-2"><a href="">iPad</a></li>
//                     <li class="sub-category-link-2"><a href="">iPhone</a></li>
//                     <li class="sub-category-link-2"><a href="">Apple Watch</a></li>
//                     <li class="sub-category-link-2"><a href="">Apple Vision Pro</a></li>
//                     <li class="sub-category-link-2"><a href="">Acessories</a></li>
//                 </ul>
//             </div>

//             <div class="flex flex-col gap-2">
//                 <h5 class="sub-category-heading">Shop Special Stores</h5>
//                 <ul class="flex flex-col gap-2">
//                     <li class="sub-category-link-2"><a href="">Shop the Latest</a></li>
//                     <li class="sub-category-link-2"><a href="">Mac</a></li>
//                     <li class="sub-category-link-2"><a href="">iPad</a></li>
//                     <li class="sub-category-link-2"><a href="">iPhone</a></li>
//                     <li class="sub-category-link-2"><a href="">Apple Watch</a></li>
//                     <li class="sub-category-link-2"><a href="">Apple Vision Pro</a></li>
//                     <li class="sub-category-link-2"><a href="">Acessories</a></li>
//                 </ul>
//             </div>
//         </div>
//     </div>

//     <div class="hidden flex-col gap-2 p-12 w-0 overflow-hidden">
//         <ul class="flex flex-col gap-4">
//             <li onclick="" class="mob-nav-link"><a href="">Store</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">Mac</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">iPad</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">iPhone</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">Watch</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">Vision</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">AirPods</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">TV & Home</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">Entertainment</a></li>
//             <li onclick="" class="mob-nav-link"><a href="">Accessories</a></li>
//         </ul>
//     </div>

// </div>
// </div>

// <!--{{ --SEARCH BAR MOBILE MENU-- }} -->

//     <div id="searchBarMobMenu" class="hide-mob-menu">
//         <div class="px-12 pt-8">
//             <form action="">
//                 <div class="relative flex items-center mb-4">
//                     <div class="inset-y-0 left-0 flex items-center pointer-events-none">
//                         <svg class="w-6 h-6 text-skin-inverted/80" stroke="currentColor" fill="currentColor"
//                             stroke-width="1" version="1.1" id="search-icon" x="0px" y="0px" viewBox="0 0 24 24"
//                             height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
//                             <g>
//                                 <path d="M20.031,20.79c0.46,0.46,1.17-0.25,0.71-0.7l-3.75-3.76c1.27-1.41,2.04-3.27,2.04-5.31
//         c0-4.39-3.57-7.96-7.96-7.96s-7.96,3.57-7.96,7.96c0,4.39,3.57,7.96,7.96,7.96c1.98,0,3.81-0.73,5.21-1.94L20.031,20.79z
//          M4.11,11.02c0-3.84,3.13-6.96,6.96-6.96c3.84,0,6.96,3.12,6.96,6.96c0,3.84-3.12,6.96-6.96,6.96C7.24,17.98,4.11,14.86,4.11,11.02
//         z"></path>
//                             </g>
//                         </svg>
//                     </div>
//                     <input type="text" name="search" id="searchMob"
//                         class="w-full bg-transparent py-2 pl-4 pr-4 rounded-lg focus:outline-none text-skin-inverted text-3xl"
//                         placeholder="Search">
//                 </div>
//             </form>

//             <div class="flex gap-8">

//                 <div class="flex flex-col gap-2">
//                     <h5 class="sub-category-heading text-2xl">Quick Links</h5>
//                     <ul class="flex flex-col gap-2">
//                         <li class="sub-category-link-2"><a href="">Shop the Latest</a></li>
//                         <li class="sub-category-link-2"><a href="">Mac</a></li>
//                         <li class="sub-category-link-2"><a href="">iPad</a></li>
//                         <li class="sub-category-link-2"><a href="">iPhone</a></li>
//                         <li class="sub-category-link-2"><a href="">Apple Watch</a></li>
//                         <li class="sub-category-link-2"><a href="">Apple Vision Pro</a></li>
//                         <li class="sub-category-link-2"><a href="">Acessories</a></li>
//                     </ul>
//                 </div>

//             </div>
//         </div>
//     </div>