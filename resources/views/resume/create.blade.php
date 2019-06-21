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

                <div class="form-group">
                    <label for="name">Upload Resume</label>
                    
                    <input 
                        type="file" 
                        name="resume"
                        placeholder="Choose Resume"
                        class="form-control-file"
                    >
                    <input type="hidden" value="{{ Auth::user()->id }}" name="id"/>
                </div>

                <button type="submit" class="btn btn-success float-right">Upload</button>
            </form>
        </div>
    </div>
</section>

@endsection