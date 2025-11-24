<?php

namespace App\Observers;

use App\Models\Production;
use App\Models\Warehouse;

class ProductionObserver
{
    /**
     * Handle the Production "created" event.
     */
    public function created(Production $production): void
    {
        $warehouse = Warehouse::firstOrNew([
            'product_id' => $production->product_id,
            'date'       => $production->production_date,
        ]);

        // kalau record baru, set stok awal
        if (!$warehouse->exists) {
            $warehouse->stock = 0;
        }

        // tambahkan quantity produksi ke stok
        $warehouse->stock += $production->quantity;
        $warehouse->save();
    }


    /**
     * Handle the Production "updated" event.
     */
    public function updated(Production $production): void
    {
    // DATA LAMA
    $oldProductId  = $production->getOriginal('product_id');
    $oldQuantity   = $production->getOriginal('quantity');
    $oldDate       = $production->getOriginal('production_date');

    // DATA BARU
    $newProductId  = $production->product_id;
    $newQuantity   = $production->quantity;
    $newDate       = $production->production_date;

    // 1. kurangi stok warehouse berdasarkan data lama
    $oldWarehouse = Warehouse::where('product_id', $oldProductId)
        ->where('date', $oldDate)
        ->first();

    if ($oldWarehouse) {
        $oldWarehouse->stock -= $oldQuantity;
        if ($oldWarehouse->stock <= 0) {
            $oldWarehouse->delete();
        } else {
            $oldWarehouse->save();
        }
    }

    // 2. tambahkan stok ke warehouse berdasarkan data baru
    $newWarehouse = Warehouse::firstOrNew([
        'product_id' => $newProductId,
        'date'       => $newDate,
    ]);

    if (!$newWarehouse->exists) {
        $newWarehouse->stock = 0;
    }

    $newWarehouse->stock += $newQuantity;
    $newWarehouse->save();
}


    /**
     * Handle the Production "deleted" event.
     */
    public function deleted(Production $production): void
    {
        $warehouse = Warehouse::where('product_id', $production->product_id)
                              ->where('date', $production->production_date)
                              ->first();

        if ($warehouse) {
            $warehouse->stock -= $production->quantity;

            // kalau stok jadi 0, bisa pilih: hapus record atau biarkan 0
            if ($warehouse->stock <= 0) {
                $warehouse->delete();
            } else {
                $warehouse->save();
            }
        }
    }



    /**
     * Handle the Production "restored" event.
     */
    public function restored(Production $production): void
    {
        //
    }

    /**
     * Handle the Production "force deleted" event.
     */
    public function forceDeleted(Production $production): void
    {
        //
    }
}
