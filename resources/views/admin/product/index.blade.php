@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header bg-success">
            <h3 class="mt-4"><b>Product Page</b></h3>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-success table-bordered table-striped">
                <thead>
                    <tr>
                        <th><b>Id <i class="fa fa-id-card"></i></b></th>
                        <th><b>Category <i class="fa fa-list-alt"></i></b></th>
                        <th><b>Name <i class="fa fa-address-card-o"></i></b></th>
                        <th><b>Selling Price <i class="fa fa-money" aria-hidden="true"></i></b></th>
                        <th><b>Image <i class="fa fa-picture-o"></i>
                        </b></th>
                        <th><b>Action <i class="fa fa-tasks"></i></b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category->name ?? 'None'}}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->selling_price }}</td>

                            <td>
                                <img src="{{ asset('assets/uploads/products/'.$item->image) }}" class="cate-image" alt="Image here">
                            </td>
                            <td>
                                <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
