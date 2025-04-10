<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedMenu();
        $this->seedMenuItem();
    }

    public function seedMenu(){
        for($i=0; $i<5; $i++){
            Menu::create([
                'menu_name'=> fake()->name,
            ]);
        }
    }

    public function seedMenuItem(){
        for($i=1; $i<=5; $i++){
            for($j=1; $j<=5; $j++){
                MenuItem::create([
                    'menu_id'=> $i,
                    'title'=> fake()->name,
                    'url'=> '',
                    'order_index'=> $j,
                ]);
            }
        }
    }
}
