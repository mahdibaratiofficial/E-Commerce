@extends('layouts.main.app')

@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">خانه<i class="fi-rs-home mr-5"></i></a>

                    @php
                        $categories = App\Services\BreadCrumb\BreadCrumb::set($product)->Categories();
                    @endphp

                    @if ($categories)
                        @foreach ($categories->sort() as $category)
                            {{-- {{ dd($category) }} --}}
                            <span></span> <a href="\products?category={{ $category->title }}">{{ $category->title }}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50 mt-30">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        @foreach ($product->images as $image)
                                            <figure class="border-radius-10">
                                                <img src="{{ $image->url }}" alt="{{ $image->alt }}" loading="lazy" />
                                            </figure>
                                        @endforeach
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails">

                                        @foreach ($product->images as $image)
                                            <div><img src="{{ $image->url }}" alt="{{ $image->alt }}" loading="lazy" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    <span class="stock-status out-stock"> فروش ویژه </span>
                                    <h2 class="title-detail">{{ $product->title }}</h2>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted shabnam"> ({{ rand(3, 100) }}
                                                نظر)</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <span class="current-price text-brand m-3" style="color:black !important">
                                                 {{ $product->price }} 
                                                <span>
                                                    <span class="">
                                                        <svg class="mr-1 text-light" width="40" height="39"
                                                            viewBox="0 0 9 10" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M0.874343 3.99165C1.02826 3.99165 1.1599 3.96938 1.26926 3.92482C1.38267 3.88432 1.47583 3.82761 1.54874 3.7547C1.62165 3.6818 1.67835 3.59471 1.71886 3.49345C1.75936 3.39624 1.78366 3.29296 1.79176 3.18359H1.37862C1.168 3.18359 0.995855 3.16132 0.862191 3.11676C0.728527 3.07221 0.623216 3.0074 0.546258 2.92234C0.4693 2.83323 0.414619 2.7259 0.382216 2.60033C0.353863 2.47477 0.339686 2.333 0.339686 2.17504C0.339686 2.01707 0.361964 1.86923 0.406518 1.73152C0.451073 1.58975 0.51588 1.46621 0.600939 1.3609C0.690048 1.25559 0.79941 1.17256 0.929023 1.1118C1.05864 1.04699 1.2085 1.01459 1.37862 1.01459C1.51634 1.01459 1.64595 1.03687 1.76746 1.08142C1.89302 1.12598 2.00239 1.19686 2.09555 1.29407C2.18871 1.39128 2.26161 1.51684 2.31427 1.67076C2.37097 1.82468 2.39933 2.01302 2.39933 2.23579V2.51527H2.89145C2.98056 2.51527 3.02512 2.62261 3.02512 2.83728C3.02512 3.06816 2.98056 3.18359 2.89145 3.18359H2.38718C2.37908 3.38206 2.33857 3.57041 2.26566 3.74863C2.19276 3.92685 2.0915 4.08279 1.96188 4.21645C1.83632 4.35012 1.68443 4.45543 1.50621 4.53239C1.32799 4.61339 1.12749 4.6539 0.904721 4.6539H0.291081L0.254628 3.99165H0.874343ZM0.935099 2.13251C0.935099 2.27427 0.965477 2.37351 1.02623 2.43021C1.09104 2.48692 1.2166 2.51527 1.40292 2.51527H1.80392V2.22972C1.80392 2.0191 1.76341 1.87126 1.6824 1.7862C1.60544 1.70114 1.49608 1.65861 1.35432 1.65861C1.22065 1.65861 1.11737 1.69911 1.04446 1.78012C0.971553 1.86113 0.935099 1.97859 0.935099 2.13251ZM3.89142 2.51527C3.94407 2.51527 3.9785 2.54363 3.99471 2.60033C4.01496 2.65299 4.02508 2.73197 4.02508 2.83728C4.02508 2.95474 4.01496 3.04183 3.99471 3.09853C3.9785 3.15524 3.94407 3.18359 3.89142 3.18359H2.88894C2.83628 3.18359 2.80185 3.15727 2.78565 3.10461C2.7654 3.0479 2.75527 2.9669 2.75527 2.86158C2.75527 2.74412 2.7654 2.65704 2.78565 2.60033C2.80185 2.54363 2.83628 2.51527 2.88894 2.51527H3.89142ZM4.89414 2.51527C4.94679 2.51527 4.98122 2.54363 4.99742 2.60033C5.01767 2.65299 5.0278 2.73197 5.0278 2.83728C5.0278 2.95474 5.01767 3.04183 4.99742 3.09853C4.98122 3.15524 4.94679 3.18359 4.89414 3.18359H3.89166C3.839 3.18359 3.80457 3.15727 3.78837 3.10461C3.76812 3.0479 3.75799 2.9669 3.75799 2.86158C3.75799 2.74412 3.76812 2.65704 3.78837 2.60033C3.80457 2.54363 3.839 2.51527 3.89166 2.51527H4.89414ZM5.89685 2.51527C5.94951 2.51527 5.98394 2.54363 6.00014 2.60033C6.02039 2.65299 6.03052 2.73197 6.03052 2.83728C6.03052 2.95474 6.02039 3.04183 6.00014 3.09853C5.98394 3.15524 5.94951 3.18359 5.89685 3.18359H4.89437C4.84172 3.18359 4.80729 3.15727 4.79109 3.10461C4.77084 3.0479 4.76071 2.9669 4.76071 2.86158C4.76071 2.74412 4.77084 2.65704 4.79109 2.60033C4.80729 2.54363 4.84172 2.51527 4.89437 2.51527H5.89685ZM6.89957 2.51527C6.95223 2.51527 6.98666 2.54363 7.00286 2.60033C7.02311 2.65299 7.03324 2.73197 7.03324 2.83728C7.03324 2.95474 7.02311 3.04183 7.00286 3.09853C6.98666 3.15524 6.95223 3.18359 6.89957 3.18359H5.89709C5.84444 3.18359 5.81001 3.15727 5.79381 3.10461C5.77355 3.0479 5.76343 2.9669 5.76343 2.86158C5.76343 2.74412 5.77355 2.65704 5.79381 2.60033C5.81001 2.54363 5.84444 2.51527 5.89709 2.51527H6.89957ZM7.45877 2.51527C7.73015 2.51527 7.86584 2.38363 7.86584 2.12036V1.40343H8.48555V2.16289C8.48555 2.49907 8.40049 2.75425 8.23037 2.92842C8.06026 3.09853 7.82128 3.18359 7.51345 3.18359H6.89981C6.84715 3.18359 6.81273 3.15727 6.79652 3.10461C6.77627 3.0479 6.76615 2.9669 6.76615 2.86158C6.76615 2.74412 6.77627 2.65704 6.79652 2.60033C6.81273 2.54363 6.84715 2.51527 6.89981 2.51527H7.45877ZM8.50378 0.692582H7.87191V0.0971694H8.50378V0.692582ZM7.63496 0.692582H7.0031V0.0971694H7.63496V0.692582ZM3.62053 8.0317C3.62053 8.26258 3.58408 8.47522 3.51117 8.66964C3.44231 8.86812 3.34105 9.04026 3.20739 9.18607C3.07777 9.33189 2.91778 9.4453 2.72741 9.52631C2.54109 9.61137 2.3325 9.6539 2.10162 9.6539H1.71886C1.26521 9.6539 0.912822 9.51416 0.661695 9.23468C0.410569 8.9552 0.285006 8.57243 0.285006 8.08638V6.99884H0.898645V8.06208C0.898645 8.20385 0.914847 8.33143 0.94725 8.44485C0.979654 8.55826 1.03028 8.65547 1.09914 8.73648C1.17205 8.81749 1.26521 8.88027 1.37862 8.92482C1.49608 8.96938 1.63785 8.99165 1.80392 8.99165H2.07124C2.24136 8.99165 2.38515 8.96533 2.50261 8.91267C2.62413 8.86407 2.72134 8.79521 2.79424 8.7061C2.8712 8.62104 2.92588 8.51978 2.95829 8.40232C2.99069 8.2889 3.00689 8.16739 3.00689 8.03778V6.40343H3.62053V8.0317ZM2.19276 6.3123H1.50621V5.69258H2.19276V6.3123ZM5.17841 8.18359C5.065 8.18359 4.95564 8.16942 4.85033 8.14106C4.74907 8.10866 4.65996 8.05601 4.583 7.9831C4.50604 7.91019 4.44528 7.81501 4.40073 7.69754C4.35617 7.57603 4.3339 7.42616 4.3339 7.24795V4.4167H4.95361V7.09605C4.95361 7.22567 4.98196 7.32895 5.03867 7.40591C5.09943 7.47882 5.18854 7.51527 5.306 7.51527H5.44574C5.53485 7.51527 5.5794 7.62261 5.5794 7.83728C5.5794 8.06816 5.53485 8.18359 5.44574 8.18359H5.17841ZM5.50085 7.51527C5.63856 7.51527 5.7459 7.48895 5.82286 7.43629C5.89981 7.37958 5.93829 7.28845 5.93829 7.16289V7.02922C5.93829 6.86721 5.96057 6.71734 6.00512 6.57963C6.05373 6.44191 6.12259 6.32445 6.2117 6.22724C6.30081 6.13003 6.40814 6.0551 6.5337 6.00244C6.66332 5.94573 6.80711 5.91738 6.96508 5.91738C7.13114 5.91738 7.27696 5.94573 7.40252 6.00244C7.53213 6.0551 7.63947 6.13205 7.72453 6.23331C7.80959 6.33052 7.8744 6.44799 7.91895 6.5857C7.96351 6.72342 7.98578 6.87328 7.98578 7.0353C7.98578 7.39984 7.89262 7.68337 7.7063 7.88589C7.52403 8.08436 7.27493 8.18359 6.959 8.18359C6.79698 8.18359 6.64104 8.15322 6.49118 8.09246C6.34536 8.02765 6.23397 7.92639 6.15702 7.78868C6.08006 7.94664 5.98082 8.05195 5.85931 8.10461C5.7378 8.15727 5.61831 8.18359 5.50085 8.18359H5.44617C5.39351 8.18359 5.35908 8.15727 5.34288 8.10461C5.32263 8.0479 5.3125 7.9669 5.3125 7.86158C5.3125 7.74412 5.32263 7.65704 5.34288 7.60033C5.35908 7.54363 5.39351 7.51527 5.44617 7.51527H5.50085ZM7.39037 7.07783C7.39037 6.94011 7.35797 6.82468 7.29316 6.73152C7.2324 6.63836 7.12102 6.59178 6.959 6.59178C6.80508 6.59178 6.6937 6.63836 6.62484 6.73152C6.56003 6.82063 6.52763 6.93809 6.52763 7.0839C6.52763 7.22567 6.56611 7.333 6.64307 7.40591C6.72002 7.47882 6.82534 7.51527 6.959 7.51527C7.24658 7.51527 7.39037 7.36946 7.39037 7.07783Z"
                                                                fill="#000"></path>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </span>
                                            <span>
                                                <span class="save-price font-md color3 ml-15 shabnam">{{ rand(1, 100) }}%
                                                    تخفیف</span>
                                                <span class="old-price font-md ml-15"
                                                    style="font-weight:400">{{ $product->price - rand(1, 100) }}</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="short-desc mb-30">
                                        <p class="font-lg">{{ $product->descriotion }}</p>
                                    </div>
                                    <div class="attr-detail attr-size mb-30">
                                        <strong class="mr-10">سایز / اندازه: </strong>
                                        <ul class="list-filter size-filter font-small">
                                            <li><a href="shop-product-full.html#">50g</a></li>
                                            <li class="active"><a href="shop-product-full.html#">60g</a></li>
                                            <li><a href="shop-product-full.html#">80g</a></li>
                                            <li><a href="shop-product-full.html#">100g</a></li>
                                            <li><a href="shop-product-full.html#">150g</a></li>
                                        </ul>
                                    </div>
                                    <livewire:main.reactive.product.actions :product="$product" />
                                    <div class="font-xs">
                                        <ul class="mr-50 float-start">
                                            <li class="mb-5">Type: <span class="text-brand">Organic</span></li>
                                            <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2021</span></li>
                                            <li>LIFE: <span class="text-brand">70 days</span></li>
                                        </ul>
                                        <ul class="float-start">
                                            <li class="mb-5">SKU: <a href="shop-product-full.html#">FWM15VKT</a></li>
                                            <li class="mb-5">Tags: <a href="shop-product-full.html#"
                                                    rel="tag">Snack</a>, <a href="shop-product-full.html#"
                                                    rel="tag">Organic</a>, <a href="shop-product-full.html#"
                                                    rel="tag">Brown</a></li>
                                            <li>Stock:<span class="in-stock text-brand ml-5">8 Items In Stock</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active " id="Description-tab" data-bs-toggle="tab"
                                            href="shop-product-full.html#Description">توضیحات</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                            href="shop-product-full.html#Additional-info">مشخصات محصول</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab"
                                            href="shop-product-full.html#Vendor-info">اطلاعات فروشنده</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab"
                                            href="shop-product-full.html#Reviews">نظرات
                                            ({{ count($product->comments->where('approved', 1)) }})</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">

                                    <div class="tab-pane fade show active" id="Description">
                                        <x-main.un-reactive.single-product.description :description="$product->description" />
                                    </div>

                                    <div class="tab-pane fade" id="Additional-info">
                                        <x-main.un-reactive.single-product.additional-info :attriutes="$product->attribute" />
                                    </div>

                                    <div class="tab-pane fade" id="Vendor-info">
                                        @if ($product->vendor)
                                            <x-main.un-reactive.single-product.vendor-deteals :vendor="$product->vendor" />
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="Reviews">
                                        <!--Comments-->
                                        @if ($product->comments)
                                            <x-main.un-reactive.single-product.comments :product="serialize($product)"
                                                :comments="$product->comments" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h2 class="section-title style-1 mb-30">Related products</h2>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html" tabindex="0">
                                                        <img class="default-img"
                                                            src="/assets/main/imgs/shop/product-2-1.jpg" alt="" />
                                                        <img class="hover-img"
                                                            src="/assets/main/imgs/shop/product-2-2.jpg" alt="" />
                                                    </a>
                                                </div>

                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="shop-product-right.html" tabindex="0">Ulstra Bass
                                                        Headphone</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span> </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>$238.85 </span>
                                                    <span class="old-price">$245.8</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html" tabindex="0">
                                                        <img class="default-img"
                                                            src="/assets/main/imgs/shop/product-3-1.jpg" alt="" />
                                                        <img class="hover-img"
                                                            src="/assets/main/imgs/shop/product-4-2.jpg" alt="" />
                                                    </a>
                                                </div>

                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="sale">-12%</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="shop-product-right.html" tabindex="0">Smart Bluetooth
                                                        Speaker</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span> </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>$138.85 </span>
                                                    <span class="old-price">$145.8</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html" tabindex="0">
                                                        <img class="default-img"
                                                            src="/assets/main/imgs/shop/product-4-1.jpg" alt="" />
                                                        <img class="hover-img"
                                                            src="/assets/main/imgs/shop/product-4-2.jpg" alt="" />
                                                    </a>
                                                </div>

                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="new">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="shop-product-right.html" tabindex="0">HomeSpeak 12UEA
                                                        Goole</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span> </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>$738.85 </span>
                                                    <span class="old-price">$1245.8</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6 d-lg-block d-none">
                                        <div class="product-cart-wrap hover-up mb-0">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html" tabindex="0">
                                                        <img class="default-img"
                                                            src="/assets/main/imgs/shop/product-5-1.jpg" alt="" />
                                                        <img class="hover-img"
                                                            src="/assets/main/imgs/shop/product-3-2.jpg" alt="" />
                                                    </a>
                                                </div>

                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="shop-product-right.html" tabindex="0">Dadua Camera 4K
                                                        2021EF</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span> </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>$89.8 </span>
                                                    <span class="old-price">$98.8</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
