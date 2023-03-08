@extends('layouts.front')

@section('title')
{{   $category->name   }}
@endsection

@section('content')
<body class="bg-black">

    <div class="py-3 mb-4 shadow-sm bg-success border-top">
        <div class="container">
            <h6 class="mb-0">
                <a class="text-white" href="{{url('category')}}">
                    Collections
                </a> /
                <a class="text-white" href="#!">
                    {{$category->name}}
                </a>
                 </h6>
        </div>
    </div>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <h2 class="text-white"><b>{{   $category->name   }}</b></h2>
                    @foreach ($products as $prod)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <a href="{{  url('category/'.$category->slug.'/'.$prod->slug)   }}">
                                    <img src="{{  asset('assets/uploads/products/'.$prod->image)  }}" class="w-100" alt="Prdouct image">
                                    <div class="card-body">
                                            <h5><b>{{   $prod->name   }}</b></h5>
                                            <span class="float-start"><b>₱{{ $prod->selling_price  }}</b></span>
                                            <span class="float-end"><s style="color:red">₱{{ $prod->original_price  }} </s> </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </body>
@endsection
