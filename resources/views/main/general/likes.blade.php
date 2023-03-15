@extends('layouts.main.app')

@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home<i class="fi-rs-home mr-5"></i></a>
                    <span></span> Shop <span></span> Fillter
                </div>
            </div>
        </div>
        <div class="container mb-30 mt-50">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="mb-50">
                        <h1 class="heading-2 mb-10">Your Wishlist</h1>
                        <h6 class="text-body">There are <span class="text-brand">5</span> products in this list</h6>
                    </div>
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <tbody>
                                @foreach ($instanses as $instanse)
                                    <livewire:main.reactive.general.single-row-of-like :like="$instanse" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
