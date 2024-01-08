<?php

namespace App\Http\Controllers;
Use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class ChartOfAccountsController extends Controller
{
    public function index()
    {

      
        return view('welcome');
       

    }

    public function getRecord()
    {
        $coaGetData = DB::select("exec sp_chartsOfAccounts 'LoadAll' ");
        return response()->json($coaGetData);

    }
}
