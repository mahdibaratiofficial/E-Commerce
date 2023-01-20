<!DOCTYPE html>
<html lang="ar" dir="rtl" class="rtl">
    <head>
        <meta charset="utf-8" />
        <title>Nest - Multipurpose eCommerce HTML Template</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg" />

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />

        <livewire:styles />
    </head>

    <body>

        <x-main.un-reactive.header />

        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="mobile-header-wrapper-inner">
                <div class="mobile-header-top">
                    <div class="mobile-header-logo">
                        <a href="index.html"><img src="assets/imgs/theme/logo.svg" alt="logo" /></a>
                    </div>
                    <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                        <button class="close-style search-close">
                            <i class="icon-top"></i>
                            <i class="icon-bottom"></i>
                        </button>
                    </div>
                </div>
                <div class="mobile-header-content-area">
                    <div class="mobile-search search-style-3 mobile-header-border">
                        <form action="index.html#">
                            <input type="text" placeholder="Search for items…" />
                            <button type="submit"><i class="fi-rs-search"></i></button>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-border">
                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu font-heading">
                                <li class="menu-item-has-children">
                                    <a href="index.html">Home</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                        <li><a href="index-3.html">Home 3</a></li>
                                        <li><a href="index-4.html">Home 4</a></li>
                                        <li><a href="index-5.html">Home 5</a></li>
                                        <li><a href="index-6.html">Home 6</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="shop-grid-right.html">shop</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-grid-right.html">Shop Grid – Right Sidebar</a></li>
                                        <li><a href="shop-grid-left.html">Shop Grid – Left Sidebar</a></li>
                                        <li><a href="shop-list-right.html">Shop List – Right Sidebar</a></li>
                                        <li><a href="shop-list-left.html">Shop List – Left Sidebar</a></li>
                                        <li><a href="shop-fullwidth.html">Shop - Wide</a></li>
                                        <li class="menu-item-has-children">
                                            <a href="index.html#">Single Product</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-product-right.html">Product – Right Sidebar</a></li>
                                                <li><a href="shop-product-left.html">Product – Left Sidebar</a></li>
                                                <li><a href="shop-product-full.html">Product – No sidebar</a></li>
                                                <li><a href="shop-product-vendor.html">Product – Vendor Infor</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop-filter.html">Shop – Filter</a></li>
                                        <li><a href="shop-wishlist.html">Shop – Wishlist</a></li>
                                        <li><a href="shop-cart.html">Shop – Cart</a></li>
                                        <li><a href="shop-checkout.html">Shop – Checkout</a></li>
                                        <li><a href="shop-compare.html">Shop – Compare</a></li>
                                        <li class="menu-item-has-children">
                                            <a href="index.html#">Shop Invoice</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-invoice-1.html">Shop Invoice 1</a></li>
                                                <li><a href="shop-invoice-2.html">Shop Invoice 2</a></li>
                                                <li><a href="shop-invoice-3.html">Shop Invoice 3</a></li>
                                                <li><a href="shop-invoice-4.html">Shop Invoice 4</a></li>
                                                <li><a href="shop-invoice-5.html">Shop Invoice 5</a></li>
                                                <li><a href="shop-invoice-6.html">Shop Invoice 6</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.html#">Vendors</a>
                                    <ul class="dropdown">
                                        <li><a href="vendors-grid.html">Vendors Grid</a></li>
                                        <li><a href="vendors-list.html">Vendors List</a></li>
                                        <li><a href="vendor-details-1.html">Vendor Details 01</a></li>
                                        <li><a href="vendor-details-2.html">Vendor Details 02</a></li>
                                        <li><a href="vendor-dashboard.html">Vendor Dashboard</a></li>
                                        <li><a href="vendor-guide.html">Vendor Guide</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.html#">Mega menu</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="index.html#">Women's Fashion</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-product-right.html">Dresses</a></li>
                                                <li><a href="shop-product-right.html">Blouses & Shirts</a></li>
                                                <li><a href="shop-product-right.html">Hoodies & Sweatshirts</a></li>
                                                <li><a href="shop-product-right.html">Women's Sets</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="index.html#">Men's Fashion</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-product-right.html">Jackets</a></li>
                                                <li><a href="shop-product-right.html">Casual Faux Leather</a></li>
                                                <li><a href="shop-product-right.html">Genuine Leather</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="index.html#">Technology</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-product-right.html">Gaming Laptops</a></li>
                                                <li><a href="shop-product-right.html">Ultraslim Laptops</a></li>
                                                <li><a href="shop-product-right.html">Tablets</a></li>
                                                <li><a href="shop-product-right.html">Laptop Accessories</a></li>
                                                <li><a href="shop-product-right.html">Tablet Accessories</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="blog-category-fullwidth.html">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                        <li><a href="blog-category-list.html">Blog Category List</a></li>
                                        <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                        <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                        <li class="menu-item-has-children">
                                            <a href="index.html#">Single Product Layout</a>
                                            <ul class="dropdown">
                                                <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                                <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                                <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.html#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="page-about.html">About Us</a></li>
                                        <li><a href="page-contact.html">Contact</a></li>
                                        <li><a href="page-account.html">My Account</a></li>
                                        <li><a href="page-login.html">Login</a></li>
                                        <li><a href="page-register.html">Register</a></li>
                                        <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                        <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="page-terms.html">Terms of Service</a></li>
                                        <li><a href="page-404.html">404 Page</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.html#">Language</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html#">English</a></li>
                                        <li><a href="index.html#">French</a></li>
                                        <li><a href="index.html#">German</a></li>
                                        <li><a href="index.html#">Spanish</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    <div class="mobile-header-info-wrap">
                        <div class="single-mobile-header-info">
                            <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="page-login.html"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="index.html#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                        </div>
                    </div>
                    <div class="mobile-social-icon mb-50">
                        <h6 class="mb-15">Follow Us</h6>
                        <a href="index.html#"><img src="assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                        <a href="index.html#"><img src="assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                        <a href="index.html#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                        <a href="index.html#"><img src="assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                        <a href="index.html#"><img src="assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                    </div>
                    <div class="site-copyright">Copyright 2021 © Nest. All rights reserved. Powered by AliThemes.</div>
                </div>
            </div>
        </div>
        <!--End header-->
        <main class="main">

            {{-- Start Slider --}}

                <x-main.un-reactive.full-page-slider />

            {{-- End Slider --}}


            {{-- Start Popular Categories --}}


                <x-main.un-reactive.popular-categories />


            {{-- End Popular Categories --}}



            {{-- Start little Banners --}}

                <x-main.un-reactive.little-banners />

            {{-- End Little Banners --}}

            <!--End banners-->

            {{-- Start Products Tab --}}

                <x-main.un-reactive.products3-rows-tab />

            {{-- End Products Tab --}}


            {{-- Start Best Sells --}}

                <x-main.un-reactive.best-sells />

            {{-- End Best Sells --}}



            {{-- Start Deals --}}

                <x-main.un-reactive.deals />

            {{-- End Deals --}}


            {{-- Start Popular Products Columns --}}

                {{-- <x-main.un-reactive.popular-products-columns /> --}}

            {{-- End Popular Products Columns --}}
        </main>

        <x-main.un-reactive.footer />

        <!-- Preloader Start -->
        <!-- <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="text-center">
                        <img src="assets/imgs/theme/loading.gif" alt="" />
                    </div>
                </div>
            </div>
        </div> -->



        {{-- livewire Scripts --}}
        <livewire:scripts />

        <!-- Vendor JS-->
        <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/slick.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/waypoints.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/wow.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/perfect-scrollbar.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/magnific-popup.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/select2.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/counterup.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/images-loaded.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/isotope.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/scrollup.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/jquery.vticker-min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js')}}"></script>
        <!-- Template  JS -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/shop.js') }}"></script>
    </body>
</html>
