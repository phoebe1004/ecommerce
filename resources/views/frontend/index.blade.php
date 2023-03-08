@extends('layouts.front')

@section('title')
    Welcome to Fiibii E-shop
@endsection

@section('content')
    @include('layouts.inc.slider')

    <div class="py-5 bg-black">
        <div class="container">
            <div class="row">
                <h2 class="mb-3 text-white">Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <div class="item image-new">
                            <div class="card ">
                                <img src="{{  asset('assets/uploads/products/'.$prod->image)  }}" alt="Product image">
                                    <div class="card-body">
                                        <h5><b>{{   $prod->name   }}</b></h5>
                                        <span class="float-start">₱{{ $prod->selling_price  }}</span>
                                        <span class="float-end" style="color: red"><s>{{ $prod->original_price  }} </s> </span>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="bg-black text-white">
        <div class="container">
            <div class="row">
                <h2 class="mb-3">Trending Category</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($trending_category as $tcategory)
                        <div class="item">
                            <a href="{{  url('category/'.$tcategory->slug)   }}">
                                <div class="card">
                                    <img src="{{  asset('assets/uploads/category/'.$tcategory->image)  }}" alt="Product image" style="width:100%">
                                        <div class="card-body">
                                            <h5>{{   $tcategory->name   }}</h5>
                                                <p>
                                                    {{   $tcategory->description   }}
                                                </p>
                                        </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

    @section('scripts')
        <script>
        $('.featured-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
         }
    })
    </script>

    @endsection
