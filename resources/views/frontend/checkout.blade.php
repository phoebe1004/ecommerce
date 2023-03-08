@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('/')}}">
                    Home
                </a> /
                <a href="{{url('checkout')}}">
                    Checkout
                 </a>
            </h6>
        </div>
    </div>

    <div class="container mt-3">
        <form action="{{    url('place-order')  }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" value="{{Auth::user()->name}}" required class="form-control firstname" name="fname" placeholder="Input first name">
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" value="{{Auth::user()->lname}}" required class="form-control lastname" name="lname" placeholder="Input last name">
                                <span id="lname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" required class="form-control email" value="{{Auth::user()->email}}" name="email" placeholder="Input email">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone number</label>
                                <input type="text" required class="form-control phone" value="{{Auth::user()->phone}}" name="phone" placeholder="Input phone number">
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" required class="form-control address1" value="{{Auth::user()->address1}}" name="address1" placeholder="Input Address 1">
                                <span id="address1_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" required class="form-control address2" value="{{Auth::user()->address2}}" name="address2" placeholder="Input Address 2">
                                <span id="address2_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" required class="form-control city" value="{{Auth::user()->city}}" name="city" placeholder="Input City">
                                <span id="city_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" required class="form-control state" value="{{Auth::user()->state}}" name="state" placeholder="Input State">
                                <span id="state_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                                <input type="text" required class="form-control country" value="{{Auth::user()->country}}" name="country" placeholder="Input Country">
                                <span id="country_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pin Code</label>
                                <input type="text" required class="form-control pincode" value="{{Auth::user()->pincode}}" name="pincode" placeholder="Input Pin Code">
                                <span id="pincode_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartitems as $item)
                                <tr>
                                    <td>{{$item->products->name}}</td>
                                    <td>{{$item->prod_qty}}</td>
                                    <td>{{$item->products->selling_price}}</td>
                                 </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-success w-100">Place Order | COD</button>
                        <button type="submit" class="btn btn-primary w-100 mt-3 razorpay_btn">Pay with Razorpay</button>    
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection