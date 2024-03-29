<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('units')->insert([
      [
        'unit_name' => 'Kilogram',
        'unit_symbol' => 'Kg',
        'active' => 1
      ],
      [
        'unit_name' => 'Pieces',
        'unit_symbol' => 'Pcs',
        'active' => 1
      ],
      [
        'unit_name' => 'Lembar',
        'unit_symbol' => 'Lbr',
        'active' => 1
      ],
      [
        'unit_name' => 'Box',
        'unit_symbol' => 'Box',
        'active' => 1
      ],
      [
        'unit_name' => 'Set',
        'unit_symbol' => 'Set',
        'active' => 1
      ],
      // [
      //   'unit_name' => 'Bottle',
      //   'unit_symbol' => 'Btl'
      // ],
      // [
      //   'unit_name' => 'Tub',
      //   'unit_symbol' => 'Tub'
      // ],
      [
        'unit_name' => 'Kit',
        'unit_symbol' => 'Kit',
        'active' => 1
      ],
      // [
      //   'unit_name' => 'Density of states',
      //   'unit_symbol' => 'Dos'
      // ],
    ]);
  }
}
