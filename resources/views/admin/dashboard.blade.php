@extends('layouts.app')

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script>
        var count = {!! $registered !!};
        var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'];
        var data = [];
        labels.forEach(month => {data.push(count.hasOwnProperty(month) ? count[month] : 0);});
        
        //TODO: MOVE chart creation into JS file
        var lineChart = new Chart($('#members'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Registered Users by Month',
                    backgroundColor: 'rgba(220, 220, 220, 0.2)',
                    borderColor: 'rgba(220, 220, 220, 1)',
                    pointBackgroundColor: 'rgba(220, 220, 220, 1)',
                    pointBorderColor: '#fff',
                    data: data
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endpush

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')Dashboard @endsection

@section('content')
<div class="row">
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <i class="fa fa-users bg-primary p-3 font-2xl mr-3"></i>
                <div>
                    <div class="text-value-sm text-primary">{{ $members }}</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Members</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('admin.members') }}">
                    <span class="small font-weight-bold">View Members</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <i class="fas fa-store bg-primary p-3 font-2xl mr-3"></i>
                <div>
                    <div class="text-value-sm text-primary">{{ $members }}</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Stores</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#">
                    <span class="small font-weight-bold">View Stores</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <i class="fa fa-boxes  bg-primary p-3 font-2xl mr-3"></i>
                <div>
                    <div class="text-value-sm text-primary">{{ $categories }}</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Categories</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#">
                    <span class="small font-weight-bold">View Categories</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <i class="fa fa-tags  bg-primary p-3 font-2xl mr-3"></i>
                <div>
                    <div class="text-value-sm text-primary">{{ $coupons }}</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Coupons</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#">
                    <span class="small font-weight-bold">View Coupons</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">Members Registered in {{ Carbon\Carbon::now()->year }}
                <div class="card-header-actions">
                <a class="card-header-action" href="http://www.chartjs.org" target="_blank">
                    <small class="text-muted">docs</small>
                </a>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-wrapper">
                <canvas id="members"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
