@extends('layouts.front')

@section('title', "Edit your review")


@section('content')
    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-black">
                    <div class="card-body">
                            <h5 class="text-white"> You are writing a review for {{$review->product->name}}</h5>
                            <form action="{{url('/update-review')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="review_id" value="{{$review->id}}">
                                <textarea class="form-control" name="user_review" rows="5" placeholder="Write a review">{{$review->user_review}}</textarea>
                                <button type="submit" class="btn btn-warning mt-3 float-end"> Update review</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
