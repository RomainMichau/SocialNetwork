@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h1>Add Photo</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/photos')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('errors')

                            <div class="form-group">
                                <label for="picture" class="col-md-4 control-label">Picture</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="picture" name="picture">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Add Photo</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @endsection