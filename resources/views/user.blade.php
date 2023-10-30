@extends('layouts.app')
@section('title', 'รายชื่อทั้งหมด')
@section('content')
    @if (Auth::user() && Auth::user()->is_admin === 0)
        <h2 class="text text-center py-2">Profile</h2>
        <table class="table table-bordered text-center">
            <thead>
                <th scope="col">ชื่อ</th>
                <th scope="col">Email</th>
                <th scope="col">เครื่องมือ</th>
            </thead>
            <tbody>
                @if (auth()->user())
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
    @endif

    @if (Auth::user() && Auth::user()->is_admin === 1)
        <h2 class="text text-center py-2">จัดการผู้ใช้งาน</h2>
        <table class="table table-bordered text-center">
            <thead>
                <th scope="col">ชื่อ</th>
                <th scope="col">Email</th>
                <th scope="col">เครื่องมือ</th>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    @if ($item->is_admin == 0)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a href="{{ route('useredit', $item->id) }}" class="btn btn-warning">แก้ไข</a>
                                <a href="{{ route('delete', $item->id) }}" class="btn btn-danger"
                                    onclick="return confirm('คุณต้องการลบรายการ {{ $item->title }} หรือไม่ ?')">ลบ
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
