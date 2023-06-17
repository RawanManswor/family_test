@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Family
                            <a href="{{ url('families') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('families') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="place_id">Select Place :</label>
                                <select name="place_id" id="" class="form-control">
                                    <option value="">-- Select a place --</option>
                                    @foreach ($places as $place)
                                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                                    @endforeach

                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="new_place">Or enter a new place:</label>
                                <input type="text" name="new_place" id="new_place">
                            </div>
                            <div class="mb-3">
                                <label for="name_father">Name Father :</label>
                                <input type="text" name="name_father" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone :</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="national_no">National No :</label>
                                <input type="text" name="national_no" class="form-control">
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
@endsection
