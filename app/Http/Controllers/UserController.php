<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\ImportUser;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\User;

class UserController extends Controller
{
    public function importView(Request $request){
        return view('importFile');
    }
 
    public function importUser(Request $request){
      // dd('import');
        Excel::import(new ImportUser, $request->file('file'));
        return redirect()->back();
    }
 
    public function exportUser(Request $request){
        // dd('export');
        return Excel::download(new UsersExport, 'users.xlsx');
    }
 
}