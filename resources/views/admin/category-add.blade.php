@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')Add Category @endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.2/tinymce.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#description'
    });
</script>
@endpush

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
    @if (session()->has('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif
        <div class="card">
            <form class="form-horizontal" action="{{ route('admin.category.create') }}" method="post">
                <div class="card-header">Add Category</div>
                <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="name">Name</label>
                        <div class="col-md-10">
                            <input class="form-control @if($errors->has('name')) is-invalid @endif" id="name" type="text" name="name" placeholder="Name" value="@if($errors){{ old('name') }}@endif">
                            @if ($errors->has('name')) <div class="invalid-feedback">{{ $errors->first('name') }}</div> @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="parent">Parent</label>
                        <div class="col-md-10">
                            <select class="form-control @if($errors->has('parent')) is-invalid @endif" id="parent" name="parent" googl="true">

                                <option value="0" @if ($errors->has('parent')){{ old('parent') == 0 ? 'selected' : '' }} @endif >None</option>
                                @foreach($categories as $acategory)
                                <option value="{{ $acategory->id }}" @if ($errors->has('parent')){{ old('parent') == $acategory->id ? 'selected' : '' }}@endif>{{ $acategory->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('parent')) <div class="invalid-feedback">{{ $errors->first('parent') }}</div> @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="title">Title</label>
                        <div class="col-md-10">
                            <input class="form-control @if($errors->has('title')) is-invalid @endif" id="title" type="text" name="title" placeholder="Title" value="@if($errors){{ old('title') }}@endif">
                            @if ($errors->has('title')) <div class="invalid-feedback">{{ $errors->first('title') }}</div> @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="slug">Slug</label>
                        <div class="col-md-10">
                            <input class="form-control @if($errors->has('slug')) is-invalid @endif" id="slug" type="text" name="slug" placeholder="Slug" value="@if($errors){{ old('slug') }}@endif">
                            @if ($errors->has('slug')) <div class="invalid-feedback">{{ $errors->first('slug') }}</div> @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="description">Description</label>
                        <div class="col-md-10">
                            <textarea name="description" id="description">@if($errors){!! old('description') !!}@endif</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="meta_description">Meta Description</label>
                        <div class="col-md-10">
                            <textarea  class="form-control" id="meta_description" name="meta_descripton">@if($errors){{ old('meta_descripton') }}@endif</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="name">Meta Keywords</label>
                        <div class="col-md-10">
                            <input class="form-control" id="name" type="text" name="meta_keywords" placeholder="meta keywords" value="@if($errors){{ old('meta_keywords') }}@endif">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-10 col-form-label">
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="status" name="status" type="checkbox">
                                <label class="form-check-label" for="status" googl="true">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="position">Position</label>
                        <div class="col-md-10">
                            <input class="form-control @if($errors->has('position')) is-invalid @endif" id="position" type="number" name="position" value="@if($errors){{ old('position') }}@endif">
                            @if ($errors->has('position')) <div class="invalid-feedback">{{ $errors->first('position') }}</div> @endif
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection