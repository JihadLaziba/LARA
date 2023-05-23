@extends('layout')
@section('content')
<div class="row">
    <form method="GET" action="{{ route('produits.filtrerParNom') }}" class="p-3 mb-2 bg-light text-dark">
        <input type="text" name="name"  placeholder="Product Name...">
        <button type="submit" class="btn btn-info">Filter By Name</button>


        <label for="min-price">Min Price:</label>
        <input type="number" id="min-price" name="min_price" value="{{ request()->input('min_price') }}">
        <label for="max-price">Max Price:</label>
        <input type="number" id="max-price" name="max_price" value="{{ request()->input('max_price') }}">
         <button type="submit"  class="btn btn-info">Filter By Price</button>
</form>
    @foreach($produits as $produit)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{asset('/products/'.$produit->image)}}" alt="" style="width: 90px;height:100px">
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
