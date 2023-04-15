@extends('layouts.admin.app')

@section('content')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
            border-radius: 0 0 10px 10px !important;

            text-align: right;
            position: relative;
        }

        input {
            box-shadow: 0 0 20px #e2dfdf;
        }

        .ck-toolbar {
            border-radius: 10px 10px 0 0 !important;
            /* border: none !important; */
        }
    </style>
    <livewire:admin.reactive.product.update :product="$product" />
@endsection
