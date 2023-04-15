<form wire:submit.prevent="submit(Object.fromEntries(new FormData($event.target)))" id="attrForm">
    <div class="row">

        <div class="col-12 d-flex">

            <input type="text" id="name" class="form-control col-4 rounded" name="name" placeholder="نام ویژگی">
            <input type="text" id="value" class="form-control col-6 rounded" name="value"
                placeholder="مقدار ویژگی">

            <button type="submit" class="btn btn-sm col-2 btn-primary">
                <div wire:loading.remove>
                    اضافه
                </div>

                <div wire:loading>
                    <div class="spinner-border spinner-border-sm text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </button>
            
            @error('attribute')
                <span class="text text-danger"> {{ $message }} </span>
            @enderror
        </div>
    </div>
</form>

<script>
    document.querySelector('#attrForm').addEventListener('submit', function() {

    });
</script>
