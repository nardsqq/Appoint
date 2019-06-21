@extends('layouts.app')

@section('content')

@section('page-info')
    Upload your <b>Resume</b> 
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
            <form method="POST" action="/resume" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                <img src="{{ url('storage/'.Auth::user()->resume) }}" alt="" width= "20%" height="20%" />
                    <div class="form-group col-md-12">
                        <label for="name">Upload Resume</label>
                        <input 
                            type="file" 
                            name="resume"
                            placeholder="Choose Resume"
                        >
                        <input type="hidden" value="{{ Auth::user()->id }}" name="id"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right">Submit</button>
            </form>
        </div>
    </div>
</section>

@endsection