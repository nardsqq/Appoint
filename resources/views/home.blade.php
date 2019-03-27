@extends('layouts.app')

@section('content')

@section('page-info')
    Welcome to <strong>Appoint</strong>, a lightweight events booking system. <a href="#" class="text-secondary"><strong>Book</strong></a> an event or a performer now.
@endsection

<section class="col-md-4">
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        <h3>Upcoming Events</h3>
        <p class="h1">
            0
        </p>
    </div>
</section>
<section class="col-md-4">
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        <h3>Available Performers</h3>
        <p class="h1">
            0
        </p>
    </div>
</section>
<section class="col-md-4">
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        <h3>Active Bookings</h3>
        <p class="h1">
            0
        </p>
    </div>
</section>
@endsection
