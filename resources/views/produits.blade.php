@extends('layout')
@section('content')
<div class="row">
    @foreach($produits as $produit)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{asset('public/products/'.$produit->image)}}" alt="" style="width: 90px;height:100px">
                <div class="caption">
                    <h4>{{ $produit->name }}</h4>
                    <p>{{ $produit->description }}</p>
                    <p><strong>Price: </strong> {{ $produit->price }}$</p>
                    <p class="btn-holder"><a href="{{ route('add.to.cart', $produit->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
