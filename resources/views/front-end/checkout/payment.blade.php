@extends('front-end.master')
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-8  well">
                <br/>
                Dear{{ Session::get('$customerName') }}.you have to us product shipping.
            </div>
            <div class="col-md-8 well">
                {{ Form::open(['route'=>'/new/order','method'=>'post']) }}
                    <table class="table table-bordered">
                        <tr>
                            <th>Cash on Delivery</th>
                            <td><input type="radio" name="payment_type" value="cash "> Cash On Delivery</td>
                        </tr>
                        <tr>
                            <th>paypal</th>
                            <td><input type="radio" name="payment_type" value="paypal"> paypal</td>
                        </tr>
                        <tr>
                            <th>Cash on Delivery</th>
                            <td><input type="radio" name="payment_type" value="Bkash"> Bkash</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" name="btn" value="confirm order"> </td>
                        </tr>

                    </table>
                {{ Form::close() }}


            </div>
        </div>
    </div>
@endsection
