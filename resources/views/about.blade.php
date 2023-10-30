@extends('layouts.app')
@section('title', 'Profile')
@section('content')
@auth
    <h2 class="text text-center py-2">Profile</h2>
    <table class="table table-bordered text-center">
        <thead>
            <th scope="col">ชื่อ</th>
            <th scope="col">Email</th>
            <th scope="col">เครื่องมือ</th>
        </thead>
        <tbody>
            @if(auth()->user())
                <tr>
                    <td>{{ auth()->user()->name }}</td>
                    <td>{{ auth()->user()->email }}</td>
                    <td>
                        <a href="{{ route('useredit', auth()->user()->id) }}" class="btn btn-warning">แก้ไขข้อมูล</a>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endauth
@endsection
