@extends('layouts.front')

@section('title', $products->name)


@section('content')
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/custom.css') }}">
</head>
<body class="bg-black">

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <form action="{{url('/add-rating')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$products->id}}">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Rate {{$products->name}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                 <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if($user_rating)
                                @for($i = 1; $i<= $user_rating->stars_rated; $i++)
                                    <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                    <label for="rating{{$i}}" class="fa fa-star"></label>
                                @endfor
                                @for($j = $user_rating->stars_rated+1; $j <= 5; $j++)
                                    <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                    <label for="rating{{$j}}" class="fa fa-star"></label>
                                @endfor
                            @else
                                <input type="radio" value="1" name="product_rating" checked  id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating"  id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <div class="py-3 mb-4 shadow-sm bg-success border-top">
        <div class="container ">
            <h6 class="mb-0">
                <a class="text-white" href="{{url('category')}}">
                    Collections
                 </a> /
                <a class="text-white" href="{{url('category/'.$products->category->slug)}}">
                    {{$products->category->name}}
                </a> /
                <a class="text-white" href="{{url('category/'.$products->category->slug.'/'.$products->slug)}}">
                    {{$products->name}}
                </a>
            </h6>
        </div>
    </div>

    <div class="container pb-5">
        <div class="product_data">
            <div class="">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{  asset('assets/uploads/products/'.$products->image)  }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0 text-white">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                                <label style="font-size: 16px" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>

                        <hr>
                        <label class="me-3 text-white"><b>Original Price :<s style="color:red;">₱{{ $products->original_price }}</s></b></label>
                        <label class="fw-bold text-white">Selling Price : ₱{{ $products->selling_price }} </label>
                        @php $ratenum = number_format ($rating_value) @endphp
                        <div class="rating text-white">
                            @for($i = 1; $i<= $ratenum; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for($j = $ratenum+1; $j <= 5; $j++)
                            <i class="fa fa-star"></i>
                            @endfor
                        <span>
                            @if($ratings->count() > 0)
                                {{$ratings->count()}} Ratings
                            @else
                                <b>No Ratings</b>
                            @endif
                        </span>
                        </div>

                        <p class="mt-3 text-white">
                            {!! $products->small_description !!}
                        </p>
                        <hr>
                        @if ($products->qty > 0)
                            <label class="badge bg-success">In stock</label>
                        @else
                            <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label class="text-white" for="Quantity"><b>Quantity<b></label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control qty-input text-center"  />
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <br/>
                                @if ($products->qty > 0)
                                    <button type="button" class="btn btn-primary me-3 addToCartBtn float-start"><b>Add to cart </b><i class="fa-solid fa-cart-plus"></i></button>
                                @endif

                                <button type="button" class="btn btn-warning me-3 addToWishlist float-start"><b>Add to wishlist </b> <i class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h3 class="text-white">Description</h3>
                        <p class="mt-3 text-white">
                            {!!  $products->description   !!}
                        </p>

                    </div>
                    <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Rate this product
                            </button>
                            <a href="{{url('add-review/'.$products->slug.'/userreview')}}" class="btn btn-link text-white">
                                Write a review
                            </a>
                        </div>
                        <div class="col-md-8 text-white">
                            @foreach ($reviews as $item)
                                <div class="user-review">
                                    <label for="">{{$item->user->name .' '.$item->user->lname}}</label>
                                    @if($item->user_id == Auth::id())
                                        <a href="{{url('edit-review/'.$products->slug.'/userreview')}}">Edit</a>
                                    @endif
                                    <br>
                                    @if($item->rating)
                                        @php $user_rated = $item->rating->stars_rated @endphp
                                        @for($i = 1; $i<= $user_rated; $i++)
                                            <i class="fa fa-star checked"></i>
                                        @endfor
                                        @for($j = $user_rated+1; $j <= 5; $j++)
                                        <i class="fa fa-star"></i>
                                        @endfor
                                    @endif
                                    <small style="color:lightcoral">Reviewed on {{$item->created_at->format('d M Y')}}</small>
                                    <p style="color:darksalmon">
                                        {{$item->user_review}}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection
