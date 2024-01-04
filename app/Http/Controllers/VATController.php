<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;


class VATController extends Controller
{

    Public function getdata() {
        $data = DB::select("select * from vat");
        echo "<pre>";
        print_r($data);

    }
}

