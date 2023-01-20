@extends('layouts.app')
@section('content')
<div id="main">
    <div id="contentContainer">

        @livewire('dashboard.dashboard')
        <!-- Page Header -->
        {{-- <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome Admin!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mb-4">
                <div class="card dash-widget">
                    <div class="card-body shadow"> <span class="dash-widget-icon"><i class="fa-solid fa-user-injured" aria-hidden="true"></i></span>
                        <div class="dash-widget-info">
                            <h3></h3> <span>Patients</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mb-4">
                <div class="card dash-widget">
                    <div class="card-body shadow"> <span class="dash-widget-icon"><i class="fa-solid fa-bed-pulse" aria-hidden="true"></i></span>
                        <div class="dash-widget-info">
                            <h3></h3> <span>Inpatients</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mb-4">
                <div class="card dash-widget">
                    <div class="card-body shadow"> <span class="dash-widget-icon"><i class="fa-solid fa-wheelchair" aria-hidden="true"></i></span>
                        <div class="dash-widget-info">
                            <h3></h3> <span>Outpatients</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mb-4">
                <div class="card dash-widget">
                    <div class="card-body shadow"> <span class="dash-widget-icon"><i class="fa-solid fa-user" ria-hidden="true"></i></span>
                        <div class="dash-widget-info">
                            <h3></h3> <span>Users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>  --}}
    </div>
</div>

@endsection
