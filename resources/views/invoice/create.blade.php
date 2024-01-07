@extends('layouts.master')

@section('title', 'Invoice | ')
@section('content')
    @include('partials.header')
    @include('partials.sidebar')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Create Invoice</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Invoices</li>
                <li class="breadcrumb-item"><a href="#">Create</a></li>
            </ul>
        </div>
        <div class="">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Add Product
              </button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter">
                Add Customer
              </button>
              <a class="btn btn-primary" href="{{route('invoice.index')}}"><i class="fa fa-edit"></i> Manage Invoice</a>
        </div>

         <div class="row mt-2">
             <div class="clearix"></div>
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Invoice</h3>
                    <div class="tile-body">
                        <form  method="POST" action="{{route('invoice.store')}}">
                            @csrf

                                  <div class="row">

                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Customer Name</label>
                                            <select name="customer_id" class="form-control">
                                                <option>Select Customer</option>
                                                @foreach($customers as $customer)
                                                    <option name="customer_id" value="{{$customer->id}}">{{$customer->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Start Date</label>
                                            <input name="start_date"  class="form-control datepicker"  value="<?php echo date('Y-m-d')?>" type="date" >
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Invoice Number</label>
                                            <input name="inv_number"  class="form-control"  value="{{ $invoices->inv_number + 1 }}" type="text" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Due Date</label>
                                            <input name="due_date"  class="form-control datepicker"  value="<?php echo date('Y-m-d')?>" type="date">
                                        </div>

                                    </div>
                                  </div>




                                  <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">No.Of Days</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Service Charge 5%</th>
                                        <th scope="col">Tax 15%</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col"><a class="addRow badge badge-success text-white"><i class="fa fa-plus"></i> Add Row</a></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><select name="product_id[]" class="form-control productname" >
                                                <option>Select Product</option>
                                            @foreach($products as $product)
                                                    <option name="product_id[]" value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select></td>
                                        <td><input type="text" name="qty[]" class="form-control qty" ></td>
                                        <td><input type="text" name="price[]" class="form-control price" ></td>
                                        <td><input type="text" name="service[]" class="form-control service" ></td>
                                        <td><input type="text" name="tax[]" class="form-control tax" ></td>
                                        <td><input type="text" name="amount[]" class="form-control amount" ></td>
                                        <td><a   class="btn btn-danger remove"> <i class="fa fa-remove"></i></a></td>
                                     </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="table-success"><b>Sub Total:</b></td>
                                        <td class="table-success"><b class="total"></b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="table-success"><b>Discount:</b></td>
                                        <td class="table-success"><input name="dis"  class="form-control"  value="" type="text" ></b></td>
                                        <td></td>
                                    </tr>


                                    </tfoot>

                                </table>

                                    <div class="form-group col-md-4 align-self-end">
                                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                            </div>
                             </form>
                            </div>
                        </div>


                        </div>
                    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="bank-inner-details">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Product Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Product Code</label>
                            <input name="code" class="form-control @error('code') is-invalid @enderror" type="text" placeholder="Enter Product Code">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Product Price</label>
                            <input name="price" class="form-control @error('price') is-invalid @enderror" type="text" placeholder="Enter Model">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  {{-- ----------------- --}}

  <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"> Add Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('customer.store')}}">
            @csrf
        <div class="modal-body">
            <div class="bank-inner-details">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter Customer's Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Customer Contact</label>
                            <input name="mobile" class="form-control @error('mobile') is-invalid @enderror" type="text" placeholder="Enter Contact Number">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Customer Address</label>
                            <input name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Customer Address">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Customer Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Customer Email">
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Customer Details</label>
                            <input name="details" class="form-control @error('details') is-invalid @enderror" placeholder="details">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>





            </main>

        @endsection
        @push('js')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
             <script src="{{asset('/')}}js/multifield/jquery.multifield.min.js"></script>




            <script type="text/javascript">
                $(document).ready(function(){



                    $('tbody').delegate('.productname', 'change', function () {

                        var  tr = $(this).parent().parent();
                        tr.find('.qty').focus();

                    })

                    $('tbody').delegate('.productname', 'change', function () {

                        var tr =$(this).parent().parent();
                        var id = tr.find('.productname').val();
                        var dataId = {'id':id};
                        $.ajax({
                            type    : 'GET',
                            url     :'{!! URL::route('findPrice') !!}',

                            dataType: 'json',
                            data: {"_token": $('meta[name="csrf-token"]').attr('content'), 'id':id},
                            success:function (data) {
                                tr.find('.price').val(data.price);
                            }
                        });
                    });

                    $('tbody').delegate('.qty,.price,.service,.tax', 'keyup', function () {

                        var tr = $(this).parent().parent();
                        var qty = tr.find('.qty').val();
                        var price = tr.find('.price').val();
                        var service = tr.find('.service').val();
                        var tax = tr.find('.tax').val();
                        var value = qty * price;
                        var service = (value * service)/100;
                        var tax = (value + service) * tax/100;
                        var amount = (value + service + tax);
                        tr.find('.amount').val(amount);
                        total();
                    });
                    function total(){
                        var total = 0;
                        $('.amount').each(function (i,e) {
                            var amount =$(this).val()-0;
                            total += amount;
                        })
                        $('.total').html(total);
                    }


                    $('.addRow').on('click', function () {
                        addRow();

                    });



                    function addRow() {
                        var addRow = '<tr>\n' +
                            '         <td><select name="product_id[]" class="form-control productname " >\n' +
                            '         <option value="0" selected="true" disabled="true">Select Product</option>\n' +
        '                                        @foreach($products as $product)\n' +
        '                                            <option value="{{$product->id}}">{{$product->name}}</option>\n' +
        '                                        @endforeach\n' +
                            '               </select></td>\n' +
        '                                <td><input type="text" name="qty[]" class="form-control qty" ></td>\n' +
        '                                <td><input type="text" name="price[]" class="form-control price" ></td>\n' +
        '                                <td><input type="text" name="service[]" class="form-control service" ></td>\n' +
        '                                <td><input type="text" name="tax[]" class="form-control tax" ></td>\n' +
        '                                <td><input type="text" name="amount[]" class="form-control amount" ></td>\n' +
        '                                <td><a   class="btn btn-danger remove"> <i class="fa fa-remove"></i></a></td>\n' +
        '                             </tr>';
                        $('tbody').append(addRow);
                    };


                    $('.remove').live('click', function () {
                        var l =$('tbody tr').length;
                        if(l==1){
                            alert('you cant delete last one')
                        }else{

                            $(this).parent().parent().remove();

                        }

                    });
                });


            </script>


@endpush



