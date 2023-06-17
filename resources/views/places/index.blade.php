@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Place Details
                            <a href="{{ url('places/create') }}" class="btn btn-primary float-end">Add Place</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>ِAction</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($places as $place)
                                    <tr>
                                        <td>{{ $place->id }}</td>
                                        <td>{{ $place->name }}</td>
                                        <td>
                                            <form action="{{ route('places.destroy', ['place' => $place->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
