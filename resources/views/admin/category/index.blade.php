@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header bg-success">
            <h3 class="mt-4"><b>Category Page</b></h3>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-success table-bordered table-striped">
                <thead>
                    <tr>
                        <th><b>Id <i class="fa fa-id-card"></i></b></th>
                        <th><b>Name <i class="fa fa-address-card-o"></b></th>
                        <th><b>Description <i class="fa fa-info"></b></th>
                        <th><b>Image <i class="fa fa-camera"></b></th>
                        <th><b>Action <i class="fa fa-tasks"></i></b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/category/'.$item->image) }}" class="cate-image" alt="Image here">
                            </td>
                            <td>
                                <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
