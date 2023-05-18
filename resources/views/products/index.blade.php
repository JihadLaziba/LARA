@extends('products.layout')
 
@section('content')
<br>
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
               <!-- <h2>Laravel 9 CRUD Example from scratch - ItSolutionStuff.com</h2>-->
            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        
        </div>

    </div> <br> <br>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-hover">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Details</th>
            <th scope="col">price</th>
            <th width="280px" scope="col">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td scope="row">{{ ++$i }}</td>
            <td><img src="{{asset('public/products/'.$product->image)}}" alt="{{$product->name}}" style="width: 90px;height:100px"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{ $product->price }} DH</td>
            <td class="d-flex flex-row"><a href="{{route('products.show',$product->id)}}" class="btn btn-info">Show</a>
                <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{route('products.delete',$product->id)}}" method="POST">
                
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
                
        </tr>
        @endforeach
    </table>
  
    {!! $products->links() !!}
      
@endsection