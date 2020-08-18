<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $ttl = 60;

        // return Cache::remember('catalogs', $ttl, function () {
        $catalogs = Catalog::all();

        $result = [];
        foreach ($catalogs as $catalog) {
            $table = $catalog['name'];
            $result[$table] = DB::table($table)->get();
        }

        return $result;
        // });
    }
}
