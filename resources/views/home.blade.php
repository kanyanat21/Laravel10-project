@extends('layouts.app')
@section('title', '1')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user() && Auth::user()->is_admin === 1)
                        <a href="/author/create">เพิ่มข้อมูล</a>
                        <a href="/author/user">จัดการผู้ใช้งาน</a>
                    @endif 
                    <a>คุณได้เข้าสู่ระบบเรียบร้อย</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
