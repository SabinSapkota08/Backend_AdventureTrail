<?php
$title = "Adventure Ticket";
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


                            <form method="post" action="{{route("adventure_ticket.store")}}"  enctype="multipart/form-data">
                                @csrf
  <div class="form-group">
    <label for="adventure_ticket-name">Ticket Name</label>
    <input type="text" class="form-control" id="adventure_ticket-name" name="name" placeholder="Enter adventure_ticket name">
  </div>
  <div class="form-group">
    <label for="adventure_ticket-quantity">Quantity</label>
    <input type="number" class="form-control" id="adventure_ticket-quantity" name="quantity" placeholder="Enter adventure_ticket quantity">
  </div>
  <div class="form-group">
    <label for="adventure_ticket-description">Description</label>
    <textarea class="form-control" id="adventure_ticket-description" name="description" rows="3" placeholder="Enter adventure_ticket description"></textarea>
  </div>

  <div class="form-group">
    <label for="adventure_ticket-image">Image</label>
    <input type="file" class="form-control-file" id="adventure_ticket-image" name="image">
  </div>

  <div class="form-group">
    <label for="adventure_ticket-image">Description Image</label>
    <input type="file" multiple class="form-control-file" id="adventure_ticket-image" name="description_img[]">
  </div>
 
  <div class="form-group">
    <label for="adventure_ticket-price">Price</label>
    <input type="number" class="form-control" id="adventure_ticket-price" name="price" placeholder="Enter Price">
  </div>
  <div class="form-group">
    <label for="adventure_ticket-category">Category</label>
    <select class="form-control" id="adventure_ticket-category" name="category">
     @foreach ($category as  $cat)
     <option value="{{$cat->id}}">{{$cat->name}}</option>  
     @endforeach
  
    </select>
  </div>
  <div class="form-group">
    <label for="adventure_ticket-created-at">Created At</label>
    <input type="text" class="form-control" id="adventure_ticket-created-at" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
  </div>
  <div class="form-group">
    <label for="adventure_ticket-updated-at">Updated At</label>
    <input type="text" class="form-control" id="adventure_ticket-updated-at" name="updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
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
