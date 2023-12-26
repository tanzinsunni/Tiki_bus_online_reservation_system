@extends('master')

@section('content')
    <div class="row mt-md-3  ">



        <div class="col-8 ">
            <div class="mb-2">
                <h4 class="text-primary">Add a Bus Trip</h4>
            </div>

            <form action="{{ route('store.trip') }}" method="POST">
                @csrf

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="mb-3">

                    <input class="form-control" type="text" id="productname" name="name" placeholder="Name of Trip"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="input-group">

                        <select class="form-select" aria-label="Default select example" name="start_location_id">
                            @foreach ($locations as $location)

                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('start_location_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <select class="form-select" aria-label="Default select example" name="end_location_id">
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}" {{ $loop->last ? 'selected' : '' }}>
                                    {{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('end_location_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="mb-3">
                    <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                        <input type="date" class="form-control datetimepicker-input" data-target="#datetimepicker"
                            name="date" value="{{ old('date') }}" />
                    </div>

                    @error('date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center d-grid">
                    <button class="btn btn-success" type="submit"> Add a Trip </button>
                </div>

        </div>


        </form>
    </div>
    </div>
@endsection
