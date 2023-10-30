@extends('layouts.app')
@section('title', 'หน้าแรก')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ยินดีต้อนรับ</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div id="carouselExampleCaptions" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    {{-- <img src="https://i.pinimg.com/originals/38/a3/e1/38a3e19bb435beb1a639cbde14ed12fd.jpg"
                                        height="auto" width="50" class="d-block w-100" alt="..."> --}}
                                    <div class="carousel-caption d-none d-md-block">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>กรุณาเข้าสู่ระบบหรือสมัครสมาชิก</p>
                        @auth
                            <div class="contener mt-2">
                                <div class="row">
                                    <div class="text-center">
                                        <h1>รายการ</h1>
                                    </div>
                                    @foreach ($blogs as $item)
                                        <h2>{{ $item->title }}</h2>
                                        <p>{!! Str::limit($item->content, 100) !!}</p>
                                        <a href="/detail/{{ $item->id }}">ดูเพิ่มเติม</a>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
