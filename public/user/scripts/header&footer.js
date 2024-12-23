


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
