<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\User;

class AboutController extends Controller
{
    //
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'email' => 'required|email'
            ],
            [
                'name.required' => 'กรุณากรอกชื่อ',
                'name.max' => 'ชื่อไม่ควรเกิน 50 ตัวอักษร',
                'email.required' => 'กรุณากรอกอีเมล',
                'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง'
            ]
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];

        $user = User::find($id);
        $user->update($data);
        return redirect('/author/user');
    }

}
