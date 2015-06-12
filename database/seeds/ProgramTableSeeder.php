<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Program;   

class ProgramTableSeeder extends Seeder {
	
    public function run() {
        // clear table
        DB::table('programs')->delete(); 
        // add 1st row
        Program::create( [
            'name' => 'Hannah' ,
        ] );
        // add 2nd row
        Program::create( [
            'name' => 'Silvia' ,
        ] );
        // add 3rd row
        Program::create( [
            'name' => 'Naomi (M)' ,
        ] );
        // add 4th row
        Program::create( [
            'name' => 'Naomi (W)' ,
        ] );
        // add 5th row
        Program::create( [
            'name' => 'Outreach' ,
        ] );
    }
}