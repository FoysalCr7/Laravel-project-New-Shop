@extends('admin.master')
@section('body')
    <br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Order Info</h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>Order No</th>
                            <td>{{ $order->id}}</td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>{{ $order->order_total}}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{ $order->order_status}}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $order->created_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>customer for this order</h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>Customer Name</th>
                            <td>{{ $customer->first_name.' '.$customer->last_name}}</td>
                        </tr>
                        <tr>
                            <th>Phone No</th>
                            <td>{{ $customer->phone}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $customer->email}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $customer->address}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Shipping Info for This Order</h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td>{{ $shipping->full_name}}</td>
                        </tr>
                        <tr>
                            <th>Phone No</th>
                            <td>{{ $shipping->phone}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $shipping->email}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $shipping->address}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Payment Info for This Order</h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>Payment Type</th>
                            <td>{{ $payment->payment_type }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{ $payment->payment_status}}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>product info for this order</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl No</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                            </tr>
                            @php($i=1)
                            @foreach($orderDetails as $orderDetails)
                            <tr>
                                <td>{{ $i++ }}</td>
                              <td>{{ $orderDetails->product_id }}</td>
                              <td>{{ $orderDetails->product_name }}</td>
                              <td>{{ $orderDetails->product_price }}</td>
                              <td>{{ $orderDetails->product_quantity }}</td>
                              <td>{{ $orderDetails->product_price* $orderDetails->product_quantity }}</td>


                            </tr>
                                @endforeach

                            </table>
                        </div>
                         </div>
                     </div>
     </div>

@endsection


