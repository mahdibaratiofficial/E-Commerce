<table class="table table-wishlist">
    <thead>
        <tr class="main-heading">
            <th class="custome-checkbox start pl-30">
                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                <label class="form-check-label" for="exampleCheckbox11"></label>
            </th>
            <th scope="col" colspan="2">محصولات</th>
            <th scope="col">قیمت محصول</th>
            <th scope="col">تعداد</th>
            <th scope="col">قیمت پس از تخفیف</th>
            <th scope="col" class="end">حذف</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carts as $key => $cart)
            <tr wire:key="{{ $key }}">
                <td class="custome-checkbox pl-30">
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2"
                        value="">
                    <label class="form-check-label" for="exampleCheckbox2"></label>
                </td>
                <td class="image product-thumbnail"><img src="assets/imgs/shop/product-2-1.jpg" alt="#"></td>
                <td class="product-des product-name">
                    <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">
                            {{ $cart['title'] }}</a></h6>
                    <div class="product-rate-cover">
                        <div class="product-rate d-inline-block">
                            <div class="product-rating" style="width:90%">
                            </div>
                        </div>
                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                    </div>
                </td>
                <td class="price" data-title="Price">
                    <h4 class="text-body">${{ $cart['price'] }} </h4>
                </td>
                <td class="text-center detail-info" data-title="Stock">
                    <h5> {{ $cart['quantity'] }} </h5>
                </td>
                <td class="price" data-title="Price">
                    <h4 class="text-body">${{ $cart['price'] }} </h4>
                </td>
                <td class="action text-center">
                    {{-- Make it Later --}}
                    <button class="button action-btn hover-up" wire:click="remove('{{ $key }}')">
                        <div wire:loading.remove>
                            <i class="fi-rs-trash"></i>
                        </div>

                        <div wire:loading>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </div>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
