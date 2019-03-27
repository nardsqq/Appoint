@extends('layouts.app')

@section('content')

@section('page-info')
    Add a new <b>Client</b> record.
    <a href="{{ route('clients.index') }}" class="float-right text-dark"><< Return to the Clients page</a>
@endsection

<section class="col-md-9 my-3">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="/clients">
                {{ csrf_field() }}

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Client Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" name="company" id="company" placeholder="Company Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="#01 Main St, Brgy. 101, Metro City, Central Region">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="sample@email.com">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="contact">Contact Number</label>
                        <input type="text" class="form-control" name="contact" id="contact" placeholder="###-#### / #### #### ###">
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right">Submit</button>
            </form>
        </div>
    </div>
</section>



@endsection