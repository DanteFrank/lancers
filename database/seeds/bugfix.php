<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bugfix extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscription_plans')->insert([
            'name' => 'Starter',
            'description' => 'Starter plan',
            'features' => '{"support": false, "documents": 1, "beta_access": false, "collaborators": 2}',
            'price' => 0.00
        ]);

        DB::table('subscription_plans')->insert([
            'name' => 'Pro_plus',
            'description' => 'Pro Plus plan',
            'features' => '{"support": true, "documents": null, "beta_access": true, "collaborators": null}',
            'price' => 79.99
        ]);
        DB::table('subscription_plans')->insert([
            'name' => 'Pro',
            'description' => 'Pro plan',
            'features' => '{"support": false, "documents": 3, "beta_access": false, "collaborators": 5}',
            'price' => 24.99
        ]);
        DB::table('countries')->insert([
            'name' => 'Nigeria',

        ]);
        DB::table('countries')->insert([
            'name' => 'France',

        ]);
        DB::table('countries')->insert([
            'name' => 'Zambia',

        ]);
        DB::table('states')->insert([
            'name' => 'Lagos',
            'country_id' => 1
        ]);
        DB::table('states')->insert([
            'name' => 'Abia',
            'country_id' => 1
        ]);
        DB::table('states')->insert([
            'name' => 'Abuja',
            'country_id' => 1
        ]);
        DB::table('currencies')->insert([
            'name' => 'US DOLLAR',
            'code'=> 'USD',
            'symbol' => '$'
        ]);
        DB::table('currencies')->insert([
            'name' => 'BRITISH POUNDS',
            'code'=> 'NGR',
            'symbol' => 'N'
        ]);
    }
}
