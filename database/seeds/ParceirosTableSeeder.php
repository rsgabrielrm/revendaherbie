<?php

use Illuminate\Database\Seeder;

class ParceirosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parceiros')->insert([
            'nome' => 'Revenda Avenida',
            'email' => 'avenida@avenida.com.br',
            'telefone' => '53 9 8345-3421',          
            'cidade' => 'Pelotas',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')           
        ]);
        DB::table('parceiros')->insert([
            'nome' => 'Revenda Rio Branco',
            'email' => 'riobranco@revendario.com.br',
            'telefone' => '53 9 4331-3341',          
            'cidade' => 'Pelotas',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')           
        ]);
        DB::table('parceiros')->insert([
            'nome' => 'Revenda Alto do Alegrete',
            'email' => 'alegrete@altoalegrete.com.br',
            'telefone' => '52 9 3422-1243',          
            'cidade' => 'Alegrete',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')           
        ]);
        DB::table('parceiros')->insert([
            'nome' => 'Center Sul - Veículos',
            'email' => 'contato@centersul.com.br',
            'telefone' => '51 9 4331-3344',          
            'cidade' => 'Paraiso',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')           
        ]);
        DB::table('parceiros')->insert([
            'nome' => 'Jobim veículos',
            'email' => 'jobim@revendars.com.br',
            'telefone' => '53 9 3223-1154',          
            'cidade' => 'Pelotas',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')           
        ]);
        DB::table('parceiros')->insert([
            'nome' => 'Maratozo',
            'email' => 'maratozo@maratozo.com.br',
            'telefone' => '51 9 4553-2332',          
            'cidade' => 'Estrela',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')           
        ]);
    }
}
