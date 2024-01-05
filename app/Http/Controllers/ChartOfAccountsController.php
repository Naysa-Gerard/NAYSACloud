<?php

namespace App\Http\Controllers;
Use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ChartOfAccountsController extends Controller
{
    public function index()
    {
        $coaGetData = DB::select("exec sp_chartsOfAccounts 'LoadAll' ");
        $jsonData = json_encode($coaGetData);

        return new Response($jsonData, 200, ['Content-Type' => 'application/json']);

    }

    public function upsert()
    {
        
    }
}
