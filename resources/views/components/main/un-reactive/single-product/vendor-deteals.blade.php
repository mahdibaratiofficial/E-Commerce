<div class="vendor-logo d-flex mb-30">
    <img loading="lazy" src="assets/imgs/vendor/vendor-18.svg" alt="" />
    <div class="vendor-name ml-15">
        <h6>
            <a href="vendor-details-2.html">{{ $vendor->vendor_name }}</a>
        </h6>
        <div class="product-rate-cover text-end">
            <div class="product-rate d-inline-block">
                <div class="product-rating" style="width: 90%"></div>
            </div>
            <span class="font-small ml-5 text-muted"> (32 reviews)</span>
        </div>
    </div>
</div>
<ul class="contact-infor mb-50">
    <li><img loading="lazy" src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong class="shabnam">آدرس: </strong>
        <span>{{ $vendor->address }}</span>
    </li>
    <li><img loading="lazy" src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong class="shabnam">شماره
            تلفن:</strong><span>{{ $vendor->phone }}</span></li>
</ul>
<div class="d-flex mb-55">
    <div class="mr-30">
        <p class="text-brand font-xs">Rating</p>
        <h4 class="mb-0">92%</h4>
    </div>
    <div class="mr-30">
        <p class="text-brand font-xs">Ship on time</p>
        <h4 class="mb-0">100%</h4>
    </div>
    <div>
        <p class="text-brand font-xs">Chat response</p>
        <h4 class="mb-0">89%</h4>
    </div>
</div>
<p>{{ $vendor->presentation }}</p>
