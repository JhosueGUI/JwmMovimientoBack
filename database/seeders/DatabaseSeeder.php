<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([EmpresaSeeder::class]);
        $this->call([EstadoComprobanteSeeder::class]);
        $this->call([ClienteSeeder::class]);
        $this->call([RendicionSeeder::class]);
        $this->call([SustentoSeeder::class]);
        $this->call([MonedaSeeder::class]);
        $this->call([ModoSeeder::class]);
        $this->call([CategoriaSeeder::class]);
        $this->call([SubCategoriaSeeder::class]);
        $this->call([PersonaFinanzaSeed::class]);
        $this->call([ProveedorFinanzaSeed::class]);
    }
}
