<?php namespace App\Http\Middleware;

use Closure;

class StoreVerify
{
    public function handle($request, Closure $next)
    {
        if(! \Cart::isEmpty()){
          return $next($request);
        }
        return redirect('store');
    }
}
