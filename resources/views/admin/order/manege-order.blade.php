@extends('admin.master')
@section('body')
    <br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>{{ Session::get('massage') }}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl No</th>
                            <th>Customer Name</th>
                            <th>Order Total</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($orders as $orders)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $orders->first_name. ' '. $orders->last_name}}</td>
                                <td>{{ $orders->order_total}}</td>
                                <td>{{ $orders->created_at}}</td>
                                <td>{{ $orders->order_status}}</td>
                                <td>{{ $orders->payment_type}}</td>
                                <td>{{ $orders->payment_status}}</td>

                                <td>

                                    <a href="{{ route('/view/order-Details', ['id'=>$orders->id]) }}" class="btn btn-info btn-xs" title="View Order Details"> <span class="glyphicon glyphicon-zoom-in"> </span></a>

                                    <a href="{{ route('/view/order-invoice', ['id'=>$orders->id]) }}" class="btn btn-warning btn-xs" title="View order invoice"> <span class="glyphicon glyphicon-zoom-out"> </span></a>
                                    <a href="{{ route('/invoice/download', ['id'=>$orders->id]) }}" class="btn btn-primary btn-xs" title="download order invoice"> <span class="glyphicon glyphicon-download"> </span></a>

                                    <a href="{{ route('/category/edit', ['id'=>$orders->id]) }}" class="btn btn-success btn-xs" title="Edit order "> <span class="glyphicon glyphicon-edit"> </span></a>
                                    <a href="{{ route('/category/delete', ['id'=>$orders->id]) }}" class="btn btn-danger btn-xs" title="delete order "> <span class="glyphicon glyphicon-trash"> </span></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


