@extends('layouts.app')

@section('content')
<section class="row justify-content-center">
    <section class="col-md-12">
        <div class="shadow-sm p-3 mb-5 mt-4 bg-white rounded">
            Welcome to <strong>Appoint</strong>, a lightweight events booking system. <a href="#" class="text-secondary"><strong>Book</strong></a> an event or a performer now.
        </div>
    </section>
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
</section>
@endsection
