@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')Retailers @endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="nav-icon icon-people"></i> Retailers
                <div class="card-header-actions">
                    <a class="card-header-action" href="https://datatables.net" target="_blank">
                        <small class="text-muted">docs</small>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Affiliate Network</th>
                            <th>Status</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($retailers as $retailer)
                        <tr>
                            <td>{{ $retailer->id }}</td>
                            <td>{{ $retailer->name }}</td>
                            <td>{{ $retailer->affiliateNetwork->name }}</td>
                            <td>@if($retailer->status) <i class="far fa-check-square"></i> @else <i class="far fa-square"></i> @endif</td>
                            <td>{{ Carbon\Carbon::parse($retailer->created_at)->format("M d,Y") }}</td>
                            <td>
                                <a href="#" class="btn btn-xs btn-primary"><i class="nav-icon icon-note"></i> Edit</a>
                                <a href="#" class="btn btn-xs btn-danger"><i class="nav-icon icon-trash"></i> Remove</a>
                            </td>
                        </tr>                            
                        @endforeach
                    </tbody>
                </table>
                {{ $retailers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection