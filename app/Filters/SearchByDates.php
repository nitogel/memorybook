<?php

namespace App\Filters;

use Carbon\Carbon;
use Closure;

class SearchByDates
{
    public function handle($query, Closure $next)
    {
        if (request()->filled('search_by_dates')) {
            $query->where(function ($query) {
                $date = Carbon::parse(request('search_by_dates'));

                $query->where('birth_date', $date->toDateString());
                $query->orWhere('death_date', $date->toDateString());
            });
        }

        return $next($query);
    }
}
