@extends('layouts.master')

@section('title', 'INVOICE | ')
@section('content')
    @include('partials.header')
    @include('partials.sidebar')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
                <p>A Printable Invoice Format</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Invoice</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <section class="invoice">
                        <div class="row mb-4">
                            <div class="col-6">
                                <br>
                                <br>
                                <br>
                                <img width="400 px" class="app-sidebar__user-avatar" src="{{ asset('assets/images/user/logo.png') }}" >

                            </div>
                            <div class="col-6">
                                <br>
                                <br>
                                <br>
                                <h5 class="text-right">Date: {{$invoice->created_at}}</h5>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="row invoice-info">


                            <div class="col-4">From
                                <address><strong>SUNDARBAN &nbsp;HOTEL</strong><br>Phone:01716400858<br>Address:<br>112 Bir Uttam CR Dutta Road. Dhaka-1205.
                            </div>
                            <div class="col-4">To
                                 <address><strong>{{$invoice->customer->name}}</strong><br>{{$invoice->customer->address}}<br>Phone: {{$invoice->customer->mobile}}<br>Email: {{$invoice->customer->email}}</address>
                             </div>
                            <div class="col-4"><b>INV:{{$invoice->inv_number}}</b><br><br><b>Cerated at:&nbsp;</b>{{ Carbon\Carbon::parse($invoice->created_at)}}<br><b>Start Date:&nbsp;</b> {{ Carbon\Carbon::parse($invoice->start_date)}}<br><b>Due Date: &nbsp;</b>{{ Carbon\Carbon::parse($invoice->due_date) }} </div>
                        </div>

                        <br>
                        <br>
                        <br>
                        <div class="row">

                            <div class="col-12 table-responsive">
                                <table class="table table-striped text-center align-middle" >
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>No. of Days</th>
                                        <th>Price</th>
                                        <th>Service Chage 5%</th>
                                        <th>tax 15%</th>
                                        <th>Amount</th>
                                     </tr>
                                    </thead>
                                    <tbody>
                                    <div style="display: none">
                                        {{$total=0}}
                                    </div>
                                    @foreach($sales as $sale)
                                    <tr>
                                        <td>{{$sale->product->name}}</td>
                                        <td>{{$sale->qty}}</td>
                                        <td>{{$sale->price}}</td>
                                        <td >{{$sale->service}}</td>
                                        <td >{{$sale->tax}}</td>
                                        <td >{{$sale->amount}}</td>
                                        <div style="display: none">
                                            {{$total +=$sale->amount}}
                                        </div>
                                     </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Sub Total</b></td>
                                            <td><b class="total">{{$total}}</b></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Discount:</b></td>
                                            <td><b>{{$invoice->dis}}</b></td>

                                        </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total</b></td>
                                        <td><b class="total">{{$total-$invoice->dis}}</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Amount in Word: {{ $amountInWords = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($total-$invoice->dis)) }}&nbsp; BDT. Only.  </b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="container ">
                                <img width="400 px" class="app-sidebar__user-avatar float-right " src="{{ asset('assets/images/user/paid.png') }}" >
                                <br><br><br><br>
                                <img width="400 px" class="app-sidebar__user-avatar float-left " src="{{ asset('assets/images/user/signeture.png') }}" >
                            </div>

                        </div>



                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:void(0);" onclick="printInvoice();"><i class="fa fa-print"></i> Print</a></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>


    <script>
    function printInvoice() {
        window.print();
    }
    </script>

@endsection
@push('js')
@endpush





