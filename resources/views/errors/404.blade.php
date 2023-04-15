@extends('layouts.main.blank-app')


@section('content')

<main class="main page-404">
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row shabnam">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                    <p class="mb-20"><img loading="lazy" src="assets/main/imgs/page/page-404.png" alt="" class="hover-up" /></p>
                    <h1 class="display-2 mb-30 shabnam">صفحه مورد نظر پیدا نشد</h1>
                    <p class="font-lg text-grey-700 mb-30 shabnam">
                        لینکی که روی آن کلیک کردید ممکن است خراب باشد یا صفحه حذف شده باشد.<br />
                        از <a href="index.html"> <span> صفحه اصلی</span></a> دیدن کنید یا راجب این مشکل با ما<a href="page-contact.html"><span>تماس بگیرید</span></a>
                    </p>
                    <div class="search-form">
                        <form action="page-404.html#">
                            <input type="text" placeholder="جستجو" />
                            <button type="submit"><i class="fi-rs-search"></i></button>
                        </form>
                    </div>
                    <a class="btn btn-default submit-auto-width font-xs hover-up mt-30 shabnam"  href="index.html"><i class="fi-rs-home mr-5 "></i> برگشت به صفحه اصلی</a>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection