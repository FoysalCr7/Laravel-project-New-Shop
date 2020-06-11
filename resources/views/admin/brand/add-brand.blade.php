@extends('admin.master')
@section('body')
    <br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">  {{ Session::get('massage')}}</h3>

                    {!! Form::open(['route' => '/brand/new','method'=>'POST','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        {{  Form::label('brand_name', 'Brand Name',['class'=>'col-md-3'])}}
                       <div class="col-md-9">
                           {{ Form::text('brand_name','', ['class' => 'form-control']) }}
                           <span>{{ $errors->has('brand_name')? $errors->first('brand_name'):'' }}</span>
                       </div>
                    </div>
                    <div class="form-group">
                        {{  Form::label('brand_description', 'Brand Description',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            <textarea class="form-control" name="brand_description" id="" cols="30" rows="10"></textarea>
                            <span>{{ $errors->has('brand_description')? $errors->first('brand_description'):'' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        {{  Form::label('brand_name', 'Publication Status',['class'=>'col-md-3'])}}
                        <div class="col-md-9 radio">
                            <label for=""><input type="radio" name="publication_status" value="1">Published</label>
                            <label for=""><input type="radio" name="publication_status" value="0">Unpublished</label><br/>
                            <span>{{ $errors->has('publication_status')? $errors->first('publication_status'):'' }}</span>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block"  value="Save Brand Info">
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
