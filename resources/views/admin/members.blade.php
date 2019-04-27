@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')Members @endsection

@section('content')
<div class="row">
    <div class="col-12">
        @if (session('status'))
        <div class="alert @if (session('status') == 'success') alert-success @else alert-warning @endif alert-dismissible fade show" role="alert" googl="true">
            <strong>{{ title_case(session('status')) }}!</strong> 
                @if (session('status') == 'success')
                    Successfully deleted member.
                @else
                    An error occured while trying to delete the member.
                @endif
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <i class="nav-icon icon-people"></i> Members
                <div class="card-header-actions">
                    <a class="card-header-action" href="{{ route('admin.member.add') }}">
                        <small class="text-muted"><i class="fas fa-user-plus"></i> Add New Member</small>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Total Cashback</th>
                            <th>Signup Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->total_cashback }}</td>
                            <td>{{ Carbon\Carbon::parse($member->created_at)->format("M d,Y") }}</td>
                            <td>
                                <a href="{{ route('admin.member.edit',['user'=>Hashids::encode($member->id)]) }}" class="btn btn-xs btn-primary"><i class="nav-icon icon-note"></i> Edit</a>
                                <a href="{{ route('admin.member.view',['user'=>Hashids::encode($member->id)]) }}" class="btn btn-xs btn-primary"><i class="nav-icon icon-magnifier"></i> View</a>
                                <a href="{{ route('admin.member.remove',['user'=>Hashids::encode($member->id)]) }}" class="btn btn-xs btn-danger"><i class="nav-icon icon-trash"></i> Remove</a>
                            </td>
                        </tr>                            
                        @endforeach
                    </tbody>
                </table>
                {{ $members->links() }}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection