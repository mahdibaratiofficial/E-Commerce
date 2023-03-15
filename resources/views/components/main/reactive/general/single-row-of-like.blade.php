<tr>
    <td class="custome-checkbox pl-30">
        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox5" value="" />
        <label class="form-check-label" for="exampleCheckbox5"></label>
    </td>
    <td class="image product-thumbnail"><img src="assets/imgs/shop/product-5-1.jpg" alt="#" /></td>
    <td class="product-des product-name">
        <h6><a class="product-name mb-10" href="shop-product-right.html"> {{ dd($like->likeable()) }} </a></h6>
        <div class="product-rate-cover">
            <div class="product-rate d-inline-block">
                <div class="product-rating" style="width: 90%"></div>
            </div>
            <span class="font-small ml-5 text-muted"> (4.0)</span>
        </div>
    </td>
    <td class="price" data-title="Price">
        <h3 class="text-brand">$3.17</h3>
    </td>
    <td class="text-center detail-info" data-title="Stock">
        <span class="stock-status in-stock mb-0"> In Stock </span>
    </td>
    <td class="text-right" data-title="Cart">
        <button class="btn btn-sm">Add to cart</button>
    </td>
    <td class="action text-center" data-title="Remove">
        <a class="text-body" wire:click="unlike"><i class="fi-rs-trash"></i></a>
    </td>
</tr>
