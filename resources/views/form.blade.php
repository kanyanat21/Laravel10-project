@extends('layouts.app')
@section('title', 'เพิ่มข้อมูลใหม่')
@section('content')
    <h2 class="text text-center py-2">เพิ่มข้อมูลใหม่</h2>
    <form method="POST" action="/author/insert">
        @csrf
        <div class="form-group">
            <label for="title">ชื่อสถานที่</label>
            <input type="text" name="title" class="form-control">
        </div>
        @error('title')
            <div class="my-2">
                <span class="text-danger">{{$message}}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="content">รายละเอียด</label>
            <textarea name="content" cols="30" rows="5" class="form-control" id="content"></textarea>
        </div>
        @error('content')
            <div class="my-2">
                <span class="text-danger">{{$message}}</span>
            </div>
        @enderror
        <input type="submit" value="บันทึก" class="btn btn-primary my-3">
        <a href="/author/blog" class="btn btn-success">ดูข้อมูลทั้งหมด</a>
    </form>
    <script>
        ClassicEditor
            .create( document.querySelector('#content'))
            .catch( error => {
                console.error( error );
            });
    </script>    
@endsection
