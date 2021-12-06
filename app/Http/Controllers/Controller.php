<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function($request,$next){
            if (session('success')) {
                alert('berhasil', session('success'), 'success');
            }
            else if (session('failed')) {
                alert('gagal', session('failed'), 'error');
            }
            else if (session('error')){
                alert('error', session('error'), 'error');
            }

            return $next($request);
        });
    }
}
