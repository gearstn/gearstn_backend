<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request)
        //         ->header('Access-Control-Allow-Origin', '*')
        //         ->header('Access-Control-Allow-Methods', '*')
        //         // ->header('Access-Control-Allow-Credentials', true)
        //         ->header('Access-Control-Allow-Headers', 'Origin, Content-Type');


        // return $next($request)
        // ->header('Access-Control-Allow-Origin', 'http://localhost:3000')
        // ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        // ->header('Access-Control-Allow-Headers',' *');

        $response = $next($request);
        $response->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, DELETE');
        $response->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
        // $response->header('Access-Control-Allow-Headers', '*');
        $response->header('Access-Control-Allow-Origin', '*');
        return $response;

                // $response = $next( $request );
                // $response->header( 'Access-Control-Allow-Origin', '*' );
                // $response->header( 'Access-Control-Allow-Headers', 'Origin, Content-Type' );

                // return $response;
    }
}
