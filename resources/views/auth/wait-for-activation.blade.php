@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Account Activation') }}</div>
                <div class="card-body">
                    <p>{{ __('Your account has been created successfully. Please wait for an administrator to activate your account.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
