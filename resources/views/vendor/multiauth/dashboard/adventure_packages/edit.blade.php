<?php
$title = "Adventure Package";
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


                            <form method="post" action="{{route("adventure_package.update",$adventurePackage->id)}}"  enctype="multipart/form-data">
                                @csrf
  <div class="form-group">
    <label for="adventure_package-name">Product Name</label>
    <input type="text" class="form-control" id="adventure_package-name" name="name" value="{{$adventurePackage->name}}" placeholder="Enter adventure_package name">
  </div>
  <div class="form-group">
    <label for="adventure_package-quantity">Quantity</label>
    <input type="number" class="form-control" id="adventure_package-quantity" name="quantity" value="{{$adventurePackage->quantity}}" placeholder="Enter adventure_package quantity">
  </div>
  <div class="form-group">
    <label for="adventure_package-description">Description</label>
    <textarea class="form-control" id="adventure_package-description" name="description"  rows="3" placeholder="Enter product description">
    {{$adventurePackage->description}}
    </textarea>
  </div>
  <div class="form-group">
    <label for="adventure_package-image">Image</label>
    <input type="file" class="form-control-file" id="adventure_package-image" name="image" value="{{$adventurePackage->image}}">
  </div>

  <div class="form-group">
    <label for="adventure_package-image">Description Image</label>
    <input type="file" multiple class="form-control-file" id="adventure_package-image" name="description_img[]" value="{{$adventurePackage->description_img}}">
  </div>


  <div class="form-group">
    <label for="adventure_package-price">Price</label>
    <input type="number" class="form-control" id="adventure_package-price" name="price" value="{{$adventurePackage->price}}" placeholder="Enter Price">
  </div>
  <div class="form-group">
    <label for="adventure_package-category">Category</label>
    <select class="form-control" id="adventure_package-category" name="category" value="{{$adventurePackage->category}}">
     @foreach ($category as  $cat)
     <option value="{{$cat->id}}">{{$cat->name}}</option>  
     @endforeach
  
    </select>
  </div>
  <div class="form-group">
    <label for="adventure_package-created-at">Created At</label>
    <input type="text" class="form-control" id="adventure_package-created-at" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
  </div>
  <div class="form-group">
    <label for="adventure_package-updated-at">Updated At</label>
    <input type="text" class="form-control" id="adventure_package-updated-at" name="updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
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
