@extends('master')
@section('content')
    <div class="row mt-md-3 bg-danger">
        <div>
            <h4 class="text-primary">Online Ticket Report</h4>
        </div>
        <div class="col-lg-6 col-xl-3">
            <div class="card bg-pattern">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-md bg-blue rounded">
                                <i class="fe-layers avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{ $totalTrips }}</span></h3>
                                <p class="text-muted mb-0 text-truncate">Total Trip</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-lg-6 col-xl-3">
            <div class="card bg-pattern">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md bg-success rounded">
                                <i class="fe-award avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-end">
                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{ $totalUsers }}</span></h3>
                                <p class="text-muted mb-0 text-truncate">Total Customer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card bg-pattern">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md bg-danger rounded">
                                <i class="fe-dollar-sign avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-end">
                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{ $totalTickets }}</span></h3>
                                <p class="text-muted mb-0 text-truncate">Sold Tickets</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-lg-6 col-xl-3">
            <div class="card bg-pattern">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md bg-warning rounded">

                                <i class="fe-delete avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-end">
                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{ $locations }}</span></h3>
                                <p class="text-muted mb-0 text-truncate">Total Locations</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
