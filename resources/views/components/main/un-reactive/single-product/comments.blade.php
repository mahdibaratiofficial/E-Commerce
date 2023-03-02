<div class="comments-area">
    <div class="row">
        <div class="col-lg-8">
            <div class="comment-list">
                <x-main.un-reactive.single-product.single-comment :comments="$comments->where('parent', 0)->where('approved',1)" />
            </div>
        </div>
        <div class="col-lg-4">
            <h4 class="mb-30">Customer reviews</h4>
            <div class="d-flex mb-30">
                <div class="product-rate d-inline-block mr-15">
                    <div class="product-rating" style="width: 90%"></div>
                </div>
                <h6>4.8 out of 5</h6>
            </div>
            <div class="progress">
                <span>5 star</span>
                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                    aria-valuemax="100">50%</div>
            </div>
            <div class="progress">
                <span>4 star</span>
                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100">25%</div>
            </div>
            <div class="progress">
                <span>3 star</span>
                <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                    aria-valuemax="100">45%</div>
            </div>
            <div class="progress">
                <span>2 star</span>
                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                    aria-valuemax="100">65%</div>
            </div>
            <div class="progress mb-30">
                <span>1 star</span>
                <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                    aria-valuemax="100">85%</div>
            </div>
            <a href="shop-product-full.html#" class="font-xs text-muted">How are ratings calculated?</a>
        </div>
    </div>
</div>

<div class="comment-form">
    <h4 class="mb-15">افزودن دیدگاه و پرسش جدید</h4>
    <div class="product-rate d-inline-block mb-30"></div>
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <livewire:main.reactive.product.submit-comments :product="serialize($comments[0]->commentable)" />
        </div>
    </div>
</div>
