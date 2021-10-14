@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Quý khách vui lòng kích hoạt Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Hệ thống đã gửi lại mail cho quý khách.') }}
                        </div>
                    @endif

                    {{ __('Quý khách vui lòng kiểm tra mail để kích hoạt. ') }}
                    {{ __('Nếu quý khách không nhận được mail vui lòng nhấn nút kích hoạt phía dưới.') }}
                    <br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary" style="color: white; margin-left: 300px;">{{ __('Gửi lại mã') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
