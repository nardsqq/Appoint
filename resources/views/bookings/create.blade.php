@extends('layouts.app')

@section('content')

@section('page-info')
    Book an <b>Event</b>.
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
            <form method="POST" action="/bookings">
                @csrf

                <div class="form-group">
                    <label for="event_id">Event</label>
                    <select name="event_id" id="event_id" class="form-control">
                        @foreach ($events as $event)
                            <option value="{{ $event->id }}">{{ $event->name }}</option>        
                        @endforeach                            
                    </select>
                </div>

                <div class="form-group">
                    <label for="user_id">Performer</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach ($performers as $performer)
                            <option value="{{ $performer->id }}">{{ $performer->name }}</option>        
                        @endforeach                            
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
                            >
                            </textarea>
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
                        >
                    </div>
                </div>

                <button type="submit" class="btn btn-success float-right">Submit</button>
            </form>
        </div>
    </div>
</section>

@endsection