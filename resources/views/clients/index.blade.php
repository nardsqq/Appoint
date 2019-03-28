@extends('layouts.app')

@section('content')

@section('page-info')
    Welcome to the <strong>Clients</strong> page, manage and monitor your <i>client</i> data here.
@endsection

<section class="col-md-12">
    <div class="float-right my-3">
        <a href="{{ route('clients.create') }}" class="btn btn-success">Add New Client</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Company</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->company }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->contact }}</td>
                    <td class="text-center">
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-sm text-light">Edit</a>
                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info btn-sm text-light">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <span>
            Displayed <b>{{ $clients->count() }}</b> record(s) in this page out of <b>{{ $clients->total() }}</b> total records.
        </span>
            
        <span class="float-right">
            {{ $clients->links() }}
        </span>
    </div>
    
</section>


@endsection