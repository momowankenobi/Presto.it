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
            ['name'=>'Motori', 'bgcolor'=>'bg-night', 'hexcolor'=>'#23395B', 'color'=>'text-night', 'icon'=>'fas fa-car fa-5x', 'image'=>'/categories/motori.png'],
            ['name'=>'Informatica', 'bgcolor'=>'bg-danger', 'hexcolor'=>'#DC3545', 'color'=>'text-danger', 'icon'=>'fas fa-laptop-code fa-5x', 'image'=>'/categories/informatica.png'],
            ['name'=>'Elettrodomestici', 'bgcolor'=>'bg-warning', 'hexcolor'=>'#FFC107', 'color'=>'text-warning', 'icon'=>'fas fa-blender fa-5x', 'image'=>'/categories/elettrodomestici.png'],
            ['name'=>'Libri', 'bgcolor'=>'bg-info', 'hexcolor'=>'#0DCAF0', 'color'=>'text-info', 'icon'=>'fas fa-book fa-5x', 'image'=>'/categories/libri.png'],
            ['name'=>'Giochi', 'bgcolor'=>'bg-main', 'hexcolor'=>'#B2FDF8', 'color'=>'text-main', 'icon'=>'fas fa-gamepad fa-5x', 'image'=>'/categories/giochi.png'],
            ['name'=>'Sport', 'bgcolor'=>'bg-blue', 'hexcolor'=>'#45A29E', 'color'=>'text-blue', 'icon'=>'fas fa-basketball-ball fa-5x', 'image'=>'/categories/sport.png'],
            ['name'=>'Immobili', 'bgcolor'=>'bg-red', 'hexcolor'=>'#FF7575', 'color'=>'text-red', 'icon'=>'fas fa-house-user fa-5x', 'image'=>'/categories/immobili.png'],
            ['name'=>'Telefonia', 'bgcolor'=>'bg-accent', 'hexcolor'=>'#B4B9FD', 'color'=>'text-accent', 'icon'=>'fas fa-mobile-alt fa-5x', 'image'=>'/categories/telefonia.png'],
            ['name'=>'Arredamento', 'bgcolor'=>'bg-success', 'hexcolor'=>'#198754', 'color'=>'text-success', 'icon'=>'fas fa-chair fa-5x', 'image'=>'/categories/arredamento.png']
        ];
        foreach($categories as $category){
            DB::table('categories')->insert([
                'name' => $category['name'],
                'bgcolor' => $category['bgcolor'],
                'color' => $category['color'],
                'icon' => $category['icon'],
                'hexcolor'=>$category['hexcolor'],
                'image'=>$category['image'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
