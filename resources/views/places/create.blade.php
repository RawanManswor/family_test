@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Place
                            <a href="{{ url('places') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('places') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Place Name :</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <form  action="{{ route('groups.store') }}" method="post">
        @csrf
            <label>group name is :</label><input type='text' name='group_name'  required/>
            <input   type='submit'  />

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <h1>error</h1>
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </form>
        </div> --}}
@endsection
