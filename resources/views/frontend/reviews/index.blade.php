@extends('layouts.front')

@section('title', "Write a review")


@section('content')

    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-black">
                    <div class="card-body">
                        @if ($verified_purchase->count() > 0)
                            <h5 class="text-white"><b> YOU ARE WRITING A REVIEW FOR {{$product->name}}</b></h5>
                            <form action="{{url('/add-review')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <textarea class="form-control" name="user_review" rows="5" placeholder="Write a review"></textarea>
                                <button type="submit" class="btn btn-success mt-3 float-end"> Submit review</button>
                            </form>
                        @else
                            <div class="alert alert-danger">
                                <h5>You are not eligible to write this product</h5>
                                <p>
                                    For the trustworthiness of the reviews, only customers who purchased
                                    the product can write a review about the product.
                                </p>
                                <a href="{{url('/')}}" class="btn btn-primary mt-3"> Go to homepage</a>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
