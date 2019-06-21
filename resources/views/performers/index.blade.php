@extends('layouts.app')

@section('content')

@section('page-info')
    Welcome to the <strong>Performers</strong> page, monitor your <i>Performers</i> here.
@endsection

<section class="col-md-12">
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($performers as $performer)
                <tr>
                    <td>{{ $performer->name }}</td>
                    <td class="text-center">
                        <a href="{{ url('storage/'. $performer->resume) }}" download="{{ asset('storage/'. $performer->resume) }}" class="btn btn-info btn-sm text-light">View Resume</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <span>
            Displayed <b>{{ $performers->count() }}</b> records in this page out of <b>{{ $performers->total() }}</b> total records.
        </span>
            
        <span class="float-right">
            {{ $performers->links() }}
        </span>
    </div>
</section>

@endsection