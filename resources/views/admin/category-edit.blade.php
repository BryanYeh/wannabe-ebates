@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')Edit {{ $category->name }} @endsection

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
            <form class="form-horizontal" action="{{ route('admin.category.update',['category' => $category->slug ]) }}" method="post">
                <div class="card-header">Edit {{ $category->name }}</div>
                <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="name">Name</label>
                        <div class="col-md-10">
                            <input class="form-control" id="name" type="text" name="name" placeholder="Name" value="{{ $category->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="parent">Parent</label>
                        <div class="col-md-10">
                            <select class="form-control" id="parent" name="parent" googl="true">
                                <option value="0" {{ $category->parent == 0 ? 'selected' : '' }}>None</option>
                                @foreach($categories as $acategory)
                                <option value="{{ $acategory->id }}" {{ $category->parent == $acategory->id ? 'selected' : '' }}>{{ $acategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="title">Title</label>
                        <div class="col-md-10">
                            <input class="form-control" id="title" type="text" name="title" placeholder="Title" value="{{ $category->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="slug">Slug</label>
                        <div class="col-md-10">
                            <input class="form-control" id="slug" type="text" name="slug" placeholder="Slug" value="{{ $category->slug }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="description">Description</label>
                        <div class="col-md-10">
                            <textarea name="description" id="description">{!! $category->description !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="meta_description">Meta Description</label>
                        <div class="col-md-10">
                            <textarea  class="form-control" id="meta_description" name="meta_descripton">{{ $category->meta_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="name">Meta Keywords</label>
                        <div class="col-md-10">
                            <input class="form-control" id="name" type="text" name="meta_keywords" placeholder="meta keywords" value="{{ $category->meta_keywords }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-10 col-form-label">
                            <div class="form-check checkbox">
                                <input class="form-check-input" id="status" name="status" type="checkbox" value="" {{ $category->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="status" googl="true">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="position">Position</label>
                        <div class="col-md-10">
                            <input class="form-control" id="position" type="number" name="position" value="{{ $category->position }}">
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection