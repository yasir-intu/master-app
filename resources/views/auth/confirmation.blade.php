@extends('layouts.app')

@section('login')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 px-0">
            <div class="card text-center" style="border: none">

                <div class="card-body">
                   your account is successfully verified
                    <br>
                   <a href="{{ route('admin') }}" style="font-weight: 700">Go to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
