@extends('layouts.app')

@section('content')

@section('page-info')
    Welcome to the <strong>Events</strong> page, manage and monitor your <i>Event</i> records here.
@endsection

<section class="col-md-12">
    <div class="float-right my-3">
        <a href="{{ route('events.create') }}" class="btn btn-success">Create Event</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Client</th>
                <th scope="col">Event Type</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Budget</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->client->name }}</td>
                    <td>{{ $event->eventType->name }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>PHP {{ $event->budget }}</td>
                    <td class="text-center">
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary btn-sm text-light">Edit</a>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm text-light">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <span>
            Displayed <b>{{ $events->count() }}</b> records in this page out of <b>{{ $events->total() }}</b> total records.
        </span>
            
        <span class="float-right">
            {{ $events->links() }}
        </span>
    </div>
</section>

@endsection