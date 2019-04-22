@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')View Category @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card ">
            <div class="card-header">Category Information</div>
            <div class="card-body">
                <p><strong>Name</strong>: {{ $category->name }}</p>
                @if($category->parent != 0 )<p><strong>Parent</strong>: {{ $category->parent() }}</p>@endif
                <p><strong>Slug</strong>: {{ $category->slug }}</p>
                <p><strong>Description</strong>: {{ $category->description }}</p>
                <p><strong>Position</strong>: {{ $category->position }}</p>
                <p><strong>Status</strong>: {{ $category->status ? 'Active' : 'Inactive' }}</p>

                <p><strong>SEO Title</strong>: {{ $category->title }}</p>
                <p><strong>Meta Description</strong>: {{ $category->meta_description }}</p>
                <p><strong>Meta Keywords</strong>: {{ $category->meta_keywords }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.category.edit',['category' => $category->slug ]) }}" class="btn btn-sm btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection