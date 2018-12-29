@extends('layouts.app')

@section('bodyClass') app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done @endsection

@section('page')Edit Member @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <form action="">
                <div class="card-header">Edit Member</div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input class="form-control" id="first_name" type="text" value="{{ $user->first_name }}">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input class="form-control" id="last_name" type="text" value="{{ $user->last_name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" type="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Reset Password</label>
                            <div>
                                <button class="btn btn-sm btn-primary" type="button">
                                <i class="fa fa-paper-plane"></i> Send Password Reset to Email</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Status</label>
                            <div class="col-md-10 col-form-label">
                                <div class="form-check checkbox">
                                    <input class="form-check-input" id="status" type="checkbox" {{ $user->status ? "checked" : ""}}>
                                    <label class="form-check-label" for="status">Enable</label>
                                </div>
                            </div>
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