<?php

namespace App\Http\Controllers;

use App\Models\Magazijn;

class MagazijnController extends Controller
{
    private Magazijn $magazijnModel;

    public function __construct()
    {
        $this->magazijnModel = new Magazijn();
    }

    /**
     * Scherm Overzicht Magazijn Jamin
     */
    public function index()
    {
        $producten = $this->magazijnModel->getOverzicht();

        return view('magazijn.index', [
            'title'     => 'Overzicht Magazijn Jamin',
            'producten' => $producten,
        ]);
    }
}
