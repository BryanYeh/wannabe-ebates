@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page'){{ $affiliate->name }} @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card ">
            <div class="card-header">{{ $affiliate->name }} Information</div>
            <div class="card-body">
                <p><strong>Name</strong>: {{ $affiliate->name }}</p>
                <p><strong>Slug</strong>: {{ $affiliate->slug }}</p>
                <p><strong>Website</strong>: {{ $affiliate->website }}</p>
                <p><strong>Logo</strong>: @if($affiliate->logo)<img src={{ $affiliate->logo }}>@endif</p>
                <p><strong>Status</strong>: {{ $affiliate->status ? 'Active' : 'Inactive' }}</p>
                <p><strong>Sub Id</strong>: {{ $affiliate->subid }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.affiliate.edit',['affiliate' => $affiliate->slug ]) }}" class="btn btn-sm btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection