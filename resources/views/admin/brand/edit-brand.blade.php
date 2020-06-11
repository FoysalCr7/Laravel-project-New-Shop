@extends('admin.master')
@section('body')
    <br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center text-success">  {{ Session::get('massage')}}</h3>
                    <form action="{{ route('/brand/update') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-3">brand Name</label>
                            <div class="col-md-9">
                                <input type="text" name="brand_name" class="form-control" value="{{ $brand->brand_name }}"/>
                                <input type="hidden" name="brand_id" class="form-control" value="{{ $brand->id }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Brand Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="brand_description" >{{ $brand->brand_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Publication status</label>
                            <div class="col-md-9 radio">
                                <label><input type="radio" name="publication_status" {{ $brand->publication_status==1 ? 'checked':'' }}  value="1"/> Published</label>
                                <label><input type="radio" name="publication_status" {{ $brand->publication_status==0 ? 'checked':'' }}  value="0"/> Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="btn" value="update Brand Info" class="btn btn-success btn-block"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

