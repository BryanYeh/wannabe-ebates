@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')Add Member @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <form action="{{ route('admin.member.create') }}" method="POST">
                <div class="card-header">Add Member</div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input class="form-control @if($errors->has('first_name')) is-invalid @endif" id="first_name" type="text" name="first_name" value="@if($errors->has('first_name')){{ old('first_name') }}@endif">
                        @if($errors->has('first_name')) <div class="invalid-feedback">{{ $errors->first('first_name') }}</div> @endif
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input class="form-control @if($errors->has('last_name')) is-invalid @endif" id="last_name" type="text" name="last_name" value="@if($errors->has('last_name')){{ old('last_name') }}@endif">
                        @if($errors->has('last_name')) <div class="invalid-feedback">{{ $errors->first('last_name') }}</div> @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control @if($errors->has('email')) is-invalid @endif" id="email" type="email" name="email" value="@if($errors->has('email')){{ old('email') }}@endif">
                        @if($errors->has('email')) <div class="invalid-feedback">{{ $errors->first('email') }}</div> @endif
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
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">Create and Send Email</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection