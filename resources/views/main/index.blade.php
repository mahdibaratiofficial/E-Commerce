@extends('layouts.main.app')

@section('content')


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


@endsection