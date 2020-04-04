@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3" >
                    <div class="card-header">Social Service Request</div>
                    <div class="card-body">
                      <h5 class="card-title">0</h5>
                      <p class="card-text">View Request</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Crowd Report</div>
                    <div class="card-body">
                      <h5 class="card-title">5</h5>View Report</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3" >
                    <div class="card-header">Stores Count</div>
                    <div class="card-body">
                      <h5 class="card-title">0</h5>
                      <p class="card-text">View Stores</p>
                    </div>
                  </div>
                </div>
            </div>
            

              
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
