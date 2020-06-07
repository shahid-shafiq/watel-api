<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = factory(Client::class)->make();
        $client->save();
        //DB::table('clients')->insert($client);
    }
}
