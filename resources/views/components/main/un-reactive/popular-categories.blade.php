<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section-title">
            <div class="title">
                <h3>دسته بندی های پر طرفدار</h3>
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows">
            </div>
        </div>
        <div class="carausel-10-columns-cover position-relative">
            <div class="carausel-10-columns" id="carausel-10-columns">
                @foreach (\App\Models\Category::all() as $category)
                    <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="\product?category={{ $category->title }}"><img loading="lazy" src="/assets/main/imgs/shop/cat-13.png"
                                    alt="" /></a>
                        </figure>
                        <h6><a href="\product?category={{ $category->title }}">{{ $category->title }}</a></h6>
                        <span></span>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
