@extends('layouts.app')
@section('content')



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

               

                ---------------------------------------------
        @empty
            No Event
        @endforelse
        </div>
    </div>
@endsection