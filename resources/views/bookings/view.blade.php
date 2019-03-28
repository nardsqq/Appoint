@extends('layouts.app')

@section('content')

@section('page-info')
    View specified <b>Booking</b>.
    <a href="{{ route('bookings.index') }}" class="float-right text-dark"><< Return to the Bookings page</a>
@endsection

<section class="col-md-6 my-3">
    <div class="card">
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">    
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="/bookings/{{ $booking->id }}">
                
                @method('DELETE')
                @csrf 

                <div class="form-group">
                    <label for="event_id">Event</label>
                    <select name="event_id" id="event_id" class="form-control" disabled>
                        <option value="{{ $event->id }}">{{ $event->name }}</option>          
                    </select>
                </div>

                <div class="form-group">
                    <label for="user_id">Performer</label>
                    <select name="user_id" id="user_id" class="form-control" disabled>
                        <option value="{{ $performer->id }}">{{ $performer->name }}</option>                                  
                    </select>
                </div>

                <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="description">Booking Description</label>
                            <textarea 
                                name="description" 
                                id="description" 
                                cols="30" rows="5" 
                                class="form-control"
                                placeholder="Booking Details"
                                disabled
                            >{{ $booking->description }}</textarea>
                        </div>
                    </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="start_date">Start Date</label>
                        <input 
                            type="date" 
                            class="form-control"
                            name="start_date"
                            id="start_date"
                            value="{{ $booking->start_date->format('Y-m-d') }}"
                            disabled
                        >
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="end_date">End Date</label>
                        <input 
                            type="date" 
                            class="form-control"
                            name="end_date"
                            id="end_date"
                            value="{{ $booking->end_date->format('Y-m-d') }}"
                            disabled
                        >
                    </div>
                </div>

                <span class="float-right">
                    <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-info text-light">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </span>
            </form>
        </div>
    </div>
</section>

@endsection