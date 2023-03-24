<div class="container-fluid" id="info">
    <div class="row">
        <div class="col-12 mb-5">
            <div class="row">
                <div class="col-5 d-flex">
                    <h3> اضافه کردن محصول جدید </h3>
                    <span class="mdi mdi-grease-pencil m-2"></span>
                </div>
            </div>

            <form wire:submit.prevent="createProduct">
                <div class="row">
                    <div class="col-6 m-1">
                        <div class="row">
                            <label for="name-desc">
                                <h4> نام و توضیحات محصول </h4>
                            </label>
                            <div class=" col-12 p-3 mb-5  border rounded " id="name-desc">
                                <div class="col-12 mb-3">
                                    <input class="form-control rounded" placeholder="نام محصول"
                                        wire:model.defer="product.title" />

                                    @error('product.title')
                                        <span class="text text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>


                                <div class="col-12" wire:ignore>
                                    <textarea id="description" name="description" wire:model.defer="description">
                                        {{ $description }}
                                    </textarea>
                                </div>
                            </div>

                            <label for="name-desc">
                                <h4> دسته بندی </h4>
                            </label>
                            <div class=" col-12 p-3 mb-5 border rounded" id="name-desc">
                                <div class="col-12">
                                    <select class="form-control  rounded" wire:model.defer="product.vendor">
                                        @foreach (\App\Models\Vendor::select(['id', 'vendor_name'])->get() as $vendor)
                                            <option value="{{ $vendor->id }}" selected>{{ $vendor->vendor_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <label for="name-desc">
                                <h4> قیمت و موجودی </h4>
                            </label>
                            <div class=" col-12 p-3 mb-5 border rounded" id="name-desc">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <input id="price" class="form-control rounded" placeholder="قیمت "
                                            wire:model.defer="product.price" />
                                        <label for="price" class="m-1"> تومان </label>


                                        @error('product.quantity')
                                            <span class="text text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="col-6 d-flex align-items-center">
                                        <input class="form-control rounded" wire:model.defer="product.quantity"
                                            placeholder="موجودی" />
                                        <label for="price" class="m-1"> عدد </label>

                                        @error('product.quantity')
                                            <span class="text text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <label for="name-desc">
                                <h4> فروشنده </h4>
                            </label>
                            <div class=" col-12 p-3 mb-5 border rounded" id="name-desc">
                                <div class="col-12">
                                    <select class="form-control  rounded" wire:model.defer="product.vendor">
                                        @foreach (\App\Models\Vendor::select(['id', 'vendor_name'])->get() as $vendor)
                                            <option value="{{ $vendor->id }}" selected>{{ $vendor->vendor_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                            <div class="10">
                                <button type="submit" class="btn btn-primary"> منتشر کردن محصول </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-5 m-1">
                        <div class="row">
                            <label for="images">
                                <h4> عکس ها </h4>
                            </label>
                            <div class="col-12 border rounded" style="height:200px" id="images">

                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-12">

                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <div class="input-group" style="direction:ltr">
                                            <input type="text" id="image_label" class="form-control" name="image"
                                                aria-label="Image" aria-describedby="button-image">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="button"
                                                    id="button-image">انتخاب</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>

<script src="{{ asset('assets/admin/vendors/ckeditor/ckeditor.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });
    });

    // set file link
    function fmSetLink($url) {
        document.getElementById('image_label').value = $url;
    }


    // ClassicEditor.replace('description', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
    ClassicEditor
        .create(document.querySelector('#description'))

        .then(editor => {

            editor.model.document.on('change:data', () => {

                @this.set('description', editor.getData());

            })

        })

        .catch(error => {

            console.error(error);

        });

</script>
