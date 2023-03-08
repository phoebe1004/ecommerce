@extends('layouts.admin')

@section('content')
    <div class="card bg-black">
        <div class="card header">
            <h4 class="ml-4"><b>Edit/Update Category<b></h4>
        </div>
        <div class="card-body">
            <form action="{{  url('update-category/'.$category->id)  }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Name</b></label>
                        <input type="text" value="{{  $category->name  }}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Slug</b></label>
                        <input type="text" value="{{  $category->slug  }}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for=""><b>Description</b></label>
                        <textarea name="description" rows="3" class="form-control">{{  $category->description  }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Status</b></label>
                        <input type="checkbox" {{  $category->status == "1" ? 'checked': ''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=""><b>Popular</b></label>
                        <input type="checkbox" {{  $category->popular == "1" ? 'checked': ''}}  name="popular">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for=""><b>Meta Title</b></label>
                        <input type="text" value="{{  $category->meta_title  }}" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for=""><b>Meta Description</b></label>
                        <textarea name="meta_description" rows="3" class="form-control">{{  $category->meta_description  }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for=""><b>Meta Keywords</b></label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{  $category->meta_keywords  }}</textarea>
                    </div>
                    @if ($category->image)
                        <img src="{{  asset('assets/uploads/category/'.$category->image)  }}" alt="Category image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control" >
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"><b>Update</b></button>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection
