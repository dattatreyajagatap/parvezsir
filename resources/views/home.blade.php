@extends('layouts.main_layout')

@section('main-layout')
  <main>
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <form action="{{$url}}" method="POST">
              @csrf
              
              <div class="mb-3">
                <label for="" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name"
                    aria-describedby="" value="{{ $product->product_name; }}">
                    <span class="text-danger">
                      @error('product_name')
                        {{$message}}
                      @enderror
                    </span>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Product category</label>
                <select class="form-control" name="product_category" id="product_category">
                  <option value="electronics" {{ $product->product_category == "electronics" ? "selected" :""}} >electronics</option>
                  <option value="grocesory" {{ $product->product_category == "grocesory" ? "selected" :""}}>grocesory</option>
                </select>
                <span class="text-danger">
                  @error('product_category')
                    {{$message}}
                  @enderror
                </span>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Product price</label>
                <input type="text" class="form-control" id="product_price" name="product_price"
                    aria-describedby="" value="{{$product->product_price}}">
                    <span class="text-danger">
                      @error('product_price')
                        {{$message}}
                      @enderror
                    </span>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Product about</label>
                <input type="text" class="form-control" id="product_about" name="product_about"
                    aria-describedby="" value="{{$product->product_about}}">
                    <span class="text-danger">
                      @error('product_about')
                        {{$message}}
                      @enderror
                    </span>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Product dessc</label>
                <input type="text" class="form-control" id="product_desc" name="product_desc"
                    aria-describedby="" value="{{$product->product_desc}}">
                    <span class="text-danger">
                      @error('product_desc')
                        {{$message}}
                      @enderror
                    </span>
              </div>
              <div class="mb-3">
                <input type="submit" name="submit" id="submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
  