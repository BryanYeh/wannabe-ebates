@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')Edit {{ $retailer->name }} @endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.2/tinymce.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#description'
    });
    tinymce.init({
        selector: '#conditions'
    });
    $('#start_date').datetimepicker({
        defaultDate: "{{ $retailer->start_date }}",
        format: "YYYY-MM-DD HH:mm:ss"
    });
    $('#end_date').datetimepicker({
        defaultDate: "{{ $retailer->end_date }}",
        format: "YYYY-MM-DD HH:mm:ss"
    });
</script>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="card-header">Edit Retailer</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="name">Name</label>
                        <div class="col-md-10">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Name" value="{{ $retailer->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="website">Website</label>
                        <div class="col-md-10">
                            <input class="form-control" id="website" type="text" name="website" placeholder="Website Link" value="{{ $retailer->website }}">
                        </div>
                    </div>

                    <p><strong>Logo</strong>: {{ $retailer->logo }}</p>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="tracking-link">Tracking Link</label>
                        <div class="col-md-10">
                            <input class="form-control" id="tracking-link" type="text" name="tracking-link" placeholder="Tracking Link" value="{{ $retailer->tracking_link }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="program_id">Program Id</label>
                        <div class="col-md-10">
                            <input class="form-control" id="program_id" type="text" name="program_id" placeholder="Program Id" value="{{ $retailer->program_id }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="description">Description</label>
                        <div class="col-md-10">
                            <textarea id="description">{!! $retailer->description !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="conditions">Conditions</label>
                        <div class="col-md-10">
                            <textarea id="conditions">{!! $retailer->conditions !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="tags">Tags</label>
                        <div class="col-md-10">
                            <input class="form-control" id="tags" type="text" name="tags" placeholder="Tags" value="{{ $retailer->tags }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="start_date">Start Date</label>
                        <div class="col-md-10">
                            <input type='text' class="form-control  datetimepicker-input" name="start_date" id="start_date" data-toggle="datetimepicker" data-target="#start_date"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="end_date">Start Date</label>
                        <div class="col-md-10">
                            <input type='text' class="form-control  datetimepicker-input" name="end_date" id="end_date" data-toggle="datetimepicker" data-target="#end_date"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-10 col-form-label">
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="status" type="checkbox" value="" {{ $retailer->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="status" googl="true">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="affiliate_network">Affiliate Network</label>
                        <div class="col-md-10">
                            <select class="form-control" id="affiliate_network" name="affiliate_network" googl="true">
                                @foreach($affiliate_networks as $affiliate_network)
                                <option value="{{ $affiliate_network->id }}" {{ $retailer->affiliateNetwork->id == $affiliate_network->id ? 'selected' : '' }}>{{ $affiliate_network->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Store of Week</label>
                        <div class="col-md-10 col-form-label">
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="store_of_week" type="checkbox" value="" {{ $retailer->store_of_week ? 'checked' : '' }}>
                                <label class="form-check-label" for="store_of_week" googl="true">Yes</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Featured Store</label>
                        <div class="col-md-10 col-form-label">
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="featured_store" type="checkbox" value="" {{ $retailer->featured_store ? 'checked' : '' }}>
                                <label class="form-check-label" for="featured_store" googl="true">Yes</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="name">SEO Name</label>
                        <div class="col-md-10">
                            <input class="form-control" id="name" type="text" name="seo_name" placeholder="seo-name" value="{{ $retailer->seo_title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="meta_description">Meta Description</label>
                        <div class="col-md-10">
                            <textarea  class="form-control" id="meta_description" name="meta_descripton">{{ $retailer->meta_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="name">Meta Keywords</label>
                        <div class="col-md-10">
                            <input class="form-control" id="name" type="text" name="meta_keywords" placeholder="meta keywords" value="{{ $retailer->meta_keywords }}">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.retailer.edit',['reatailer' => $retailer->slug ]) }}" class="btn btn-sm btn-primary">Edit</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection