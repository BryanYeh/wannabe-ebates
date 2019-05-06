@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')Add Affiliate @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (session()->has('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        <div class="card">
            <form action="{{ route('admin.affiliate.add') }}" method="POST" enctype="multipart/form-data">
                <div class="card-header">Add Affiliate</div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control @if($errors->has('name')) is-invalid @endif" id="name" type="text" name="name" value="{{ old('name') }}">
                        @if($errors->has('name')) <div class="invalid-feedback">{{ $errors->first('name') }}</div> @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="logo">Logo</label>
                        <div class="col-md-10">
                            <input id="logo" type="file" name="logo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input class="form-control @if($errors->has('slug')) is-invalid @endif" id="slug" type="text" name="slug" value="{{ old('slug') }}">
                        @if($errors->has('slug')) <div class="invalid-feedback">{{ $errors->first('slug') }}</div> @endif
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input class="form-control @if($errors->has('website')) is-invalid @endif" id="website" type="text" name="website" value="{{ old('website') }}">
                        @if($errors->has('website')) <div class="invalid-feedback">{{ $errors->first('website') }}</div> @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-10 col-form-label">
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="status" name="status" type="checkbox">
                                <label class="form-check-label" for="status">Enable</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subid">Sub ID</label>
                        <input class="form-control @if($errors->has('subid')) is-invalid @endif" id="subid" type="text" name="subid" value="{{ old('subid') }}">
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