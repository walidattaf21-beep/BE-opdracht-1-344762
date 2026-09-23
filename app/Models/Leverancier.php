<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Leverancier
{
    /**
     * Haalt de leverancier op die het gekozen product levert.
     */
    public function getLeverancierByProductId(int $productId): ?object
    {
        $sql = 'SELECT  DISTINCT
                        LEVE.Id
                       ,LEVE.Naam
                       ,LEVE.ContactPersoon
                       ,LEVE.LeverancierNummer
                       ,LEVE.Mobiel
                FROM    Leverancier AS LEVE
                INNER JOIN ProductPerLeverancier AS PPLE
                        ON PPLE.LeverancierId = LEVE.Id
                WHERE   PPLE.ProductId = :productId
                LIMIT 1';

        $result = DB::select($sql, ['productId' => $productId]);

        return $result[0] ?? null;
    }

    /**
     * Haalt alle leveringen van het gekozen product op,
     * gesorteerd op datum levering oplopend.
     */
    public function getLeveringenByProductId(int $productId): array
    {
        $sql = 'SELECT  PROD.Naam
                       ,PPLE.DatumLevering
                       ,PPLE.Aantal
                       ,PPLE.DatumEerstVolgendeLevering
                FROM    ProductPerLeverancier AS PPLE
                INNER JOIN Product AS PROD
                        ON PROD.Id = PPLE.ProductId
                WHERE   PPLE.ProductId = :productId
                ORDER BY PPLE.DatumLevering ASC';

        return DB::select($sql, ['productId' => $productId]);
    }
}
