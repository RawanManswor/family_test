@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @php
                            $showFamilies = false; // تعيين قيمة الافتراضية للمتغير إلى false
                        @endphp

                        @foreach (auth()->user()->roles()->get() as $role)
                            @if ($role->name == 'Admin')
                                <!-- Show Places button -->
                                <form action="{{ url('places') }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Show Places</button>
                                </form>
                                <br>
                            @endif

                            <!-- Show Families button for the first user or admin role only -->
                            @if ($role->name == 'User' || $role->name == 'Admin')
                                @if (!$showFamilies)
                                    <!-- Check if the button has not been displayed before -->
                                    <form action="{{ url('families') }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Show Families</button>
                                    </form>
                                    <br>
                                    @php
                                        $showFamilies = true; // تعيين قيمة المتغير إلى true بعد عرض الزر
                                    @endphp
                                @endif
                            @endif
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
