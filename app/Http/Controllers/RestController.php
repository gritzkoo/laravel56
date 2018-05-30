<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestController extends Controller
{
    public function intercept(Request $request)
    {
        $data = $request->all();
        return $this->_callService($data['Request']['Service'],$data['Request']['Method'],$data['Request']['Params']);
    }
}
