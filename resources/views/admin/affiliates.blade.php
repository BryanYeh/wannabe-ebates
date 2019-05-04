@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')Affiliate Networks @endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="nav-icon icon-people"></i> Affiliate Networks
                <div class="card-header-actions">
                    <a class="card-header-action" href="{{ route('admin.affiliate.add') }}">
                        <small class="text-muted"><i class="fas fa-plus"></i> Add New Affiliate Network</small>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($affiliates as $affiliate)
                        <tr>
                            <td>{{ $affiliate->name }}</td>
                            <td><img src="{{ $affiliate->logo }}" alt=""></td>
                            <td>{{ $affiliate->status }}</td>
                            <td>
                                <a href="{{ route('admin.affiliate.edit',['affiliate' => $affiliate->slug ]) }}" class="btn btn-xs btn-primary"><i class="nav-icon icon-note"></i> Edit</a>
                                <a href="{{ route('admin.affiliate.view',['affiliate' => $affiliate->slug ]) }}" class="btn btn-xs btn-primary"><i class="nav-icon icon-magnifier"></i> View</a>
                            </td>
                        </tr>                            
                        @endforeach
                    </tbody>
                </table>
                {{ $affiliates->links() }}
            </div>
        </div>
    </div>
</div>
@endsection