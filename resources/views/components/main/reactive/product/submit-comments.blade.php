<div class="col-8">
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
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </div>
                    ثبت دیدگاه
                </button>
            </div>
        </form>

        @error('body')
            <span class="text text-danger"> {{ $message }} </span>
        @enderror


        @error('parent')
            <span class="text text-danger"> {{ $message }} </span>
        @enderror

        @error('product')
            <span class="text text-danger"> {{ $message }} </span>
        @enderror

        
    @endauth

    @guest
        <p> برای نظر دادن <a href="/login"> وارد </a> شوید </p>
    @endguest

</div>
