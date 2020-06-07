
<?php

use Illuminate\Database\Seeder;
use App\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insert('Islamabd');
        $this->insert('Rawalpindi');
        $this->insert('Rawat');
        $this->insert('Gojar Khan');
        $this->insert('Hasan Abdal');
        $this->insert('Attok');
        $this->insert('Taxila');
        $this->insert('Wah');
        $this->insert('Murree'); 
    }

    public function insert($ct) {
        $city = new City(['name' => $ct]);
        $city->save();
    }
}
