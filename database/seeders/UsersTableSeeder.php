<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $yoneticiRole = Role::where('name','Yönetici')->first();
        $daireRole = Role::where('name','Daire Sakini')->first();
        $gorevliRole = Role::where('name','Görevli')->first();

        $yonetici = User::create([
            'user_type' => 1,
            'aktif_mi' => 1,
            'adsoyad' => 'Yönetici',
            'email' => 'yonetici@yonetici.com',
            'password' => Hash::make('password')
        ]);

        $kullanici = User::create([
            'user_type' => 2,
            'aktif_mi' => 1,
            'adsoyad' => 'Daire Sakini',
            'email' => 'kullanici@kullanici.com',
            'password' => Hash::make('password')
        ]);  
        
        $gorevli = User::create([
            'user_type' => 3,
            'aktif_mi' => 1,
            'adsoyad' => 'Görevli',
            'email' => 'gorevli@gorevli.com',
            'password' => Hash::make('password')
        ]);  

        $yonetici->roles()->attach($yonetici);
        $kullanici->roles()->attach($kullanici);
        $gorevli->roles()->attach($gorevli);
    }
}
