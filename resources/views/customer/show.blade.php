@extends('layouts.master')

@section('title', 'CUSTOMER | ')
@section('content')
    @include('partials.header')
    @include('partials.sidebar')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i>Customer</h1>
                <p>Individual Customer Details</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Customer</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <section class="invoice">
                        <div class="row mb-4">
                            <div class="col-6">
                                <h2 class="page-header"><i class="fa fa-globe"></i> Customer Details</h2>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">


                                <table class="table table-striped">
                                    <tbody>
                                      <tr>
                                        <th>Customer Name</th>
                                        <td>{{$customers->name}}</td>
                                      </tr>
                                      <tr>
                                        <th>Customers Mobile Number</th>
                                        <td>{{$customers->mobile}}</td>
                                      </tr>
                                      <tr>
                                        <th>Customer Address</th>
                                        <td>{{$customers->address}}</td>
                                      </tr>
                                      <tr>
                                        <th>Customer Details</th>
                                        <td>{{$customers->details}}</td>
                                      </tr>

                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right"><a class="btn btn-primary" href="{{route('customer.index')}}" target=""><i class="fa fa-arrow-left"></i> Back</a></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>

@endsection
@push('js')
@endpush






