@extends('admin.master')
@section('body')
    <br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">

                    <h3 class="text-center text-success">  {{ Session::get('massage')}}</h3>

                    {!! Form::open(['route' => '/product/new','method'=>'POST','class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                    <div class="form-group">
                        {{  Form::label('category_name', 'Category Name',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            <select class="form-control" name="category_id">
                                <option> Select Category </option>
                                @foreach($category as $category)
                                <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                              @endforeach
                            </select>
                            <span>{{ $errors->has('category_name')? $errors->first('category_name'):'' }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        {{  Form::label('brand_name', 'Brand Name',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            <select class="form-control" name="brand_id">
                                <option> Select Brand </option>
                                @foreach($brand as $brand)
                                <option value="{{ $brand->id }}"> {{ $brand->brand_name }}</option>
                                    @endforeach
                            </select>
                            <span>{{ $errors->has('category_name')? $errors->first('category_name'):'' }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        {{  Form::label('product_name', 'Product Name',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="product_name" >
                            <span>{{ $errors->has('brand_description')? $errors->first('brand_description'):'' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        {{  Form::label('product_price', 'Product Price',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="product_price" >
                            <span>{{ $errors->has('brand_description')? $errors->first('brand_description'):'' }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        {{  Form::label('product_quantity', 'Product Quantity',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="product_quantity" >
                            <span>{{ $errors->has('brand_description')? $errors->first('brand_description'):'' }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        {{  Form::label('short_description', 'Short Description',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            <textarea class="form-control" name="short_description" id="" cols="20" rows="2"></textarea>
                            <span>{{ $errors->has('brand_description')? $errors->first('brand_description'):'' }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        {{  Form::label('long_description', 'Long Description',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            <textarea class="form-control" name="long_description" id="editor" cols="30" rows="10"></textarea>
                            <span>{{ $errors->has('brand_description')? $errors->first('brand_description'):'' }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        {{  Form::label('product_image', 'Product Image',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            <input type="file" name="product_image" accept="image/*" >
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
                            <input type="submit" name="btn" class="btn btn-success btn-block"  value="Save Product Info">
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection

