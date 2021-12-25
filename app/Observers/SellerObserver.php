<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Seller;

class SellerObserver
{
    /**
     * Handle the seller "created" event.
     *
     * @param  \App\Seller  $seller
     * @return void
     */
    public function created(Seller $seller)
    {
        //
    }

    /**
     * Handle the seller "updated" event.
     *
     * @param  \App\Seller  $seller
     * @return void
     */
    public function updated(Seller $seller)
    {
        $seller->products()->update(['active'=>$seller->active]);
        
    }

    /**
     * Handle the seller "deleted" event.
     *
     * @param  \App\Seller  $seller
     * @return void
     */
    public function deleted(Seller $seller)
    {
        //
    }

    /**
     * Handle the seller "restored" event.
     *
     * @param  \App\Seller  $seller
     * @return void
     */
    public function restored(Seller $seller)
    {
        //
    }

    /**
     * Handle the seller "force deleted" event.
     *
     * @param  \App\Seller  $seller
     * @return void
     */
    public function forceDeleted(Seller $seller)
    {
        //
    }
}
