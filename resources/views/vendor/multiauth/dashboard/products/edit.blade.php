<?php
$title = "Product";
?>
@extends('vendor.multiauth.dashboard.layouts.app')
@section("title",$title)

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{$title}}s</h3>

                              
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" >
                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-header">


                            <form method="post" action="{{route("product.update",$product->id)}}"  enctype="multipart/form-data">
                                @csrf
  <div class="form-group">
    <label for="product-name">Product Name</label>
    <input type="text" class="form-control" id="product-name" name="name" value="{{$product->name}}" placeholder="Enter product name">
  </div>
  <div class="form-group">
    <label for="product-quantity">Quantity</label>
    <input type="number" class="form-control" id="product-quantity" name="quantity" value="{{$product->quantity}}" placeholder="Enter product quantity">
  </div>
  <div class="form-group">
    <label for="product-description">Description</label>
    <textarea class="form-control" id="product-description" name="desc"  rows="3" placeholder="Enter product description">
    {{$product->desc}}
    </textarea>
  </div>
  <div class="form-group">
    <label for="product-short-description">Short Description</label>
    <input type="text" class="form-control" id="product-short-description" name="short_description" value="{{$product->short_description}}"  placeholder="Enter product short description">
  </div>
  <div class="form-group">
    <label for="product-image">Image</label>
    <input type="file" class="form-control-file" id="product-image" name="image" value="{{$product->image}}">
  </div>
  <div class="form-group">
    <label for="product-offer-to">Offer To</label>
    <input type="date" class="form-control" id="product-offer-to" name="offer_to" value="{{$product->offer_to}}">
  </div>
  <div class="form-group">
    <label for="product-offer-from">Offer From </label>
    <input type="date" class="form-control" id="product-offer-from" name="offer_from" value="{{$product->offer_from}}">
  </div>
  <div class="form-group">
    <label for="product-offer-price">Offer Price</label>
    <input type="number" class="form-control" id="product-offer-price" name="offer_price" value="{{$product->offer_price}}" placeholder="Enter offer price">
  </div>
  <div class="form-group">
    <label for="product-mrp">MRP</label>
    <input type="number" class="form-control" id="product-mrp" name="mrp" value="{{$product->mrp}}" placeholder="Enter MRP">
  </div>
  <div class="form-group">
    <label for="product-category">Category</label>
    <select class="form-control" id="product-category" name="category" value="{{$product->category}}">
     @foreach ($category as  $cat)
     <option value="{{$cat->id}}">{{$cat->name}}</option>  
     @endforeach
  
    </select>
  </div>
  <div class="form-group">
    <label for="product-created-at">Created At</label>
    <input type="text" class="form-control" id="product-created-at" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
  </div>
  <div class="form-group">
    <label for="product-updated-at">Updated At</label>
    <input type="text" class="form-control" id="product-updated-at" name="updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
