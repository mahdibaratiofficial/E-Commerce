<div class="detail-extralink mb-50">
    <div class="product-extra-link2 d-flex">

        @if ($status)
            <div class="card-login p-2 d-flex align-items-center">

                <a aria-label="اضافه" class="" wire:target="minus" wire:click="minus('{{ $product['id'] }}')"><i
                        class="fi-rs-minus"></i></a>

                <a aria-label="Add To Wishlist" class="" wire:target="plus"
                    wire:click="plus('{{ $product['id'] }}','1')"><i class="fi-rs-plus"></i></a>

                <a aria-label="Remove" class="" wire:click="remove('{{ $product['id'] }}')" wire:target="remove">
                    <div wire:loading.remove wire:target="remove">
                        <i class="fi-rs-trash"></i>
                    </div>

                    <div wire:loading wire:target="remove">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </div>
                </a>

                <div wire:loading.remove style="width:50%" wire:target="plus,minus">
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

                <div wire:loading wire:target='plus,minus' style="width:50%" class="text-center">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>

            </div>
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
            <a aria-label="پسندیدن" class="action-btn hover-up" title="پسندیدن"
                wire:click="likeit('{{ $product['id'] }}')"  >

                <div wire:loading.remove wire:target="likeit">
                    @if ($product->isLiked())
                        <i class="fi-rs-shuffle"></i><span class="text-muted"> {{ $product->allLikes() }} </span>
                    @else
                        <i class="fi-rs-heart"></i><span class="text-muted"> {{ $product->allLikes() }} </span>
                    @endif
                </div>

                <div wire:loading wire:target="likeit">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
            </a>
            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i
                    class="fi-rs-shuffle"></i></a>
        </div>
    </div>
</div>
