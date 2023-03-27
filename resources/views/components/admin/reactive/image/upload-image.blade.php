<form wire:submit.prevent="submit(Object.fromEntries(new FormData($event.target)))">
    <div class="input-group" style="direction:ltr">
        <div class="input-group-append ">

            <button type="submit" class="btn btn-outline-success rounded mr-2">

                <div wire:loading.remove>
                    ثبت
                </div>

                <div wire:loading>
                    <div class="spinner-border spinner-border-sm text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </button>
        </div>
        <input type="text" id="image_label" class="form-control" name="image" aria-label="Image"
            aria-describedby="button-image">
        <div class="input-group-append">
            <button class="btn btn-outline-primary" type="button" id="button-image">انتخاب</button>
        </div>

        @error('photo')
            <span class="text text-danger"> {{ $message }} </span>
        @enderror
    </div>
</form>
<script>
    // set file link
    function fmSetLink($url) {
        document.getElementById('image_label').value = $url;
    }

    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();

            window.open('/file-manager/fm-button', 'fm', 'width=800,height=600');
        });
    });
</script>
