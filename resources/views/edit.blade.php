@extends('layouts.app')
@section('title', 'แก้ไขรายละเอียด')
@section('content')
    <h2 class="text text-center py-2">แก้ไขรายละเอียด</h2>
    <form method="POST" action="{{route('blogupdate',$blog->id)}}">
        @csrf
        <div class="form-group">
            <label for="title">ชื่อสถานที่</label>
            <input type="text" name="title" class="form-control" value="{{$blog->title}}">
        </div>
        @error('title')
            <div class="my-2">
                <span class="text-danger">{{$message}}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="content">รายละเอียด</label>
            <textarea name="content" cols="30" rows="5" class="form-control" id="content">{{$blog->content}}</textarea>
        </div>
        @error('content')
            <div class="my-2">
                <span class="text-danger">{{$message}}</span>
            </div>
        @enderror
        <input type="submit" value="อัปเดต" class="btn btn-primary my-3">
        <a href="/author/blog" class="btn btn-success">ทั้งหมด</a>
    </form>
    <script>
        ClassicEditor
            .create( document.querySelector('#content'))
            .catch( error => {
                console.error( error );
            });
    </script>  
@endsection
