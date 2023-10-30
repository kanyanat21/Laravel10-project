<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;

class CompaniesController extends Controller
{
    //
    function index(){
        $company=company::orderByDesc('id')->where('status',true)->get();
        return view('welcome',compact('company'));
    }
    function detail($id){
        $company=company::find($id);
        return view('detail',compact('company'));
    }
}
