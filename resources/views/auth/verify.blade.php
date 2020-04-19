@extends('layouts.app')

@section('login')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 px-0">
            <div class="card" style="border: none">

                <div class="card-body text-center" style="padding: 1.25rem 1rem">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p>{{ __('Please check your email for a verification.') }}</p>
                    <br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Resent mail for verification') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
