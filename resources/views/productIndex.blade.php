@extends('layouts.app')
@section('content')

    <div class="container">
        {{$products->links('pagination::bootstrap-5')}}
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-4">
            @foreach ($products as $product)
            
                <div class="card " style="width: 18rem;">
                    <img src="{{ $product->image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h5 class="text-dark">{!! $product->category->name !!}</h5>
                        <p class="card-text ">
                            {{ $product->getAbstract() }}
                            
                           
                        </p>
                        <a href="{{asset("product/$product->id")}}" class="btn btn-primary">dettaglio</a>
                    </div>
                </div>
            @endforeach
        </div>
        {{$products->links('pagination::bootstrap-5')}}

    </div>
@endsection