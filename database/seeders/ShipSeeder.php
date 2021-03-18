<?php

namespace Database\Seeders;

use App\Models\Ship;
use App\Models\ShipOperation;
use App\Models\ShipReport;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ShipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ship::create([
            'name' => 'KM. EXPRESS BAHARI BE',
            'type' => 'Non Cepat (Ro-Ro)',
            'max_pax' => 100,
            'max_vehicle_wheel_2' => 30,
            'max_vehicle_wheel_4' => 20,
        ]);
        Ship::create([
            'name' => 'KM. NATUNA EXPRESS',
            'type' => 'Non Cepat (Ro-Ro)',
            'max_pax' => 150,
            'max_vehicle_wheel_2' => 10,
            'max_vehicle_wheel_4' => 10,
        ]);
        Ship::create([
            'name' => 'KMP. GILIYANG',
            'type' => 'Non Cepat (Ro-Ro)',
            'max_pax' => 200,
            'max_vehicle_wheel_2' => 30,
            'max_vehicle_wheel_4' => 10,
        ]);

        return 0;
        // 
        ShipOperation::create([
            'ship_id' => 1,
            'date' => Carbon::parse('04-03-2021'),
            'status' => 'Beroperasi',
            'description' => 'Aman',
            'location' => 'Gresik'
        ]);
        ShipOperation::create([
            'ship_id' => 2,
            'date' => Carbon::parse('05-03-2021'),
            'status' => 'Beroperasi',
            'description' => 'Aman',
            'location' => 'Gresik'
        ]);
        ShipOperation::create([
            'ship_id' => 3,
            'date' => Carbon::parse('06-03-2021'),
            'status' => 'Tidak Beroperasi',
            'description' => 'Aman',
            'location' => 'Gresik'
        ]);
        ShipOperation::create([
            'ship_id' => 3,
            'date' => Carbon::parse('07-03-2021'),
            'status' => 'Tidak Beroperasi',
            'description' => 'Aman',
            'location' => 'Gresik'
        ]);
        ShipOperation::create([
            'ship_id' => 1,
            'date' => Carbon::parse('12-03-2021'),
            'status' => 'Beroperasi',
            'description' => 'Aman',
            'location' => 'Gresik'
        ]);

        // 
        ShipReport::create([
            'user_id' => 2,
            'ship_id' => 1,
            'route_id' => 1,
            'date' => Carbon::parse('04-03-2021'),
            'time' => Carbon::parse('10:00'),
            'count_adult' => 10,
            'count_baby' => 20,
            'count_security_forces' => 0,
            'count_vehicle_wheel_2' => 15,
            'count_vehicle_wheel_4' => 5,
            'photo_embarkation' => null,
            'photo_departure' => null,
        ]);
        ShipReport::create([
            'user_id' => 2,
            'ship_id' => 1,
            'route_id' => 1,
            'date' => Carbon::parse('12-03-2021'),
            'time' => Carbon::parse('10:00'),
            'count_adult' => 30,
            'count_baby' => 30,
            'count_security_forces' => 0,
            'count_vehicle_wheel_2' => 5,
            'count_vehicle_wheel_4' => 5,
            'photo_embarkation' => null,
            'photo_departure' => null,
        ]);
        ShipReport::create([
            'user_id' => 2,
            'ship_id' => 1,
            'route_id' => 2,
            'date' => Carbon::parse('05-03-2021'),
            'time' => Carbon::parse('15:00'),
            'count_adult' => 10,
            'count_baby' => 20,
            'count_security_forces' => 0,
            'count_vehicle_wheel_2' => 15,
            'count_vehicle_wheel_4' => 5,
            'photo_embarkation' => null,
            'photo_departure' => null,
        ]);
    }
}