<div class="detail-extralink mb-50">
    <div class="product-extra-link2 d-flex">
        @php
            $cookie = cart()::has($product['id']) ? cart()::getById($product['id']) : [];
            $status = $cookie != [] ?? array_keys($cookie)[0] == md5($product['id']);
        @endphp

        {{-- {{ $cookie[0] }} --}}
        {{-- {{ dd(cart()::has($product['id'])) }} --}}
        @if ($this->has($product['id']))
            <div class="card-login p-2 d-flex align-items-center">

                <a aria-label="اضافه" class="" wire:target="minus" wire:click="minus('{{ $product['id'] }}')"><i
                        class="fi-rs-minus"></i></a>

                <a aria-label="Add To Wishlist" class="" wire:target="minus"
                    wire:click="plus('{{ $product['id'] }}','1')"><i class="fi-rs-plus"></i></a>

                <a aria-label="Remove" class="" wire:click="remove('{{ $product['id'] }}')"><i
                        wire:loading.class="snipper" class="fi-rs-trash"></i></a>
                {{ cart()::quantity($product['id']) }} عدد در سبد خرید شما

                @error('productQuantity')
                    <span class="text text-danger"> {{ $message }} </span>
                @enderror

                @error('quantity')
                    <span> {{ $message }} </span>
                @enderror

                @error('inventory')
                    <span> {{ $message }} </span>
                @enderror
            </div>
        @elseif(!$this->has($product['id']))
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
