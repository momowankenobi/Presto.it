<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name'=>'Motori', 'bgcolor'=>'bg-darker', 'color'=>'text-darker', 'icon'=>'fas fa-car fa-5x'],
            ['name'=>'Informatica', 'bgcolor'=>'bg-danger', 'color'=>'text-danger', 'icon'=>'fas fa-laptop-code fa-5x'],
            ['name'=>'Elettrodomestici', 'bgcolor'=>'bg-warning', 'color'=>'text-warning', 'icon'=>'fas fa-blender fa-5x'],
            ['name'=>'Libri', 'bgcolor'=>'bg-info', 'color'=>'text-info', 'icon'=>'fas fa-book fa-5x'],
            ['name'=>'Giochi', 'bgcolor'=>'bg-main', 'color'=>'text-main', 'icon'=>'fas fa-gamepad fa-5x'],
            ['name'=>'Sport', 'bgcolor'=>'bg-blue', 'color'=>'text-blue', 'icon'=>'fas fa-basketball-ball fa-5x'],
            ['name'=>'Immobili', 'bgcolor'=>'bg-red', 'color'=>'text-red', 'icon'=>'fas fa-house-user fa-5x'],
            ['name'=>'Telefonia', 'bgcolor'=>'bg-accent', 'color'=>'text-accent', 'icon'=>'fas fa-mobile-alt fa-5x'],
            ['name'=>'Arredamento', 'bgcolor'=>'bg-success', 'color'=>'text-success', 'icon'=>'fas fa-chair fa-5x']
        ];
        foreach($categories as $category){
            DB::table('categories')->insert([
                'name' => $category['name'],
                'bgcolor' => $category['bgcolor'],
                'color' => $category['color'],
                'icon' => $category['icon'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
