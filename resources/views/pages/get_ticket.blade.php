@extends('master')

@section('content')
    <div class="row mt-md-3">
        <div class="col-10 ">
            <div class="card p-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-3 text-primary">Booking a trip</h4>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm table-nowrap table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Trip Name</th>
                                <th>Customer Name</th>
                                <th>Mobile Number</th>
                                <th>Journey From</th>
                                <th>Journey To</th>
                                <th>Ticket Quantity</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $key => $ticket)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $ticket->trip->name }}</td>
                                    <td>{{ $ticket->user->name }}</td>
                                    <td>{{ $ticket->user->mobile }}</td>
                                    <td>{{ optional($ticket->trip->endLocation)->name }}</td>
                                    <td>{{ optional($ticket->trip->startLocation)->name }}</td>
                                    <td class="ps-4">{{ $ticket->quantity }}</td>
                                    <td>{{ $ticket->trip->date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col-->
@endsection
