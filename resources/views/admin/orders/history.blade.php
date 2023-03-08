@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="mt-3 text white"><b>Order History</b>
                            <a href="{{'orders'}}" class="btn btn-warning float-right">New Order</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><b>Order Date <i class="fa fa-calendar"></i></b></th>
                                    <th><b>Tracking Number <i class="fa fa-address-card-o"></i></b></th>
                                    <th><b>Total Price <i class="fa fa-money" aria-hidden="true"></i></b></th>
                                    <th><b>Status <i class="fa fa-id-card"></i></b></th>
                                    <th><b>Action <i class="fa fa-tasks"></i></b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td>{{ $item->status == '0' ? 'pending' : 'completed' }}</td>
                                        <td>
                                            <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
