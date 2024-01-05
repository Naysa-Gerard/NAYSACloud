<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as ResponseFactory; // For formatting responses


class VATController extends Controller
{
    public function getdata()
    {
        $data = DB::select("select * from coa_mast");
        $jsonData = json_encode($data);

        return new Response($jsonData, 200, ['Content-Type' => 'application/json']);

    }
}
