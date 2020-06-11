@extends('front-end.master')
@section('body')

<div class="container">
    <div class="row">
        <div class="col-md-12 well">
            <br/>
            Dear{{ Session::get('$customerName') }}.you have to us product shipping.
        </div>
        <div class="col-md-6 well">
        <br/>
            <h3>Shipping info goes here</h3>

            {{ Form::open(['route'=>'/new/shipping', 'method'=>'post']) }}
            <div class="form-group " >
                <input type="text" name="full_name" class="form-control" value="{{ $customer->first_name.' '.$customer->last_name }}" placeholder="Full Name" >
            </div>

            <div class="form-group">
                <input type="text" name="email" class="form-control" value="{{ $customer->email }}" placeholder="Email">
            </div>

            <div class="form-group">
                <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}" placeholder="Phone No">
            </div>
            <div class="form-group">
                <input type="text" name="address" class="form-control" placeholder="Address" value="{{ $customer->address }}">
            </div>
            <div class="form-group">
                <input type="submit" name="btn" class="form-control btn btn-info" value="Save shipping info">
            </div>
{{ Form::close() }}
</div>
</div>
</div>
@endsection