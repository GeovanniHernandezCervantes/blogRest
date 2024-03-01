<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run()
    {
        $nombres = ['Juan', 'María', 'Pedro', 'Ana', 'Luisa', 'Carlos', 'Laura', 'Pablo', 'Sofía', 'Diego'];
        $titulos = ['Amanecer en la montaña', 'Atardecer en la playa', 'Cascada escondida', 'Bosque encantado', 'Valle de flores'];
        $contenidos = [
            'Navegar por el río Bravo da gran vitalidad, te sientes más joven.',
            'Caminar por el bosque te conecta con la naturaleza y te llena de energía positiva.',
            'Contemplar un atardecer en la playa es una experiencia única que te llena de paz interior.',
            'Recorrer las calles de un pueblo antiguo te transporta a otra época, llena de historia y tradición.',
            'Explorar las montañas te brinda una sensación de libertad y aventura.'
        ];

        for ($i = 1; $i <= 10; $i++) {
            DB::table('posts')->insert([
                'autor' => $nombres[array_rand($nombres)],
                'fecha' => now(),
                'titulo' => $titulos[array_rand($titulos)],
                'contenido' => $contenidos[array_rand($contenidos)],
                'fotobase64' => 'Foto ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
