<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!\App\Artist::count()) {
            $background = App\File::create([
                'file_path' => 'public/artists/background-Pomo.jpg',
                'mime_type' => 'image/jpeg',
                'uploader_id' => 1,
            ]);
            $avatar = App\File::create([
                'file_path' => 'public/artists/Pomo.jpg',
                'mime_type' => 'image/jpeg',
                'uploader_id' => 1,
            ]);
            $Pomo = App\Artist::create([
                'user_id' => App\User::inrandomOrder()->first()->id,
                'name' => 'Pomo',
                'soundcloud_embed' => '<iframe width="100%" height="300" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/318544748&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true"></iframe>',
                'real_name' => 'David',
                'record_label' => 'HW&W',// Sello discográfico
                'description' => 'Pomo is a Canadian multi-instrumentalist and producer based in Vancouver who makes electronic beats influenced by hip hop, house, 70s and 80s funk music. He grew up in Port Moody, British Colombia and cultivated his tastes and sound through the Vancouver electronic music scene before moving for a time to Montreal and joining the likes of Kaytranada, Ta-Ku, and Stwo on the HW&W roster.',
                'country' => 'Canada'
            ]);
            $Pomo->files()->attach($avatar->id, ['type' => App\Artist::AVATAR_IMAGE_FILE_TYPE]);
            $Pomo->files()->attach($background->id, ['type' => App\Artist::BACKGROUND_IMAGE_FILE_TYPE]);
            // $TigerAndWoods = App\Artist::create([
            //     'user_id' => App\User::inrandomOrder()->first()->id,
            //     'name' => 'Tiger & Woods',
            //     'real_name' => 'Larry Tiger & David Woods',
            //     'record_label' => 'Editainment',// Sello discográfico
            //     'description' => 'Shrouded in mystery! No one knows where it’s coming from, no one knows where it’s going.',
            //     'country' => 'USA'
            // ]);
            // $KarmaKid = App\Artist::create([
            //     'user_id' => App\User::inrandomOrder()->first()->id,
            //     'name' => 'Karma Kid',
            //     'real_name' => 'Sam Knowles',
            //     'record_label' => 'Just Us Recordings, L2S',// Sello discográfico
            //     'description' => 'Sam Knowles (born 1 August 1994), known professionally as Karma Kid, is an English electronic dance music record producer and DJ from Matlock, Derbyshire. He was educated at Highfields School and obtained a place at the University of Huddersfield which he deferred a year to concentrate on his music.',
            //     'country' => ' Matlock, Derbyshire'
            // ]);
            // $Disclousure = App\Artist::create([
            //     'user_id' => App\User::inrandomOrder()->first()->id,
            //     'name' => 'Disclousure ',
            //     'real_name' => 'David',
            //     'record_label' => 'HW&W',// Sello discográfico
            //     'description' => 'Pomo is a Canadian multi-instrumentalist and producer based in Vancouver who makes electronic beats influenced by hip hop, house, 70s and 80s funk music. He grew up in Port Moody, British Colombia and cultivated his tastes and sound through the Vancouver electronic music scene before moving for a time to Montreal and joining the likes of Kaytranada, Ta-Ku, and Stwo on the HW&W roster.',
            //     'country' => 'Canada'
            // ]);
        }
    }
}
