@extends('master')

@section('content')
    <div class="row mt-md-3">
        <div class="col-10 ">
            <div class="card p-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-3 text-primary">Booking a trip</h4>

                        <a href="{{ route('book.trip') }}" class="btn btn-sm btn-success ms-3">Back</a>


                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-primary"> Journey From: <span
                                    class="text-black font-weight-normal">{{ $booking_info['start_location'] }}</span></h5>
                            <h5 class="text-primary">Journey To: <span
                                    class="text-black font-weight-normal">{{ $booking_info['end_location'] }}</span></h5>
                            <h5 class="text-primary"> Date: <span
                                    class="text-black font-weight-normal">{{ $booking_info['date'] }}</span></h5>
                        </div>
                        <div class="col-6">
                            <h5 class="text-primary"> Customer Name: <span
                                    class="text-black font-weight-normal">{{ $booking_info['name'] }}</span></h5>

                            <h5 class="text-primary"> Customer Mobile: <span
                                    class="text-black font-weight-normal">{{ $booking_info['mobile'] }}</span></h5>
                        </div>
                    </div>
                </div>
                <form method="post" action="{{ route('store.ticket') }}">
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @foreach ($booking_info as $key => $value)
                        <input type="hidden" name="booking_info[{{ $key }}]" value="{{ $value }}">
                    @endforeach
                    <div class="table-responsive">
                        <table class="table table-striped table-sm table-nowrap table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>trip Name</th>
                                    <th>Available Ticket</th>
                                    <th>Buying Ticket</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($trips as $key => $trip)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $trip->name }}</td>
                                        <td class="ps-md-3">{{ $trip->available_ticket }}</td>

                                        <td class="input-group">
                                            <select class="form-select" aria-label="Default select example"
                                                name="quantity[{{ $trip->id }}]"
                                                {{ $trip->available_ticket == 0 ? 'disabled' : '' }}>

                                                <option value=1 {{ old('quantity.' . $trip->id) == 1 ? 'selected' : '' }}>1
                                                </option>
                                                <option value=2 {{ old('quantity.' . $trip->id) == 2 ? 'selected' : '' }}>2
                                                </option>
                                                <option value=3 {{ old('quantity.' . $trip->id) == 3 ? 'selected' : '' }}>3
                                                </option>
                                                <option value=4 {{ old('quantity.' . $trip->id) == 4 ? 'selected' : '' }}>4
                                                </option>
                                            </select>
                                            @error('quantity.' . $trip->id)
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>


                                        <td class="table-action">
                                            @if ($trip->available_ticket > 0)
                                                <button type="submit" class="btn btn-sm btn-success" name="trip_id"
                                                    value="{{ $trip->id }}">
                                                    Book
                                                </button>
                                            @else
                                                <span class="text-danger">Not available </span>
                                            @endif
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No available buses</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col-->
    </div>
@endsection
