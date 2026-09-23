<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GebruikerController extends Controller
{
    /**
     * Overzicht van alle gebruikers met hun rol (alleen voor admin).
     */
    public function index()
    {
        $gebruikers = DB::select(
            'SELECT name, email, rol FROM users ORDER BY rol ASC, name ASC'
        );

        return view('gebruikers.index', [
            'title'      => 'Overzicht Gebruikers',
            'gebruikers' => $gebruikers,
        ]);
    }
}
