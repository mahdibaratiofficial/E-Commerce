@extends('layouts.admin.app')



@section('content')
    {{-- {{ dd() }} --}}
    <div class="card p-4 shadow-sm">
        <table class="table table-hover rounded">
            <thead>
                <tr style="font-weight:700">
                    <td>
                        نام کاربری 
                    </td>

                    <td>
                        سِمت
                    </td>

                    <td>
                        فروشنده
                    </td>

                    <td>
                        قیمت
                    </td>

                    <td>

                    </td>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr class="m-5">
                        <td> {{ $product->title }} </td>
                        <td> {{ $product->vendor->vendor_name }} </td>
                        <td> {{ $product->quantity }} </td>
                        <td> {{ $product->price }} </td>
                        <td> <span class="badge badge-sm badge-danger"> حذف </span> <span
                                class="badge badge-sm badge-primary"> ویرایش </span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-items-center m-5">
            <nav aria-label="Page navigation " style="direction: ltr;text-align:center">
                <ul class="pagination shadow-lg border-0">
                    <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}">قبلی</a></li>
                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <li class="page-item {{ $_GET['page'] == $i ? 'active' : '' }}"><a class="page-link"
                                href="?page={{ $i }}">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}">بعدی</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
