<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CleanOrphanedStoreIdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Option 1: Set orphaned `store_id` values to NULL
        DB::table('orders')
            ->whereNotIn('store_id', DB::table('stores')->pluck('id'))
            ->update(['store_id' => null]);

        // Option 2: Delete orders with orphaned `store_id` values
        // Uncomment the line below if you prefer deleting the orphaned orders
        // DB::table('orders')->whereNotIn('store_id', DB::table('stores')->pluck('id'))->delete();
    }
}
