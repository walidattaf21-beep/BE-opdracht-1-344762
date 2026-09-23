<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Allergeen
{
    /**
     * Haalt alle allergenen van het gekozen product op,
     * gesorteerd op naam oplopend.
     */
    public function getAllergenenByProductId(int $productId): array
    {
        $sql = 'SELECT  ALLE.Naam
                       ,ALLE.Omschrijving
                FROM    ProductPerAllergeen AS PPAL
                INNER JOIN Allergeen AS ALLE
                        ON ALLE.Id = PPAL.AllergeenId
                WHERE   PPAL.ProductId = :productId
                ORDER BY ALLE.Naam ASC';

        return DB::select($sql, ['productId' => $productId]);
    }
}
