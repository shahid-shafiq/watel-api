<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insert('Lalazar', 2);
        $this->insert('New Lalazar', 2);
        $this->insert('Lalazar Estate', 2);
        $this->insert('Lal Kurti', 2);
        $this->insert('Satellite Town', 2);
        $this->insert('Saddar', 2);
        $this->insert('Hill View Lane', 2);
        $this->insert('Gulshan Abad', 2);
        $this->insert('Khanna', 2);
        $this->insert('Kahuta', 2);
        $this->insert('6th Road', 2);
        $this->insert('Muslim Town', 2);
        $this->insert('Bahria Town (1-6)', 2);
        $this->insert('Bahria Town (7-9)', 2);

        $this->insert('F-5', 1);
        $this->insert('F-6', 1);
        $this->insert('F-7', 1);
        $this->insert('F-8', 1);
        $this->insert('F-9', 1);
        $this->insert('F-10', 1);
        $this->insert('F-11', 1);

        $this->insert('G-5', 1);
        $this->insert('G-6', 1);
        $this->insert('G-7', 1);
        $this->insert('G-8', 1);
        $this->insert('G-9', 1);
        $this->insert('G-10', 1);
        $this->insert('G-11', 1);

        $this->insert('I-8', 1);
        $this->insert('I-9', 1);
        $this->insert('I-10', 1);
        $this->insert('I-11', 1);

        $this->insert('Rawal Town', 1);
        $this->insert('Burma Town', 1);
        $this->insert('HUmak Town', 1);
        $this->insert('CBR Town', 1);
        $this->insert('Soan Gardan', 1);
        $this->insert('Naval Anchorage', 1);
        $this->insert('Pakistan Town', 1);
        $this->insert('DHA', 1);
    }

    public function insert($area, $c) {
        $area = new Area(['name' => $area, 'city_id' => $c]);
        $area->save();
    }
}
