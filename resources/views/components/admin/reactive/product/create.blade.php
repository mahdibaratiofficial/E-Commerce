<div class="container-fluid" id="info">
    <div class="row">
        <div class="col-12 mb-5">
            <div class="row">
                <div class="col-5 d-flex">
                    <h3> اضافه کردن محصول جدید </h3>
                    <span class="mdi mdi-grease-pencil m-2"></span>
                </div>
            </div>

            <div class="row">
                <div class="col-6 m-1">
                    <form wire:submit.prevent="createProduct" id="productForm">

                        <div class="row">
                            <label for="name-desc">
                                <h4> نام و توضیحات محصول </h4>
                            </label>
                            <div class=" col-12 p-3 mb-5  border rounded " id="name-desc">
                                <div class="col-12 mb-3">
                                    <input class="form-control rounded" placeholder="نام محصول"
                                        wire:model.defer="product.title" value="{{ $product['title'] ?? '' }}" />

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
                                    <select class="form-control  rounded" wire:model.defer="product.category"
                                        id="categories">
                                        @foreach (\App\Models\Category::select(['id', 'title'])->get() as $category)
                                            <option value="{{ $category->id }}"
                                                wire:click="$set('product.category',$event.target.value)"
                                                :key="{{ $category->id }}">{{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('product.category')
                                        <span class="text text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>


                            <label for="name-desc">
                                <h4> قیمت و موجودی </h4>
                            </label>
                            <div class=" col-12 p-3 mb-5 border rounded" id="name-desc">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <input id="price" class="form-control rounded" placeholder="قیمت "
                                            wire:model.defer="product.price" value="{{ $product['price'] ?? '' }}" />
                                        <label for="price" class="m-1"> تومان </label>


                                        @error('product.quantity')
                                            <span class="text text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="col-6 d-flex align-items-center">
                                        <input class="form-control rounded" wire:model.defer="product.quantity"
                                            placeholder="موجودی" value="{{ $product['quantity'] ?? '' }}" />
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
                                    <select class="form-control  rounded" id="categories">
                                        @foreach (\App\Models\Vendor::select(['id', 'vendor_name'])->get() as $vendor)
                                            <option value="{{ $vendor->id }}"
                                                wire:click="$set('product.vendor_id',$event.target.value)"
                                                :key="{{ $vendor->id }}">{{ $vendor->vendor_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('product.vendor_id')
                                        <span class="text text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="10">
                                <button type="submit" class="btn btn-primary"> منتشر کردن محصول </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-5 m-1">

                    <div class="row">
                        <div class="col-12">
                        </div>
                    </div>
                    <div class="row">


                        <label for="images">
                            <h4> ویژگی های محصول </h4>
                        </label>
                        <div class="col-12 border rounded mb-3"id="images">

                            <div class="row d-flex justify-content-center align-items-center" style="overflow:hidden">

                                <div class="col-12 rounded m-2" wire:ignore>
                                    <livewire:admin.reactive.product.attribute-component />
                                </div>

                                <div class="col-12 d-flex m-2">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        @if ($attribute)
                                            @foreach ($attribute as $attr)
                                                <div class="col-6 p-3">
                                                    <span class=" ">
                                                        <div
                                                            class="row d-flex justify-content-center align-items-center btn">
                                                            <div class="col-2">
                                                                <button type="button"
                                                                    wire:click="removeAttrubute('{{ $attr['name'] }}')"
                                                                    class=" btn btn-light btn-rounded btn-icon">
                                                                    <i class="mdi mdi-md mdi-close-circle-outline"
                                                                        style="width: 100%"></i>
                                                                </button>
                                                            </div>

                                                            <div class="col-10 p-2">
                                                                {{ '"' . $attr['name'] . '"' . ':' . $attr['value'] }}
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>



                        <label for="images">
                            <h4> عکس ها </h4>
                        </label>
                        <div class="col-12 border rounded"id="images">

                            <div class="row d-flex justify-content-center align-items-center" style="overflow:hidden">

                                <div class="col-12 rounded m-2" wire:ignore>
                                    <livewire:admin.reactive.image.upload-image />
                                </div>

                                <div class="col-12 d-flex m-2">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        @if ($images)
                                            @foreach ($images as $image)
                                                <div class="col-5 m-1">

                                                    <button type="button"
                                                        wire:click="removePicture('{{ $image }}')"
                                                        class="btn btn-light btn-rounded btn-icon"
                                                        style="position: relative;top:50px;left:-10px">
                                                        <i class="mdi mdi-md mdi-close-circle-outline"
                                                            style="width: 100%"></i>
                                                    </button>

                                                    <img loading="lazy" src="{{ $image }}" width="200px"
                                                        style="border-radius:20px" />
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@section('scripts')
    <script>
        $('#categories').select2({
            'placeholder': 'دسترسی مورد نظر را انتخاب کنید'
        });

        $('#vendor').select2({
            'placeholder': 'فروشنده مورد نظر را انتخاب کنید'
        });
    </script>
@endsection

<script src="{{ asset('assets/admin/vendors/ckeditor/build/ckeditor.js') }}"></script>
<script>
    var text;
    ClassicEditor
        .create(document.querySelector('#description'))

        .then(editor => {
            document.querySelector('#productForm').addEventListener('submit', function() {
                @this.set('description', editor.getData());
            });
        })

        .catch(error => {
            console.error(error);
        });
</script>
