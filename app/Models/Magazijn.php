<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Magazijn
{
    /**
     * Haalt alle producten op die in het magazijn staan,
     * gesorteerd op barcode oplopend.
     */
    public function getOverzicht(): array
    {
        $sql = 'SELECT  PROD.Id AS ProductId
                       ,PROD.Naam
                       ,PROD.Barcode
                       ,MAGA.VerpakkingsEenheidInKilogram
                       ,MAGA.AantalAanwezig
                FROM    Magazijn AS MAGA
                INNER JOIN Product AS PROD
                        ON PROD.Id = MAGA.ProductId
                WHERE   MAGA.IsActief = 1
                ORDER BY PROD.Barcode ASC';

        return DB::select($sql);
    }
}
