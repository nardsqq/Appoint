@extends('layouts.app')

@section('content')

@section('page-info')
    @if (Auth::user()->role == 0)
        Welcome to <strong>Appoint</strong>, a lightweight events booking system. <a href="{{ url('/events') }}" class="text-secondary"><strong>Create</strong></a> an event now.
    @elseif (Auth::user()->role == 1)
        Welcome to <strong>Appoint</strong>, a lightweight events booking system. <a href="{{ url('/bookings') }}" class="text-secondary"><strong>Check</strong></a> your bookings now.
    @endif
@endsection

@if (Auth::user()->role == 0)
    <section class="col-md-4">
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <h3>Upcoming Events</h3>
            <p class="h1">
                {{ $events->count() }}
            </p>
        </div>
    </section>
    <section class="col-md-4">
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <h3>Available Performers</h3>
            <p class="h1">
                {{ $performers->count() }}
            </p>
        </div>
    </section>
    <section class="col-md-4">
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <h3>Active Bookings</h3>
            <p class="h1">
                {{ $bookings->count() }}
            </p>
        </div>
    </section>
@elseif (Auth::user()->role == 1)
    <section class="col-md-6">
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <h3>Upcoming Events</h3>
            <p class="h1">
                {{ $events->count() }}
            </p>
        </div>
    </section>
    <section class="col-md-6">
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <h3>{{ Auth::user()->name }}'s Active Bookings</h3>
            <p class="h1">
                {{ $performer_bookings->count() }}
            </p>
        </div>
    </section>
@endif

@endsection
