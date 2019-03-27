@extends('layouts.app')

@section('content')

@section('page-info')
    View specified <b>Client</b> record.
    <a href="{{ route('clients.index') }}" class="float-right text-dark"><< Return to the Clients page</a>
@endsection

<section class="col-md-9 my-3">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="/clients/{{ $client->id }}">

                @method('DELETE')
                @csrf
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $client->name }}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" name="company" id="company" value="{{ $client->company }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ $client->address }}" disabled>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $client->email }}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="contact">Contact Number</label>
                        <input type="text" class="form-control" name="contact" id="contact" value="{{ $client->contact }}" disabled>
                    </div>
                </div>
                <span class="float-right">
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info text-light">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </span>
            </form>
        </div>
    </div>
</section>

@endsection