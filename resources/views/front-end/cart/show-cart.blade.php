@extends('front-end.master')
@section('body')
    <div class="banner1">
        <!--single-->
            <div class="container">
                <h3><a href="index.htm">Home</a><span>Add to cart</span></h3>
                <!--Product Description-->
            </div>
                <!--Product Description-->
            </div>
        <div class="content">
        <!--single-->
        <div class="single-w3agile">
            <div class="container">
                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        <h3 class="text-center text-success">My shopping cart</h3>
                        <hr/>
                        <table class="table table-bordered">
                            <tr class="bg-primary">
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Total Price</th>

                                <th>Action</th>
                            </tr>
                            @php($i=1)
                            @php($sum=0)

                            @foreach($cartproduct as$cartproduct)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $cartproduct->name }}</td>
                                <td>{{ $cartproduct->price }}</td>
                                <td>
                                    {{$cartproduct->quantity}}
                                </td>
                                <td><img src="{{ asset($cartproduct->attributes->image ) }}" alt="" height="100px" width="100px"></td>
                                <td>{{$total= $cartproduct->price*$cartproduct->quantity }}</td>
                                <td>
                                    <a href="{{ route('/delete/cart',['id'=>$cartproduct->id]) }}" class="btn btn-danger" title="delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                                @php($sum=$sum + $total)

                            @endforeach
                            </table>
                            <hr/>
                         <table class="table table-bordered">
                            <tr>
                                <th class="bg-primary">Item total price</th>
                                <td>{{ $sum }}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">Vat total </th>
                                <td>{{ $vat=0 }}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">Grand total </th>
                                <td>{{$order_total=$sum+$vat }}</td>
                                <?php
                                Session::put('order_total',$order_total);
                                ?>
                            </tr>


                            </table>
                            </div>
                         </div>
                            <div class="row">
                                <div class="col-md-11 col-md-offset-1">
                                    @if(Session::get('customerId')&& Session::get('shippingId'))
                                    <a href="{{ route('/checkout/payment') }}" class="btn btn-success pull-right"> Checkout</a>
                                    @elseif(Session::get('customerId'))
                                        <a href="{{ route('/checkout/shipping') }}" class="btn btn-success pull-right"> Checkout</a>
                                    @else
                                        <a href="{{ route('/checkout') }}" class="btn btn-success pull-right"> Checkout</a>
                                        @endif
                                    <a href="" class="btn btn-success pull-left"> Contuine shoping</a>

                                </div>
                            </div>

                         </div>
                         </div>
        <!--new-arrivals-->
                            </div>

@endsection