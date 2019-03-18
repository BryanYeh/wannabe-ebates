@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')View Retailer @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card ">
            <div class="card-header">Retailer Information</div>
            <div class="card-body">
                <p><strong>Name</strong>: {{ $retailer->name }}</p>
                <p><strong>Website</strong>: {{ $retailer->website }}</p>
                <p><strong>Logo</strong>: {{ $retailer->logo }}</p>
                <p><strong>Tracking Link</strong>: {{ $retailer->tracking_link }}</p>
                <p><strong>Program ID</strong>: {{ $retailer->program_id }}</p>
                <p><strong>Description</strong>: {{ $retailer->description }}</p>
                <p><strong>Conditions</strong>: {{ $retailer->conditions }}</p>
                <p><strong>Tags</strong>: {{ $retailer->tags }}</p>
                <p><strong>Start Date</strong>: {{ $retailer->start_date }}</p>
                <p><strong>End Date</strong>: {{ $retailer->end_date }}</p>
                <p><strong>Status</strong>: {{ $retailer->status ? 'Active' : 'Inactive' }}</p>
                <p><strong>Affiliate Network</strong>: {{ $retailer->affiliateNetwork->name }}</p>
                <p><strong>Store of the Week</strong>: {{ $retailer->status ? 'Yes' : 'No' }}</p>
                <p><strong>Featured Store</strong>: {{ $retailer->status ? 'Yes' : 'No' }}</p>

                <p><strong>SEO Title</strong>: {{ $retailer->seo_title }}</p>
                <p><strong>Meta Description</strong>: {{ $retailer->meta_description }}</p>
                <p><strong>Meta Keywords</strong>: {{ $retailer->meta_keywords }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.retailer.edit',['reatailer' => $retailer->slug ]) }}" class="btn btn-sm btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection