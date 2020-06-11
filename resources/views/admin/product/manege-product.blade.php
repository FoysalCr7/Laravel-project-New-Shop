@extends('admin.master')
@section('body')
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>{{ Session::get('massage') }}</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="bg-primary">
                                <th>Sl No</th>
                                <th>Category Name</th>
                                <th>Brand Name</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Product Short Description</th>
                                <th>Product Long  Description</th>
                                <th>Product Image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            @php($i=1)
                            @foreach($product as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>{{ $product->brand_name }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->product_quantity}}</td>
                                <td>{{ $product->short_description }}</td>
                                <td>{{ $product-> long_description}}</td>
                                <td>
                                    <img src="{{ asset($product->product_image) }}" alt="" height="100px" width="100px">
                                </td>
                                <td>{{ $product-> publication_status}}</td>
                                <td>{{ $product->publication_status==1 ?'published':'Unpublished' }}</td>
                                <td>
                                    @if($product->publication_status==1)
                                        <a href="{{ route('/product/unpublished', ['id'=>$product->id]) }}" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-arrow-up"> </span></a>
                                    @else
                                        <a href="{{ route('/product/published', ['id'=>$product->id]) }}" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-arrow-down"> </span></a>
                                    @endif
                                    <a href="{{ route('/product/edit', ['id'=>$product->id]) }}" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-edit"> </span></a>
                                    <a href="{{ route('/product/delete', ['id'=>$product->id]) }}" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-trash"> </span></a>
                                    <a href="" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-zoom-in"> </span></a>
                                </td>

                            </tr>


                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


