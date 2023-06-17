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
                        <h4>Family Details
                            <a href="{{ route('families.create') }}" class="btn btn-primary float-end">Add Family</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name Father</th>
                                    <th>Phone</th>
                                    <th>National No</th>
                                    <th>Place</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($families as $family)
                                    <tr>
                                        <td>{{ $family->id }}</td>
                                        <td>{{ $family->name_father }}</td>
                                        <td>{{ $family->phone }}</td>
                                        <td>{{ $family->national_no }}</td>
                                        <td>{{ optional($family->places)->name }}</td>
                                        <td>
                                            <a href="{{ url('families/' . $family->id . '/edit') }}"
                                                class="btn btn-success">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('families.destroy', ['family' => $family->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                <a href="{{ route('families.trashed') }}" class="btn btn-danger">Deleted Families</a>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
