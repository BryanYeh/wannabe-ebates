@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')Categories @endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="nav-icon icon-people"></i> Categories
                <div class="card-header-actions">
                    <a class="card-header-action" href="{{ route('admin.category.add') }}">
                        <small class="text-muted"><i class="fas fa-plus"></i> Add New Category</small>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Retailers</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->retailers->count() }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit',['category' => $category->slug ]) }}" class="btn btn-xs btn-primary"><i class="nav-icon icon-note"></i> Edit</a>
                                <a href="{{ route('admin.category.view',['category' => $category->slug ]) }}" class="btn btn-xs btn-primary"><i class="nav-icon icon-magnifier"></i> View</a>
                            </td>
                        </tr>                            
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection