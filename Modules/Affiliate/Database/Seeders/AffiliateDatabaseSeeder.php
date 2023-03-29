<?php

namespace Modules\Affiliate\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Affiliate\Entities\Affiliate;

class AffiliateDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $aff = Affiliate::create([
            'name' => 'Main Affiliate',
            'email' => 'main.affiliate' . rand(1, 9) . '@gmail.com',
            'password' => Hash::make('12345678'),
            'promo_code' => 'secret',
            'commission' => '20', // in percentage
        ]);
        $aff->assignRole('affiliate');

        $affiliateIds = [];
        for ($x = 0; $x <= 4; $x++) {
            $affiliate1 = Affiliate::create([
                'name' => 'Affiliate',
                'email' => 'affiliate' . $x . '@gmail.com',
                'password' => Hash::make('12345678'),
                'promo_code' => $x,
                'parent_id' => $aff->id,
                'commission' => '20', // in percentage
            ]);
            $affiliate1->assignRole('affiliate');
            $affiliateIds[] = $affiliate1->id;
        }
        foreach ($affiliateIds as $affiliateId) {
            for ($x = count($affiliateIds) + 1; $x <= count($affiliateIds) + 4; $x++) {
                $affiliate2 = Affiliate::create([
                    'name' => 'Affiliate',
                    'email' => 'affiliate' . rand(100, 699) . $x . time() . '@gmail.com',
                    'password' => Hash::make('12345678'),
                    'promo_code' => $x,
                    'parent_id' => $affiliateId,
                    'commission' => '20', // in percentage
                ]);
                $affiliate2->assignRole('affiliate');
                $affiliate2Ids[] = $affiliate2->id;
            }
        }

        foreach ($affiliate2Ids as $affiliateId) {
            for ($x = count($affiliateIds) + 1; $x <= count($affiliateIds) + 4; $x++) {
                $affiliate3 = Affiliate::create([
                    'name' => 'Affiliate',
                    'email' => 'affiliate' . rand(700, 1200) . $x . time() . '@gmail.com',
                    'password' => Hash::make('12345678'),
                    'promo_code' => $x,
                    'parent_id' => $affiliateId,
                    'commission' => '20', // in percentage
                ]);
                $affiliate3->assignRole('affiliate');
                $affiliate3Ids[] = $affiliate3->id;
            }
        }

        foreach ($affiliate3Ids as $affiliateId) {
            for ($x = count($affiliateIds) + 1; $x <= count($affiliateIds) + 4; $x++) {
                $affiliate4 = Affiliate::create([
                    'name' => 'Affiliate',
                    'email' => 'affiliate' . rand(1201, 1600) . uniqid() . time() . '@gmail.com',
                    'password' => Hash::make('12345678'),
                    'promo_code' => $x,
                    'parent_id' => $affiliateId,
                    'commission' => '20', // in percentage
                ]);
                $affiliate4->assignRole('affiliate');
            }
        }
//        for ($x = 0; $x <= 100; $x++) {
//            DownLine::create([
//                'referring_id' => rand(1, 100),
//                'referred_id' => rand(1, 100),
//                'commission' => $x + 1, // in percentage
//                'level' => $x,
//            ]);
//        }
//        DownLine::create([
//            'referring_id' => $aff->id,
//            'referred_id' => 2,
//            'commission' => '10', // in percentage
//            'level' => 1,
//        ]);

        // $this->call("OthersTableSeeder");
    }
}
