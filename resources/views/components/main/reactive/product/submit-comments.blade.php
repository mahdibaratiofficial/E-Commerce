@auth
    <form class="form-contact comment_form" wire:submit.prevent="submitComment">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" cols="30" rows="9" placeholder="نظر خود را بنویسید"
                        wire:model.defer="body"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="button button-contactForm">
                <div wire:loading>
                    sa
                </div>
                ثبت دیدگاه
            </button>
        </div>
    </form>
    <div class="alert alert-success">saal</div>
@endauth

@guest
    <p> برای نظر دادن <a href="/login"> وارد </a> شوید </p>
@endguest
