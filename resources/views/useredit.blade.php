@extends('layouts.app')
@section('title', 'แก้ไขข้อมูลผู้ใช้')
@section('content')
    <h2 class="text text-center py-2">แก้ไขข้อมูลผู้ใช้</h2>
    <form method="POST" action="{{ route('aboutupdate', $user->id) }}"> 
        @csrf
        <div class="form-group">
            <label for="name">ชื่อ</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>
        @error('name')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="email">อีเมล</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>
        @error('email')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="password">รหัสผ่านใหม่</label>
            <input type="password" name="password" class="form-control" placeholder="ป้อนรหัสผ่านใหม่">
        </div>
        @error('password')
            <div class="my-2">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror

        <input type="submit" value="อัปเดตข้อมูล" class="btn btn-primary my-3">
        {{-- <a href="/author/about" class="btn btn-success">กลับ</a> --}}

    </form>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
    </section>
@endsection
