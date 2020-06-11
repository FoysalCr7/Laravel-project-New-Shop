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
                    <div class="col-md-6 well">
                        <h3>Register</h3>

                        {{ Form::open(['method'=>'post']) }}
                        <div class="form-group " >
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Phone No">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn" class="form-control btn btn-info" value="Register">
                        </div>
                        {{ Form::close() }}

                        <div class="col-md5 well" style="margin-left: 20px"></div>
                        <h3> Login here</h3>
                        {{ Session::get('message') }}
                        <br/>
                        {{ Form::open(['method'=>'post']) }}
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn" class="btn btn-success" value="Login">
                        </div>
                        {{ Form::close() }}


                    </div>


                </div>
                <!--new-arrivals-->
            </div>
        </div>
    </div>
@endsection

