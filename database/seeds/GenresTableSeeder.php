<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!\App\Genre::count()) {
            App\Genre::createMany([
                [
                    'name' => 'House',
                    'description' => 'El house es un estilo de música electrónica de baile (es un estilo de ésta pero también es uno de sus primeros géneros y precursores) que se originó en la ciudad de Chicago, Estados Unidos, al comienzo de los años 1980. ',
                    'history' => 'El house desciende de la música disco, que fusionaba soul, R&B y funk,2​ con mensajes festivos que hablaban de baile, amor y sexualidad, todo ello sostenido por arreglos repetitivos y un patrón rítmico constante. Algunas canciones de disco incorporaban ya sonidos producidos con sintetizador o cajas de ritmos, llegando alguna composición a ser completamente electrónica. Ejemplos de este último caso serían las producciones de finales de los años 1970 del italiano Giorgio Moroder, con temas tan populares como el hit "I Feel Love" de Donna Summer publicado en 1977. El house también estaba influido por las técnicas de mezcla y edición de algunos DJs de música disco, así como de ingenieros de sonido como Walter Gibbons, Tom Moulton, Jim Burgess, Larry Levan, Ron Hardy, M & M y otros que producían versiones más largas y repetitivas de las grabaciones existentes de disco. Alguno de los pioneros del house, como Frankie Knuckles,3​ creaban composiciones similares de la nada, utilizando para ello samplers, sintetizadores, secuenciadores y cajas de ritmos. El hipnótico tema de música electrónica de baile "On and On", producida en 1984 por el DJ de Chicago Jesse Saunders y coescrita por Vince Lawrence, contiene los elementos básicos del primer sonido house: la línea de bajo de la 303 y vocales mínimas. Esta canción es citada en ocasiones como el "primer disco de house de la historia",4​ aunque también se han señalado otros ejemplos de aquella época, como "Music is the Key", publicado en 1985 por J.M. Silk.5​',
                    'cultural' => 'Se originó en Chicago',
                ],
                [
                    'name' => 'Funk',
                    'description' => 'El funk es un género musical que nació entre mediados y finales de los años 1960 cuando músicos principalmente afroamericanos fusionaron soul, jazz, ritmos latinos (mambo, por ejemplo) y R&B dando lugar a una nueva forma musical rítmica y bailable. El funk reduce el protagonismo de la melodía y de la armonía y dota, a cambio, de mayor peso a la percusión y a la línea de bajo eléctrico. Las canciones de funk suelen basarse en un vamp (una figura, sección o acompañamiento repetidos) extendido sobre un solo acorde, distinguiéndose del R&B y el soul, más centrados alrededor de la progresión de acordes.',
                    'history' => 'La palabra funk en inglés se refiere originalmente a un olor corporal fuerte, generalmente ofensivo. Según el historiador y antropólogo Robert Farris Thompson en su obra Flash Of The Spirit: African & Afro-American Art & Philosophy, la palabra funky tiene su raíz semántica en la palabra "lu-fuki" de la lengua kikongo, que significa "mal olor corporal". De acuerdo a su tesis, "tanto los jazzmen como Bakongo utilizan funky y lu-fuki para alabar a determinadas personas por la integridad de su arte, por haber trabajado para lograr sus objetivos". Esta señal kongo de esfuerzo se identifica con la irradiación de energía positiva por esa persona. De ahí que "funk" en la jerga del jazz estadounidense pueda significar terrenal, la vuelta a lo fundamental, auténtico."1​ Los músicos de jazz afroamericanos originalmente aplicaban ese término a la música con un groove lento y melodioso, y posteriormente con un ritmo duro e insistente, relacionándolo con cualidades corporales o carnales en la música. Esta forma de música temprana marcó el patrón para posteriores músicos.2​',
                    'cultural' => 'Mediados de los 1960, Estados Unidos',
                ],
                [
                    'name' => 'Blues',
                    'description' => 'El blues (cuyo significado es melancolía o tristeza) es un género musical vocal e instrumental, basado en la utilización de notas de blues y de un patrón repetitivo, que suele seguir una estructura de doce compases.',
                    'history' => 'El house desciende de la música disco, que fusionaba soul, R&B y funk,2​ con mensajes festivos que hablaban de baile, amor y sexualidad, todo ello sostenido por arreglos repetitivos y un patrón rítmico constante. Algunas canciones de disco incorporaban ya sonidos producidos con sintetizador o cajas de ritmos, llegando alguna composición a ser completamente electrónica. Ejemplos de este último caso serían las producciones de finales de los años 1970 del italiano Giorgio Moroder, con temas tan populares como el hit "I Feel Love" de Donna Summer publicado en 1977. El house también estaba influido por las técnicas de mezcla y edición de algunos DJs de música disco, así como de ingenieros de sonido como Walter Gibbons, Tom Moulton, Jim Burgess, Larry Levan, Ron Hardy, M & M y otros que producían versiones más largas y repetitivas de las grabaciones existentes de disco. Alguno de los pioneros del house, como Frankie Knuckles,3​ creaban composiciones similares de la nada, utilizando para ello samplers, sintetizadores, secuenciadores y cajas de ritmos. El hipnótico tema de música electrónica de baile "On and On", producida en 1984 por el DJ de Chicago Jesse Saunders y coescrita por Vince Lawrence, contiene los elementos básicos del primer sonido house: la línea de bajo de la 303 y vocales mínimas. Esta canción es citada en ocasiones como el "primer disco de house de la historia",4​ aunque también se han señalado otros ejemplos de aquella época, como "Music is the Key", publicado en 1985 por J.M. Silk.5​',
                    'cultural' => 'Música del África occidental, llevada por los esclavos al sur de Estados Unidos, especialmente al delta del río Misisipi.',
                ]
            ]);
        }
    }
}
