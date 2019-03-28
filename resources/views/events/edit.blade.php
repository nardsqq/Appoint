@extends('layouts.app')

@section('content')

@section('page-info')
    Edit an <b>Event Type</b> record.
    <a href="{{ route('event-types.index') }}" class="float-right text-dark"><< Return to the Event Types page</a>
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
            <form method="POST" action="/event-types/{{ $event_type->id }}">

                @method('PUT')
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Event Type</label>
                        <input 
                            type="text" 
                            class="form-control {{ $errors->has('name') ? 'border border-danger' : '' }}" 
                            name="name" 
                            id="name" 
                            placeholder="Event Type Name"
                            value="{{ $event_type->name }}"
                        >
                    </div>
                </div>
                <button type="submit" class="btn btn-info text-light float-right">Update</button>
            </form>
        </div>
    </div>
</section>

@endsection