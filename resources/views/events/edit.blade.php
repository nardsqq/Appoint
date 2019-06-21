@extends('layouts.app')

@section('content')

@section('page-info')
    Edit specified <b>Event</b>.
    <a href="{{ route('events.index') }}" class="float-right text-dark"><< Return to the Events page</a>
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
            <form method="POST" action="/events/{{ $event->id }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="client_id">Client</label>
                    <select name="client_id" id="client_id" class="form-control">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ $client->id == $event->client_id ? "selected" : "" }}>
                                {{ $client->company }} - {{ $client->name }}
                            </option>
                        @endforeach                            
                    </select>
                </div>

                <div class="form-group">
                    <label for="event_type_id">Event Type</label>
                    <select name="event_type_id" id="event_type_id" class="form-control">
                        @foreach ($event_types as $event_type)
                            <option value="{{ $event_type->id }}" {{ $event_type->id == $event->event_type_id ? "selected" : "" }}>
                                {{ $event_type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Event Name</label>
                        <input 
                            type="text" 
                            class="form-control"
                            name="name"
                            id="name"
                            placeholder="Event Title or Name"
                            value="{{ $event->name }}"
                        >
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="venue">Venue</label>
                        <input 
                            type="text" 
                            class="form-control"
                            name="venue"
                            id="venue"
                            placeholder="Designated Venue"
                            value="{{ $event->venue }}"
                        >
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            cols="30" rows="5" 
                            class="form-control"
                            placeholder="Full Event Details"
                        >{{ $event->description }}</textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="budget">Budget</label>
                        <input 
                            type="number" 
                            class="form-control"
                            name="budget"
                            id="budget"
                            placeholder="Alloted Budget for the Event"
                            value="{{ $event->budget }}"
                        >
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="budget">Date and Time</label>
                        <input 
                            type="datetime-local" 
                            class="form-control"
                            name="date_time"
                            id="date_time"
                            value="{{ $event->date_time->format('Y-m-d\TH:i') }}"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        @if ($event->status == 0)
                            <option value="0" selected>New</option>
                        @endif       
                    </select>
                </div>

                <button type="submit" class="btn btn-info text-light float-right">Update</button>
            </form>
        </div>
    </div>
</section>

@endsection