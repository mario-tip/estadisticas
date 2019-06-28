<?php
use Illuminate\Database\Seeder;
use App\Category;
use App\Stock;
use App\User_type;
use App\Warehouse;
use App\Customer;
use App\Delivery;
use App\Product;
use App\Balance;
use App\Company;
use App\Payment;
use App\Sector;
use App\Order;
use App\User;
use App\Sale;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

      // Eloquent::unguard();
      DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $Ususarios = 100;
        $Categorias = 10;


          // User_type::truncate();
          // Category::truncate();
          // Company::truncate();
          // Sector::truncate();
          User::truncate();
          // Product::truncate();
          // Warehouse::truncate();
          // Customer::truncate();
          // Order::truncate();
          // Balance::truncate();
          // Delivery::truncate();
          // Sale::truncate();
          // Payment::truncate();
          // Stock::truncate();

          // factory(User_type::class, $cantidadCategorias)->create();
          // factory(Category::class, 100)->create();
          // factory(Company::class, 15)->create();
          // factory(Sector::class, $cantidadCategorias)->create();
          factory(User::class, 2)->create();
          // factory(Product::class, 100)->create();
          // factory(Warehouse::class, 100)->create();
          // factory(Balance::class, $cantidadCategorias)->create();
          // factory(Order::class, $cantidadCategorias)->create();
          // factory(Payment::class, $cantidadCategorias)->create();
          // factory(Delivery::class, $cantidadCategorias)->create();
          // factory(Sale::class, $cantidadUsusarios)->create();
          // factory(Customer::class, 5)->create();
          // factory(Stock::class, 30)->create();
          // DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
