@foreach ($comments as $comment)
    <div class=" mb-4">
        <div class="card-login">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center mb-2">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp" alt="avatar" width="55"
                        height="55" style="border-radius:50%" />
                    <p class="small mb-0 ms-2">{{ safePrint(@$comment->user->name,'بدون نام') }}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="small text-muted mb-0">like {{ $comment->dislike }}</p>
                    <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                    <p class="small text-muted mb-0">dislike {{ $comment->like }}</p>
                </div>
            </div>
            <p>{{ $comment->body }}</p>

            <div class="d-flex justify-content-between align-items-center">
                <a class="" data-bs-toggle="collapse" href="#replayComment-{{ $comment->id }}" role="button" aria-expanded="false"
                    aria-controls="replayComment-{{ $comment->id }}">
                     پاسخ 
                </a>
                <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                <a class="" data-bs-toggle="collapse" href="#collapseExample-{{ $comment->id }}" role="button" aria-expanded="false"
                    aria-controls="collapseExample-{{ $comment->id }}">
                    مشاهده پاسخ ها{{ "(".count($comment->childs).")" }}
                </a>
            </div>

            <div class="collapse" id="collapseExample-{{ $comment->id }}">
                <x-main.un-reactive.single-product.single-comment :comments="$comment->childs" />
            </div>


            <div class="collapse mt-2" id="replayComment-{{ $comment->id }}">

                <livewire:main.reactive.product.submit-comments :product="serialize($comment->commentable)" :parent="$comment->id" />
            </div>
        </div>
    </div>
@endforeach
