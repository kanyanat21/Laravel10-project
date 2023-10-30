@extends('layouts.app')
@section('title', 'รายการทั้งหมด')
@section('content')
    @if (count($blogs) > 0)
        <h2 class="text text-center py-2">รายการทั้งหมด</h2>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ชื่อสถานที่</th>
                    <th scope="col">รายละเอียด</th>
                    @if (Auth::user() && Auth::user()->is_admin === 1)
                        <th scope="col">สถานะ</th>
                        <th scope="col">เครื่องมือ</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{!! Str::limit($item->content, 100) !!}</td>

                        @if (Auth::user() && Auth::user()->is_admin === 1)
                            <td>
                                @if ($item->status == true)
                                    <a href="{{ route('change', $item->id) }}" class="btn btn-success">พร้อมเปิดใช้งาน</a>
                                @else
                                    <a href="{{ route('change', $item->id) }}" class="btn btn-secondary">ไม่พร้อมใช้งาน</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit', $item->id) }}" class="btn btn-warning">แก้ไข</a>
                                <a href="{{ route('delete', $item->id) }}" class="btn btn-danger"
                                    onclick="return confirm('คุณต้องการลบรายการ {{ $item->title }} หรือไม่ ?')">ลบ
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blogs->links() }}
    @else
        <h2 class="text text-center py-2">ไม่มีข้อมูลในระบบ</h2>
    @endif
@endsection
