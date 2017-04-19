@extends('layouts.app')
@section('content')

    <script type="text/javascript">

        function like(i){
            document.getElementById(i*174).style.visibility="hidden";
            document.getElementById(i).style.visibility="visible";
        }

        function dislike(i){
            document.getElementById(i*174).style.visibility="visible";
            document.getElementById(i).style.visibility="hidden";
        }

    </script>


    <div class="container">
        <div class="row">
        @forelse($events as $event)
            <div class="container">
                <div class="row">
                    <p>{{ $event->title }}</p>
                    <p>{{ $event->description }}</p>
                    <p>{{ $event->date }}</p>
                </div>
            </div>

                <div id={{$event->id*174}}>
                    <button onclick="like({{$event->id}})" type="button" class="btn btn-primary" name="like">J'éme</button><br> </div>
                <div id={{$event->id}}> <button type="button" onclick="dislike({{$event->id}})" class="btn btn-danger" >J'éme plus</button><br></div>

                <script type="text/javascript">
                dislike({{$event->id}});
                </script>

                ---------------------------------------------
        @empty
            No Event
        @endforelse
        </div>
    </div>
@endsection