@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')Edit {{ $affiliate->name }} @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <form action="{{ route('admin.affiliate.update',['affiliate' => $affiliate->slug]) }}" method="POST" enctype="multipart/form-data">
                <div class="card-header">Edit {{ $affiliate->name }}</div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control @if($errors->has('name')) is-invalid @endif" id="name" type="text" name="name" value="@if($errors->has('name')){{ old('name') }}@else{{ $affiliate->name }}@endif">
                        @if($errors->has('name')) <div class="invalid-feedback">{{ $errors->first('name') }}</div> @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="logo">Logo</label>
                        <div class="col-md-10">
                            <p><h5>Current Logo</h5></p>
                            <img src="{{ $affiliate->logo }}" alt="logo">
                            <p><h5>Upload New Logo</h5></p>
                            <input id="logo" type="file" name="logo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input class="form-control @if($errors->has('slug')) is-invalid @endif" id="slug" type="text" name="slug" value="@if($errors->has('slug')){{ old('slug') }}@else{{ $affiliate->slug }}@endif">
                        @if($errors->has('slug')) <div class="invalid-feedback">{{ $errors->first('slug') }}</div> @endif
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input class="form-control @if($errors->has('website')) is-invalid @endif" id="website" type="text" name="website" value="@if($errors->has('website')){{ old('website') }}@else{{ $affiliate->website }}@endif">
                        @if($errors->has('website')) <div class="invalid-feedback">{{ $errors->first('website') }}</div> @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-10 col-form-label">
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="status" name="status" type="checkbox" {{ $affiliate->status ? "checked" : ""}}>
                                <label class="form-check-label" for="status">Enable</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subid">Sub ID</label>
                        <input class="form-control @if($errors->has('subid')) is-invalid @endif" id="subid" type="text" name="subid" value="@if($errors->has('subid')){{ old('subid') }}@else{{ $affiliate->subid }}@endif">
                        @if($errors->has('subid')) <div class="invalid-feedback">{{ $errors->first('subid') }}</div> @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection