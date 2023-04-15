<div class="card p-4 shadow-sm">
    <table class="table table-hover rounded">
        <thead>
            <tr style="font-weight:700">
                <td>
                    نام
                </td>

                <td>
                    فروشنده
                </td>

                <td>
                    موجودی
                </td>

                <td>
                    قیمت
                </td>

                <td>

                </td>
            </tr>
        </thead>

        <tbody wire:init="loadProducts">
            @foreach ($products as $product)
                <tr class="m-5">
                    <td> <a href="/product/{{ $product->slug }}" class="text text-dark"> {{ $product->title }} </a> </td>
                    <td> {{ $product->vendor->vendor_name ?? 'nothing' }} </td>
                    <td> {{ $product->quantity }} </td>
                    <td> {{ $product->price }} </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-danger " wire:click="delete('{{ $product->id }}')" wire:key="{{ $product->id }}"> حذف </button>
                        <a href="/admin/product/{{ $product->slug }}/edit" class="btn btn-sm btn-outline-primary " > ویرایش </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
</div>
