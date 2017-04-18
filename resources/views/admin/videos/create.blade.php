@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h1>Add Video</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/videos')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('errors')

                            <div class="form-group">
                                <label for="video" class="col-md-4 control-label">Video</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="video" name="video">
                                </div>
                            </div>


                                <div class="form-group"> 
                                <div class="col-md-6"> 
                                    <button type="submit" class="btn btn-primary">Add Video</button>
                                </div> 
                            </div>  
                        </form>
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
      @endsection