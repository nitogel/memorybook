<?php

namespace App\Filters;

use Closure;

class SearchByName
{
    public const MAX_INT = 2147483647;

    public function handle($query, Closure $next)
    {
        if (request()->filled('search_by_name')) {
            $query->where(function ($query) {
                $needle = request('search');

                $query->where('first_name', 'ilike', "%$needle%");
                $query->orWhere('last_name', 'ilike', "%$needle%");
            });
        }

        return $next($query);
    }
}
