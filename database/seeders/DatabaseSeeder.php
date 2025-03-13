<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $roleUser = Role::create(['name' => 'user']);
        $roleAdmin = Role::create(['name' => 'admin']);

        $permissions = [
            'create users',
            'read users',
            'update users',
            'delete users'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin = new User();
        $admin->name = 'Carlos Torres';
        $admin->email = 'cawtoz.dev@gmail.com';
        $admin->password = bcrypt('12345678');
        $admin->assignRole($roleAdmin);
        $roleAdmin->givePermissionTo($permissions);
        $admin->save();

        $user = new User();
        $user->name = 'Test User';
        $user->email = 'test@gmail.com';
        $user->password = bcrypt('12345678');
        $user->assignRole($roleUser);
        $user->save();

        User::factory(50)->create()->each(function ($user) use ($roleUser) {
            $user->assignRole($roleUser);
        });

        Customer::factory(50)->create();

        // Crear proveedores manualmente
        $suppliers = [
            ['nit' => '123456789', 'name' => 'Tech Solutions', 'phone' => '3001234567', 'email' => 'contact@techsolutions.com', 'address' => 'Calle 123, Ciudad A'],
            ['nit' => '987654321', 'name' => 'CompuParts', 'phone' => '3109876543', 'email' => 'ventas@compuparts.com', 'address' => 'Avenida 456, Ciudad B'],
            ['nit' => '456789123', 'name' => 'GamerZone Supplies', 'phone' => '3204567891', 'email' => 'soporte@gamerzone.com', 'address' => 'Carrera 789, Ciudad C'],
        ];

        foreach ($suppliers as $data) {
            Supplier::create($data);
        }

        // Crear productos manualmente
        $products = [
            ['name' => 'Mouse Gamer RGB', 'stock' => 20, 'description' => 'Mouse gamer con luces RGB y sensor de alta precisión.'],
            ['name' => 'Teclado Mecánico', 'stock' => 15, 'description' => 'Teclado mecánico con switches rojos y retroiluminación RGB.'],
            ['name' => 'Monitor 27" 144Hz', 'stock' => 10, 'description' => 'Monitor de 27 pulgadas con resolución 2K y tasa de refresco de 144Hz.'],
            ['name' => 'Tarjeta Gráfica RTX 3060', 'stock' => 5, 'description' => 'Tarjeta gráfica NVIDIA RTX 3060 con 12GB de VRAM.'],
            ['name' => 'SSD NVMe 1TB', 'stock' => 25, 'description' => 'Unidad SSD NVMe de 1TB con velocidad de lectura de 3500MB/s.'],
            ['name' => 'Procesador Ryzen 7', 'stock' => 12, 'description' => 'Procesador AMD Ryzen 7 5800X con 8 núcleos y 16 hilos.'],
            ['name' => 'Memoria RAM 16GB DDR4', 'stock' => 30, 'description' => 'Kit de memoria RAM DDR4 de 16GB a 3200MHz.'],
            ['name' => 'Fuente de Poder 750W', 'stock' => 8, 'description' => 'Fuente de poder certificada 80 Plus Gold de 750W.'],
            ['name' => 'Gabinete Gaming RGB', 'stock' => 10, 'description' => 'Gabinete para PC con panel lateral de vidrio templado y ventiladores RGB.'],
            ['name' => 'Silla Ergonómica para PC', 'stock' => 7, 'description' => 'Silla ergonómica con soporte lumbar y reclinación ajustable.'],
        ];

        foreach ($products as $data) {
            Product::create($data);
        }

    }
}
