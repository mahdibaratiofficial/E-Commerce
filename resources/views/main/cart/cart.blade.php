@extends('layouts.main.app')


@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home<i class="fi-rs-home mr-5"></i></a>
                    <span></span> Shop
                    <span></span> Cart
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
           <livewire:main.reactive.cart.cart />
        </div>
    </main>
@endsection
