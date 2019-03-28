@extends('layouts.app')

@section('content')

@section('page-info')
    Edit specified <b>Client</b> record.
    <a href="{{ route('clients.index') }}" class="float-right text-dark"><< Return to the Clients page</a>
@endsection

<section class="col-md-9 my-3">
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
            <form method="POST" action="/clients/{{ $client->id }}">
                @method('PUT')
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input 
                            type="text" 
                            class="form-control {{ $errors->has('name') ? 'border border-danger' : '' }}" 
                            name="name" 
                            id="name"
                            placeholder="Client Name"
                            value="{{ $client->name }}"
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="company">Company</label>
                        <input 
                            type="text" 
                            class="form-control {{ $errors->has('company') ? 'border border-danger' : '' }}" 
                            name="company" 
                            id="company" 
                            placeholder="Company Name"
                            value="{{ $client->company }}"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input 
                        type="text" 
                        class="form-control {{ $errors->has('address') ? 'border border-danger' : '' }}" 
                        name="address" 
                        id="address" 
                        placeholder="#01 Main St, Brgy. 101, Metro City, Central Region"
                        value="{{ $client->address }}"
                    >
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input 
                            type="email" 
                            class="form-control {{ $errors->has('email') ? 'border border-danger' : '' }}" 
                            name="email" 
                            id="email" 
                            placeholder="sample@email.com"
                            value="{{ $client->email }}"
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="contact">Contact Number</label>
                        <input 
                            type="text" 
                            class="form-control {{ $errors->has('contact') ? 'border border-danger' : '' }}" 
                            name="contact" 
                            id="contact" 
                            placeholder="###-#### / #### #### ###"
                            value="{{ $client->contact }}"
                        >
                    </div>
                </div>
                <button type="submit" class="btn btn-info text-light float-right">Update</button>
            </form>
        </div>
    </div>
</section>

@endsection