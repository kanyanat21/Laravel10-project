@extends('layout')
@section('title', 'EDIT')
@section('content')
    <div class="contener mt-2">
        <div class="row">
            <div class="col-lg-12">
                <h2>แก้ไขข้อมูล</h2>
            </div>
            <div>
                <a href="{{ route('companies.index') }}" class="btn btn-primary">กลับ</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group my-2">
                            <strong>ชื่อ</strong>
                            <input type="text" name="name" value="{{ $company->name }}" class="form_control" placeholder="ชื่อ">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-2">
                            <strong>Email</strong>
                            <input type="email" name="email" value="{{ $company->email }}" class="form_control" placeholder="email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-2">
                            <strong>ที่อยู่</strong>
                            <input type="text" name="address" value="{{ $company->address }}" class="form_control" placeholder="ที่อยู่">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
