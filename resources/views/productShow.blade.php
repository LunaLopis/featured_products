@extends('layouts.app')

@section('content')
<a href="{{asset("product")}}" class="btn btn-primary">Torna alla lista</a>
<div class="wrapper d-flex justify-content-center align-items-center">

    
    <div class="card " style="width: 18rem;">
        <img src="{{ $product->image }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <h5 class="text-dark">{!! $product->category->name !!}</h5>
            <p class="card-text ">
                {{ $product->description }}
                
            </p>
        </div>
    </div>
</div>
    @endsection