@extends('layouts.app')

@section('content')

@section('page-info')
    Welcome to the <strong>Event Types</strong> page, manage and monitor your <i>event types</i> here.
@endsection

<section class="col-md-12">
    <div class="float-right my-3">
        <a href="{{ route('event-types.create') }}" class="btn btn-success">Add Event Type</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($event_types as $event_type)
                <tr>
                    <td>{{ $event_type->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('event-types.edit', $event_type->id) }}" class="btn btn-primary btn-sm text-light">Edit</a>
                        <a href="{{ route('event-types.show', $event_type->id) }}" class="btn btn-info btn-sm text-light">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <span>
            Displayed <b>{{ $event_types->count() }}</b> records in this page out of <b>{{ $event_types->total() }}</b> total records.
        </span>
            
        <span class="float-right">
            {{ $event_types->links() }}
        </span>
    </div>
</section>

@endsection