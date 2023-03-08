@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
<body class="bg-black">
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-3 text-white"><b>All Categories</b></h2>
                    <div class="row">
                        @foreach ($category as $cate)
                            <div class="col-md-4 mb-3">
                                <a href="{{  url('category/'.$cate->slug)   }}">
                                    <div class="card my-auto">
                                        <img src="{{  asset('assets/uploads/category/'.$cate->image)  }}" alt="Category image">
                                            <div class="card-body">
                                                <h5 class=""><b>{{   $cate->name   }}</b></h5>
                                                <p class="">
                                                     {{   $cate->description   }}
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
    </div>
</body>

@endsection
