<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Role; 
  
class RoleTableSeeder extends Seeder {

    public function run() {
 
        DB::table('roles')->delete(); 
        // add 1st row
        Role::create( [
            'name' => 'Administrator' ,
        ] );
        // add 2nd row
        Role::create( [
            'name' => 'Case Manager' ,
        ] );
        // add 3rd row
        Role::create( [
            'name' => 'Meal Counter' ,
        ] );
        // add 4th row
        Role::create( [
            'name' => 'Reporter' ,
        ] );
    }
}