<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CodesImport;

class CodeController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
       return view('admin.import-codes');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function codeImport(Request $request) 
    {
        Excel::import(new CodesImport, $request->file('file')->store('temp'));
        return back();
    }
}
