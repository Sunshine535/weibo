<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Echarts;

class EchartsController extends Controller
{
    public function index()
    {
        $echarts = echarts::all();

        return $echarts;
    }
}
