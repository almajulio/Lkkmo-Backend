<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
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
        // User::factory(10)->create();

        Product::create([
            'name' => 'Shinobu Kocho Cosplay Costume',
            'price' => 130000,
            'description' => 'Shinobu Kocho, pemburu iblis yang anggun dan penuh keanggunan. Kostum ini terdiri dari haori berwarna ungu pastel dengan motif kupu-kupu yang khas, serta seragam Pemburu Iblis berwarna hitam yang elegan. Lengkap dengan detail ikat pinggang, kostum ini juga dilengkapi dengan aksesoris seperti rambut panjang berwarna ungu yang anggun dan jepit rambut kupu-kupu. Kostum ini dibuat dengan bahan berkualitas tinggi yang nyaman digunakan, sehingga cocok untuk menghadiri acara cosplay, pesta, atau pemotretan. Rasakan keanggunan dan ketangguhan Shinobu dalam setiap detail kostum yang dirancang menyerupai karakter aslinya!',
            'stock' => 100,
            'image' => 'images/image_shinobu_kocho.png',
            'category_id' => 1,
            'subcategory_id' => 1,
        ]);

        Product::create([
            'name' => 'Kyojuro Rengoku Cosplay Costume',
            'price' => 155000,
            'description' => 'Kyojuro Rengoku, Hashira Api yang legendaris. Kostum ini menampilkan seragam Pemburu Iblis standar berwarna hitam dengan jubah khas berwarna putih dan merah dengan corak api yang memukau. Jubahnya memberikan kesan panas yang membara, seolah-olah ia dikelilingi oleh api yang menyala. Kostum ini dilengkapi dengan ikat pinggang yang sesuai dan detail lainnya yang mencerminkan penampilan Kyojuro yang gagah. Tak ketinggalan, wig berwarna pirang dengan aksen merah pada ujungnya yang khas melengkapi tampilan karakter ini.',
            'stock' => 100,
            'image' => 'images/image_kyojuro_rengoku.png',
            'category_id' => 1,
            'subcategory_id' => 1,
        ]);

        Product::create([
            'name' => 'Kamado Tanjiro Cosplay Costume',
            'price' => 130000,
            'description' => 'Hidupkan kembali semangat dan ketangguhan Tanjiro Kamado dengan kostum cosplay yang terinspirasi dari karakter utama Demon Slayer. Kostum ini menampilkan seragam Pemburu Iblis berwarna hitam yang ikonik, lengkap dengan haori kotak-kotak hijau dan hitam yang menjadi ciri khas Tanjiro. Haori ini memberikan tampilan yang sederhana namun penuh makna, mencerminkan keteguhan hati Tanjiro dalam melindungi keluarganya dan melawan iblis.',
            'stock' => 100,
            'image' => 'images/image_tanjiro_kamado.png',
            'category_id' => 1,
            'subcategory_id' => 1,
        ]);

        Product::create([
            'name' => 'Spider-Hero Costume',
            'price' => 150000,
            'description' => 'Rasakan sensasi menjadi pahlawan super dengan kostum Spider-Man yang ikonik! Kostum ini menampilkan desain jaring merah yang khas dengan simbol laba-laba hitam di dada, serta kombinasi warna biru tua yang memberi tampilan ramping dan dinamis. Terbuat dari bahan elastis yang nyaman, kostum ini memungkinkan pergerakan yang leluasa, sempurna untuk acara cosplay, pesta kostum, atau sekadar bersenang-senang. Dengan detail yang teliti dan desain yang mendekati versi aslinya, kostum Spider-Man ini siap menghidupkan semangat kepahlawanan Anda.',
            'stock' => 100,
            'image' => 'images/image_spider_hero.png',
            'category_id' => 1,
            'subcategory_id' => 2,
        ]);

        Product::create([
            'name' => 'Man of Steel Costume',
            'price' => 200000,
            'description' => 'Hidupkan sosok Superman dengan kostum yang megah ini! Menampilkan desain tubuh berotot berwarna biru gelap yang dilengkapi logo "S" merah ikonik di dada, serta jubah merah panjang yang dramatis, kostum ini memberikan tampilan pahlawan super yang gagah dan kuat. Terbuat dari bahan yang nyaman dan fleksibel, kostum ini ideal untuk berbagai acara seperti cosplay, pesta, atau acara spesial lainnya. Dengan detail yang mendekati versi aslinya, kostum ini siap membuat Anda tampil bak Superman, pahlawan yang tak terkalahkan.',
            'stock' => 100,
            'image' => 'images/image_superman.png',
            'category_id' => 1,
            'subcategory_id' => 2,
        ]);

                Product::create([
            'name' => 'Patriotic Hero Suit Costume',
            'price' => 500000,
            'description' => 'Hidupkan karakter Anda dengan kostum patriotik yang luar biasa ini! Menampilkan desain ikonik dengan motif merah, putih, dan biru, kostum ini dilengkapi dengan perisai bulat yang tak tertandingi, memberikan kesan kuat sebagai pahlawan yang berani. Dengan detail bintang di dada dan bahan lapisan yang kokoh, kostum ini memancarkan kekuatan dan semangat kepahlawanan. Terbuat dari bahan nyaman yang memungkinkan gerakan bebas, ini adalah pilihan sempurna untuk acara cosplay, pesta, atau pemotretan.',
            'stock' => 100,
            'image' => 'images/image_patriotic_hero.png',
            'category_id' => 1,
            'subcategory_id' => 2,
        ]);

        Product::create([
            'name' => 'Sacred Fox Spirit Cloak',
            'price' => 670000,
            'description' => 'Jubah bertema roh rubah sakral dengan warna dominan putih dihiasi pola spiral merah dan detail geometris mistis. Lapisan dalamnya berwarna merah dengan aksen lipatan yang dramatis, memberikan kesan misterius dan magis. Dilengkapi kerah tinggi dan tudung runcing yang menyerupai telinga rubah, menghadirkan aura spiritual dan gaya tradisional Jepang.',
            'stock' => 100,
            'image' => 'images/image_sacred_fox.png',
            'category_id' => 1,
            'subcategory_id' => 2,
        ]);

        Product::create([
            'name' => 'Floral Kimono Yukata',
            'price' => 650000,
            'description' => 'Kimono bergaya yukata dengan warna dasar biru gelap yang elegan, dihiasi motif bunga merah cerah dan daun hijau yang kontras. Terdapat detail sabuk obi putih dengan aksen perak, menambah sentuhan tradisional Jepang. Dengan lengan lebar yang mengalir dan potongan longgar, kostum ini memberikan nuansa anggun dan klasik ala karakter anime Jepang, cocok untuk cosplay atau acara bertema budaya Jepang.',
            'stock' => 100,
            'image' => 'images/image_floral_kimono.png',
            'category_id' => 1,
            'subcategory_id' => 2,
        ]);

        Product::create([
            'name' => 'Elite Agent Costume',
            'price' => 175000,
            'description' => 'Hidupkan karakter aksi Anda dengan kostum Tactical Agent yang menakjubkan ini! Menampilkan desain serba hitam dengan detail taktis yang lengkap, kostum ini dilengkapi sabuk utilitas, sarung senjata, dan tali pengikat di bahu, memberikan kesan siap tempur sebagai agen rahasia atau prajurit elit. Sarung tangan hitam yang kokoh menambah kesan berani dan profesional. Terbuat dari bahan yang nyaman dan ringan, kostum ini memungkinkan Anda bergerak bebas, ideal untuk berbagai acara seperti cosplay, pesta, atau pemotretan.',
            'stock' => 100,
            'image' => 'images/image_elite_agent.png',
            'category_id' => 1,
            'subcategory_id' => 3,
        ]);

        Product::create([
            'name' => 'Rogue Warrior Costume',
            'price' => 450000,
            'description' => 'Hidupkan karakter Anda dengan kostum Rogue Warrior yang penuh gaya ini! Menampilkan desain jaket kulit panjang berwarna merah marun dengan detail yang tegas, kostum ini memberikan kesan pahlawan pemberani atau petualang misterius. Dilengkapi dengan sabuk gesper yang mencolok, sarung tangan hitam yang kuat, dan sepatu bot tinggi berwarna coklat, kostum ini sempurna untuk cosplay, pesta, atau pemotretan. Dibuat dari bahan yang nyaman namun terlihat tangguh, kostum ini memungkinkan Anda tampil keren dan bergerak bebas.',
            'stock' => 100,
            'image' => 'images/image_rogue_warrior.png',
            'category_id' => 1,
            'subcategory_id' => 3,
        ]);

        Product::create([
            'name' => 'Advanced Combat Suit Costume',
            'price' => 750000,
            'description' => 'Tampil sebagai prajurit masa depan dengan Advanced Combat Suit yang memukau ini! Kostum ini dilengkapi dengan armor berwarna hijau metalik yang tebal dan futuristik, dirancang untuk melindungi dan memperkuat tampilan Anda sebagai seorang pejuang dari era baru. Helm canggih dengan visor transparan menambah kesan teknologi tinggi, sementara senjata berat yang dibawa semakin memperkuat aura tak terkalahkan. Armor ini terbuat dari bahan yang kuat namun nyaman, memungkinkan gerakan bebas di berbagai aktivitas cosplay, pesta, atau pemotretan.',
            'stock' => 100,
            'image' => 'images/image_advanced_combat.png',
            'category_id' => 1,
            'subcategory_id' => 3,
        ]);

        Product::create([
            'name' => 'Pakaian Adat Kerajaan Emas',
            'price' => 500000,
            'description' => 'Tampil memukau dengan pakaian adat kerajaan yang penuh keagungan ini! Kostum megah ini memancarkan kemewahan dengan balutan warna emas yang dipadukan dengan bordiran indah dan detil yang rumit, mencerminkan status dan kekuasaan. Aksesoris berlapis emas, termasuk kalung, gelang, serta ornamen lainnya, menambah kesan kebangsawanan yang berkelas. Sabuk merah cerah di pinggang memberikan sentuhan kontras yang menonjolkan kekuatan dan ketegasan. Dengan desain yang mewah namun tetap nyaman, kostum ini cocok digunakan untuk upacara adat, acara kebudayaan, atau pemotretan bertema kerajaan.',
            'stock' => 100,
            'image' => 'images/image_pakaian_adat_emas.png',
            'category_id' => 2,
            'subcategory_id' => 1,
        ]);

        Product::create([
            'name' => 'Pakaian Adat Batak',
            'price' => 760000,
            'description' => 'Pakaian adat Batak ini terdiri dari kebaya pendek berwarna hitam dengan aksen tenun khas Batak yang penuh dengan corak geometris tradisional. Dipadukan dengan ulos yang dililitkan sebagai kain panjang, menghasilkan tampilan elegan dan penuh makna budaya. Busana ini dilengkapi dengan aksesori khas berupa kalung emas besar, gelang emas, serta hiasan kepala dengan motif tradisional, mencerminkan kekayaan budaya dan adat istiadat Batak. Cocok digunakan untuk upacara adat, pesta pernikahan, atau acara budaya lainnya.',
            'stock' => 100,
            'image' => 'images/image_pakaian_adat_batak.png',
            'category_id' => 2,
            'subcategory_id' => 1,
        ]);

        Product::create([
            'name' => 'Pakaian Adat Jawa',
            'price' => 690000,
            'description' => 'Pakaian adat Jawa pria ini terdiri dari beskap berwarna hitam yang elegan, dilengkapi dengan kain batik yang dililitkan di bagian bawah sebagai bawahan. Beskap ini memiliki desain kancing di bagian depan dengan potongan yang khas, memberikan kesan formal dan anggun. Pakaian ini biasanya digunakan dalam acara adat Jawa, seperti pernikahan, upacara adat, atau acara resmi lainnya. Selain itu, penutup kepala tradisional (blangkon) menjadi bagian penting yang melengkapi keseluruhan penampilan.',
            'stock' => 100,
            'image' => 'images/image_pakaian_adat_jawa.png',
            'category_id' => 2,
            'subcategory_id' => 1,
        ]);

        Product::create([
            'name' => 'Gaun Santa Velvet Elegan',
            'price' => 1000000,
            'description' => 'Kostum Natal wanita ini memiliki desain elegan dengan dominasi warna merah cerah dan aksen bulu putih yang lembut di sepanjang tepi gaun dan jubah. Dilengkapi dengan pita besar di bagian dada serta jubah bertudung yang menambah kesan klasik dan hangat. Kostum ini terbuat dari bahan beludru lembut yang nyaman, cocok digunakan untuk perayaan Natal, cosplay, atau acara bertema musim dingin. Kombinasi desain yang menarik dan bahan berkualitas tinggi membuatnya sempurna untuk menciptakan suasana Natal yang ceria dan menawan.',
            'stock' => 100,
            'image' => 'images/image_gaun_santa.png',
            'category_id' => 2,
            'subcategory_id' => 2,
        ]);

        Product::create([
            'name' => 'Jubah Bisht Abu-Abu (Idul Fitri)',
            'price' => 700000,
            'description' => 'Jubah Bisht wanita ini merupakan pilihan sempurna untuk merayakan Idul Fitri dengan gaya yang anggun dan berkelas. Berwarna abu-abu lembut dengan sentuhan bordir emas di sepanjang tepian dan bagian depan, jubah ini memancarkan kesan mewah namun tetap sederhana. Potongannya longgar dan nyaman, memberikan keleluasaan gerak sekaligus menonjolkan penampilan yang elegan. Terbuat dari bahan ringan yang nyaman dipakai sepanjang hari, jubah ini sangat cocok untuk menghadiri acara keagamaan atau berkumpul bersama keluarga selama Idul Fitri. Dengan desainnya yang tradisional namun modern, pakaian ini menjadi pilihan tepat bagi wanita yang ingin tampil menawan di hari istimewa.',
            'stock' => 100,
            'image' => 'images/image_jubah_bisht.png',
            'category_id' => 2,
            'subcategory_id' => 2,
        ]);

        Product::create([
            'name' => 'Kostum Pasangan Halloween Tengkorak Penyihir',
            'price' => 500000,
            'description' => 'Kostum pasangan Halloween ini menghadirkan tema tengkorak dan penyihir yang menakutkan namun seru untuk merayakan malam Halloween. Dengan perpaduan kostum kerangka untuk pria, lengkap dengan jubah hitam dan topi penyihir tajam, serta kostum tengkorak penyihir wanita dengan riasan wajah seram dan rambut panjang berwarna putih. Setiap detail dari kostum ini dirancang untuk menciptakan kesan yang menyeramkan, mulai dari desain kerangka yang realistis hingga aksen topi yang ikonik. Cocok untuk pesta Halloween, acara bertema horor, atau sekadar bersenang-senang di malam penuh misteri. Gaun hitam longgar dan aksesori yang menyertainya membuat kostum ini nyaman dipakai sepanjang acara.',
            'stock' => 100,
            'image' => 'images/image_kostum_halloween.png',
            'category_id' => 2,
            'subcategory_id' => 2,
        ]);

        Product::create([
            'name' => 'Navy Winter Lolita Coat',
            'price' => 250000,
            'description' => 'Mantel musim dingin bergaya lolita berwarna biru tua dengan aksen bulu putih di bagian kerah dan hem. Dilengkapi dengan kancing emas berderet ganda dan pita di leher, memberikan sentuhan elegan ala seragam pelaut yang chic dan hangat.',
            'stock' => 100,
            'image' => 'images/image_navy_lolita.png',
            'category_id' => 2,
            'subcategory_id' => 2,
        ]);

        $this->call(CategorySeeder::class);
        $this->call(RoleSeeder::class);
    }
}
