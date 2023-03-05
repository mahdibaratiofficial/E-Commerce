<div class="detail-extralink mb-50">
    @php
        $count = $product['quantity'] >= 5 ? 5 : (int) $product['quantity'];
    @endphp
    <div class="product-extra-link2 d-flex">
        {{-- {{ dd(cart()::has($product['id'])) }} --}}
        @if (cart()::has($product['id']))
            <div class="card-login p-2 d-flex align-items-center">

                <a aria-label="اضافه" class="" wire:click="plus()"><i class="fi-rs-minus"></i></a>

                <a aria-label="Add To Wishlist" class=""
                    wire:click="plus('{{ $product['id'] }}','{{ $product['quantity'] }}')"><i class="fi-rs-plus"></i></a>

                <a aria-label="Remove" class="" wire:click="remove('{{ $product['id'] }}')"><i
                        wire:loading.class="snipper" class="fi-rs-trash"></i></a>
                {{ cart()::quantity($product['id']) }} محصول در سبد خرید شما
            </div>

            @error('productQuantity')
                <span> {{ $message }} </span>
            @enderror

            @error('quantity')
                <span> {{ $message }} </span>
            @enderror

            @error('inventory')
                <span> {{ $message }} </span>
            @enderror
        @else
            @if ($product['quantity'] > 1)
                <div class=" p-2 d-flex align-items-center">
                    <button type="submit" class="button button-add-to-cart shabnam"
                        wire:click="addToCart({{ $product }})">
                        <div wire:loading wire:target="addToCart">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </div>
                        اضافه به سبد خرید
                    </button>
                </div>
            @else
                <span class="text text-danger"> اتمام موجودی </span>
            @endif
        @endif
        <div class="card-login p-2 d-flex align-items-center">
            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i
                    class="fi-rs-heart"></i></a>
            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i
                    class="fi-rs-shuffle"></i></a>
        </div>
    </div>
</div>
