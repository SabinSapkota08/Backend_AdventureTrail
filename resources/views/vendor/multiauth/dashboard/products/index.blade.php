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

                               

                                <div class="card-tools">
                                    <form class="input-group input-group-sm" style="width: 150px;">
                                        <!-- <input type="text"  name="search_user" value="" class="form-control float-right" placeholder="Search"> -->

                                        @permitTo('CreateProduct')
                                      <div class="input-group-append">
                                        <a href="{{route("product.add")}}"><button type="button" class="btn btn-default">Add</button></a>
                                            <!-- <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                                        </div>
                                        @endpermitTo
                                        
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Image</th>
                                        <th>Mrp</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>{{$product->updated_at}}</td>
                                        <td><img src="{{url($product->image)}}" height="50" width="50"/></td>
                                        <td>{{$product->mrp}}</td>
                                        
                                            <td>
                                                <div class="btn-group">

                                                    <a href="{{route("product.edit",$product->id)}}"><button type="button" class="btn btn-default">Edit</button></a>
                                                    <a href="{{route("product.delete",$product->id)}}"><button type="button" class="btn btn-default">Delete</button></a>

                                                </div>
                                            </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-header">


                                <div class="card-tools">
                                    {{$products->links()}}
                                </div>
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
