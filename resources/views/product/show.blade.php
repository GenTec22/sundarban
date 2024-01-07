@extends('layouts.master')

@section('title', 'PRODUCT | ')
@section('content')
    @include('partials.header')
    @include('partials.sidebar')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i>Product</h1>
                <p>Individual Product Details</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Product</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <section class="invoice">
                        <div class="row mb-4">
                            <div class="col-6">
                                <h2 class="page-header"><i class="fa fa-globe"></i> Product Details</h2>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">


                                <table class="table table-striped">
                                    <tbody>
                                      <tr>
                                        <th>Product Name</th>
                                        <td>{{$productsshow->name}}</td>
                                      </tr>
                                      <tr>
                                        <th>Product Code</th>
                                        <td>{{$productsshow->code}}</td>
                                      </tr>
                                      <tr>
                                        <th>Product Price</th>
                                        <td>{{$productsshow->price}}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right"><a class="btn btn-primary" href="{{route('product.index')}}" target=""><i class="fa fa-arrow-left"></i> Back</a></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>

@endsection
@push('js')
@endpush






