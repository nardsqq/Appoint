@extends('layouts.app')

@section('content')

@section('page-info')
    Welcome to the <strong>Bookings</strong> page, manage and monitor your <i>Booking</i> records here.
@endsection

<section class="col-md-12">
    <div class="float-right my-3">
        <a href="{{ route('bookings.create') }}" class="btn btn-success">Book an Event</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Event</th>
                <th scope="col">Booking Description</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->event->name }}</td>
                    <td>{{ $booking->description }}</td>
                    <td>{{ $booking->start_date }}</td>
                    <td>{{ $booking->end_date }}</td>
                    <td class="text-center">
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary btn-sm text-light">Edit</a>
                        <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info btn-sm text-light">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <span>
            Displayed <b>{{ $bookings->count() }}</b> records in this page out of <b>{{ $bookings->total() }}</b> total records.
        </span>
            
        <span class="float-right">
            {{ $bookings->links() }}
        </span>
    </div>
</section>

@endsection