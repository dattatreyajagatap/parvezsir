@extends('layouts.main_layout')

@section('main-layout')
  <main>
    <div class="row">
      <div class="col-9">
        <div class="card">
          <div class="card-body">
            <table class="table table-border">
                <tbody>
                    <tr>
                        <th>product_name</th>
                        <th>product_category</th>
                        <th>product_price</th>
                        <th>product_about</th>
                        <th>product_desc</th>
                        <th>edit</th>
                    </tr>
                </tbody>
                <tbody>
                    @foreach ($getProducts as $product)
                    <tr>
                        <td>{{ $product->product_name}}</td>
                        <td>{{ $product->product_category}}</td>
                        <td>{{ $product->product_price}}</td>
                        <td>{{ $product->product_about}}</td>
                        <td>{{ $product->product_desc}}</td>
                        <td>
                            <a href="{{url('/product/delete')}}/{{$product->product_id}}" class="btn btn-danger">delete</a>
                            <a href="{{route('product.edit', ['id'=>$product->product_id])}}" class="btn btn-primary">edit</a>
                        </td>
                    </tr>                        
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
  