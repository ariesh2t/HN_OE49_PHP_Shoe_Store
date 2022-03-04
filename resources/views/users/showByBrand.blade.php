@extends('layouts.app')

@section('title')
    {{ $brand->name }}
@endsection

@section('content')
@if ($products->isEmpty())
    <h2 class="text-center">{{ __('product empty') }}</h2>
@endif
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @foreach ($products as $product)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <div class="card-image">
                        <a href="{{ route('shop.detail', $product->id) }}">
                            <img class="card-img-top" src="{{ asset('images/products/' . $product->images->first()->name) }}">
                        </a>
                    </div>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $product->name }}</h5>
                            <!-- Product review -->
                            <!-- Product price-->
                            {{ @money($product->price) }}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('cart.add', $product->id) }}">{{ __('add to cart') }}</a></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="text-center">
    {!! $products->appends(request()->all())->links() !!}
</div>
@endsection
