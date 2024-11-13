<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
[
'name'=>'samsung ',
'description' => 'Description of product 1',
'price' => 100.0,
'stock' => 2,
'created_at' => now(),
'updated_at' => now(),

],
[
    'name'=>'Nokia ',
    'description' => 'Description of product 2',
    'price' => 100.0,
    'stock' => 8,
    'created_at' => now(),
    'updated_at' => now(),
    
    ],
    [
        'name'=>'opo ',
        'description' => 'Description of product 3',
        'price' => 900.0,
        'stock' => 7,
        'created_at' => now(),
        'updated_at' => now(),
        
        ],
        [
            'name'=>'Moto 4',
            'description' => 'Description of product 4',
            'price' => 800.0,
            'stock' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            
            ],
            [
                'name'=>'sony ',
                'description' => 'Description of product 5',
                'price' => 100.0,
                'stock' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                
                ],
                [
                    'name'=>'Hitachi ',
                    'description' => 'Description of product 6',
                    'price' => 900.0,
                    'stock' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                    
                    ],
                    [
                        'name'=>'LG ',
                        'description' => 'Description of product 7',
                        'price' => 100.0,
                        'stock' => 2,
                        'created_at' => now(),
                        'updated_at' => now(),
                        
                        ],
                        [
                            'name'=>'Dikan',
                            'description' => 'Description of product 8',
                            'price' => 100.0,
                            'stock' => 2,
                            'created_at' => now(),
                            'updated_at' => now(),
                            
                            ],
                            [
                                'name'=>'Bjaj',
                                'description' => 'Description of product 9',
                                'price' => 100.0,
                                'stock' => 2,
                                'created_at' => now(),
                                'updated_at' => now(),
                                
                                ],
                                [
                                    'name'=>'Simfony',
                                    'description' => 'Description of product 10',
                                    'price' => 600.0,
                                    'stock' => 2,
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                    
                                    ],
                                    [
                                        'name'=>'Asus',
                                        'description' => 'Description of product 11',
                                        'price' => 600.0,
                                        'stock' => 2,
                                        'created_at' => now(),
                                        'updated_at' => now(),
                                        
                                        ],
                                        [
                                            'name'=>'Dell',
                                            'description' => 'Description of product 12',
                                            'price' => 600.0,
                                            'stock' => 2,
                                            'created_at' => now(),
                                            'updated_at' => now(),
                                            
                                            ],
                                                                                                                                                                                    



                                ]);
    }
}
