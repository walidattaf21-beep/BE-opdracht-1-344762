<?php

namespace App\Http\Controllers;

use App\Models\Leverancier;
use App\Models\Magazijn;

class MagazijnController extends Controller
{
    private Magazijn $magazijnModel;
    private Leverancier $leverancierModel;

    public function __construct()
    {
        $this->magazijnModel = new Magazijn();
        $this->leverancierModel = new Leverancier();
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

    /**
     * Detailscherm Levering Informatie van een product
     */
    public function levering(int $productId)
    {
        $product = $this->magazijnModel->getByProductId($productId);

        if ($product === null) {
            return redirect()->route('magazijn.index');
        }

        $leverancier = $this->leverancierModel->getLeverancierByProductId($productId);
        $leveringen  = $this->leverancierModel->getLeveringenByProductId($productId);

        // Scenario_02: geen voorraad van dit product in het magazijn
        $geenVoorraad = empty($product->AantalAanwezig);

        // De verwachte eerstvolgende levering staat bij de laatste levering
        $laatsteLevering  = end($leveringen) ?: null;
        $volgendeLevering = $laatsteLevering?->DatumEerstVolgendeLevering;

        return view('magazijn.levering', [
            'title'            => 'Levering Informatie',
            'product'          => $product,
            'leverancier'      => $leverancier,
            'leveringen'       => $leveringen,
            'geenVoorraad'     => $geenVoorraad,
            'volgendeLevering' => $volgendeLevering,
        ]);
    }
}
