@extends('layout')
@section('title', 'รายชื่อทั้งหมด')
@section('content')
    <div class="contener mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>รายชื่อทั้งหมด</h2>
            </div>
            <div>
                <a href="{{ route('companies.create') }}" class="btn btn-success">เพิ่มข้อมูล</a>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <a>{{ $message }}</a>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>NO.</th>
                    <th>ชื่อ</th>
                    <th>Email</th>
                    <th width="280px">เครื่องมือ</th>
                </tr>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">แก้ไข</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">ลบ</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $companies->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection
