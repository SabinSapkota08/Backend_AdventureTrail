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

                               

                                <div class="card-tools">
                                    <form class="input-group input-group-sm" style="width: 150px;">
                                        <!-- <input type="text"  name="search_user" value="" class="form-control float-right" placeholder="Search"> -->

                                        <div class="input-group-append">
                                        <a href="{{route("adventure_package.add")}}"><button type="button" class="btn btn-default">Add</button></a>
                                            <!-- <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                                        </div>
                                        
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
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($adventure_packages as $adventure_package)
                                    <tr>
                                        <td>{{$adventure_package->id}}</td>
                                        <td>{{$adventure_package->name}}</td>
                                        <td>{{$adventure_package->quantity}}</td>
                                        <td>{{$adventure_package->created_at}}</td>
                                        <td>{{$adventure_package->updated_at}}</td>
                                        <td><img src="{{url($adventure_package->image)}}" height="50" width="50"/></td>
                                        <td>{{$adventure_package->price}}</td>
                                        
                                            <td>
                                                <div class="btn-group">

                                                    <a href="{{route("adventure_package.edit",$adventure_package->id)}}"><button type="button" class="btn btn-default">Edit</button></a>
                                                    <a href="{{route("adventure_package.delete",$adventure_package->id)}}"><button type="button" class="btn btn-default">Delete</button></a>

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
                                    {{$adventure_packages->links()}}
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
