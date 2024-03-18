@extends('layouts.app')
@section('content')

    {{-- @dd($products[0]->category) --}}
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($products as $product)
                <div class="card " style="width: 18rem;">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h5>{{ $product->category->name }}</h5>
                        <p class="card-text ">
                            {{ $product->description }}
                        </p>
                        <a href="#" class="btn btn-primary">dettaglio</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection