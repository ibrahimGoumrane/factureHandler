<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Cellule;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        $cellules = ['none','nebula', 'nova', 'neutron'];

        foreach ($cellules as $libelle) {
            Cellule::create(['libelle' => $libelle]);
        }


        $roles = ['Chef de project', 'Developpeur', 'Directeur', 'Assistante de direction' ,'Stagiaire'];

        foreach ($roles as $libelle) {
            Role::create(['libelle' => $libelle]);
        }

        $adminRole = Role::where('libelle', 'admin')->first();
        $chefProject = Role::where('libelle', 'Chef de project')->first();
        $assistante = Role::where('libelle', 'Assistante de direction')->first();
        $developper = Role::where('libelle', 'Developpeur')->first();
        $directeur = Role::where('libelle', 'Directeur')->first();
        $stagiaire = Role::where('libelle', 'Stagiaire')->first();
        $none = Cellule::where('libelle', 'none')->first();
        $nebula = Cellule::where('libelle', 'nebula')->first();
        $nova = Cellule::where('libelle', 'nova')->first();
        $neutron = Cellule::where('libelle', 'neutron')->first();

        // Create default admin user
        User::create([
            'first_name' => 'Jihane',
            'last_name' => 'HARZAFI',
            'email' => 'jharzafi@numericway.net',
            'password' => Hash::make('jihane'),
            'is_admin' => true,
            'role_id' => $assistante->id,
            'cellule_id' => $none->id,
        ]);

        // Create another admin user
        User::create([
            'first_name' => 'Youssef',
            'last_name' => 'BOUBIA',
            'email' => 'yboubia@numericway.net',
            'password' => Hash::make('youssef'),
            'is_admin' => true,
            'role_id' => $directeur->id,
            'cellule_id' => $none->id,
        ]);

        // Create users for each cellule with unique roles
        $roles = Role::where('libelle', '!=', 'admin')->get();
        //////users nebule
        User::create([
            'first_name' => 'Fadl',
            'last_name' => 'NADIR',
            'email' => 'fnadir@numericway.net',
            'password' => Hash::make('fadl'),
            'is_admin' => false,
            'role_id' => $chefProject->id,
            'cellule_id' => $nebula->id,
        ]);
        User::create([
            'first_name' => 'Fouad',
            'last_name' => 'NOUIGUA',
            'email' => 'fnouigua@numericway.net',
            'password' => Hash::make('fouad'),
            'is_admin' => false,
            'role_id' => $developper->id,
            'cellule_id' => $nebula->id,
        ]);
        User::create([
            'first_name' => 'Abderahim ',
            'last_name' => 'AIT AMMI',
            'email' => 'aaitammi@numericway.net',
            'password' => Hash::make('abderrahim'),
            'is_admin' => false,
            'role_id' => $developper->id,
            'cellule_id' => $nebula->id,
        ]);
        User::create([
            'first_name' => 'Abrare',
            'last_name' => 'BOUTOUIL',
            'email' => 'aboutouil@numericway.net',
            'password' => Hash::make('abrare'),
            'is_admin' => false,
            'role_id' => $developper->id,
            'cellule_id' => $nebula->id,
        ]);
        /////users neutron
        User::create([
            'first_name' => 'Hamza',
            'last_name' => 'CHOUNAKI',
            'email' => 'hchounaki@numericway.net',
            'password' => Hash::make('hamza'),
            'is_admin' => false,
            'role_id' => $chefProject->id,
            'cellule_id' => $neutron->id,
        ]);
        User::create([
            'first_name' => 'Wissal',
            'last_name' => 'EL WARARI',
            'email' => 'welwarari@numericway.net',
            'password' => Hash::make('wissal'),
            'is_admin' => false,
            'role_id' => $developper->id,
            'cellule_id' => $neutron->id,
        ]);
        User::create([
            'first_name' => 'Jihane',
            'last_name' => 'EL WARARI',
            'email' => 'jelwarari@numericway.net',
            'password' => Hash::make('jihane'),
            'is_admin' => false,
            'role_id' => $developper->id,
            'cellule_id' => $neutron->id,
        ]);
        User::create([
            'first_name' => 'Abdeljalil',
            'last_name' => 'BOURIRE',
            'email' => 'abourire@numericway.net',
            'password' => Hash::make('abdeljalil'),
            'is_admin' => false,
            'role_id' => $developper->id,
            'cellule_id' => $neutron->id,
        ]);
        /////users nova
        User::create([
            'first_name' => 'Oumaima',
            'last_name' => 'RHIMINI',
            'email' => 'orhmini@numericway.net',
            'password' => Hash::make('oumaima'),
            'is_admin' => false,
            'role_id' => $chefProject->id,
            'cellule_id' => $nova->id,
        ]);
        User::create([
            'first_name' => 'Taibi',
            'last_name' => 'MOUAF',
            'email' => 'tmouaf@numericway.net',
            'password' => Hash::make('taibi'),
            'is_admin' => false,
            'role_id' => $developper->id,
            'cellule_id' => $nova->id,
        ]);
        User::create([
            'first_name' => 'Amine',
            'last_name' => 'BAKHTI',
            'email' => 'abakhti@numericway.net',
            'password' => Hash::make('amine'),
            'is_admin' => false,
            'role_id' => $developper->id,
            'cellule_id' => $nova->id,
        ]);
        User::create([
            'first_name' => 'Mohammed',
            'last_name' => 'BENDAMI',
            'email' => 'mbendami@numericway.net',
            'password' => Hash::make('mohammed'),
            'is_admin' => false,
            'role_id' => $developper->id,
            'cellule_id' => $nova->id,
        ]);
    }

}
