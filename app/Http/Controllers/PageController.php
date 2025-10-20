<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private $akun = [
            'admin' => [
                'username'=> 'admin',
                'password'=> '123',
                'nama'=> 'ADMIN TERCINTA',
                'bidang' => 'Operator',
                'bio'=> 'SAYA ADMIN',
                'foto'=> 'images/me1.jpg'
            ],
            'faiz' => [
                'username'=> 'faiz',
                'password'=> 'rasa',
                'nama'=> 'Faiz Ulfia Sasmita',
                'bidang' => 'Lukisan dan Patung',
                'bio'=> 'Seniman muda yang mengekspresikan emosi lewat warna, bentuk, serta rasa.',
                'foto'=> 'images/me1.jpg'
            ]
            ];
    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {

        $username = strtolower($request->input('username'));
        $password = trim($request->input('password'));

        if (empty($username) || empty($password)) {
            return redirect()->route('login')->with('error', 'Harap isi semua kolom!');
        }
        if (array_key_exists($username, $this->akun)){
            $user=$this->akun[$username];

            if($user['password'] === $password){
                $request->session()->put('username', $username);
                return redirect()->route('dashboard');
            }
        }
        return redirect()->route('login')->with('error','Username atau Password salah');
    }

    public function dashboard(Request $request)
    {
        $username = $request->session()->get('username');

        if(empty($username)){
            return redirect()->route('login')->with('error','Silahkan melakukan login terlebih dahulu!');
        }
        return view('dashboard', compact('username'));
    }

    public function profile(Request $request)
    {
        $username = $request->session()->get('username');

            if(!$username || !array_key_exists($username, $this->akun)){
                return redirect()->route('login')->with('error','Data tidak ada');
            }
            $profil = $this->akun[$username];
            return view('profile', compact('profil'));
    }

    public function pengelolaan(Request $request)
    {
        $data = [
            ['id' => 1, 'judul' => 'Self Portrait and His Pipe', 'seniman' => 'Affandi', 'jenis' => 'Lukisan', 'tahun' => 1974,'gambar' => 'images/sp.jpeg'],
            ['id' => 2, 'judul' => 'Penangkapan Diponegoro', 'seniman' => 'Raden Saleh', 'jenis' => 'Lukisan', 'tahun' => 1830,'gambar' => 'images/ppd.jpg'],
            ['id' => 3, 'judul' => 'Badai Pasti Berlalu', 'seniman' => 'Affandi', 'jenis' => 'Lukisan', 'tahun' => 1971,'gambar'=> 'images/bpb.png'],
            ['id'=> 4, 'judul'=> 'Perburuan Rusa','seniman'=>'Raden Saleh','jenis'=>'Lukisan','tahun'=>1846,'gambar'=>'images/pr.png'],
            ['id'=> 5, 'judul'=> 'Ali Sadikin Pada Masa Kemerdekaan','seniman'=>'Hendra Gunawan','jenis'=>'Lukisan','tahun'=>1966,'gambar'=>'images/as.png'],
            ['id'=> 6, 'judul'=> 'A View of Mount Megamendung','seniman'=>'Raden Saleh','jenis'=>'Lukisan','tahun'=>1861,'gambar'=>'images/mm.png'],
            ['id'=> 7, 'judul'=> 'The Ruins and The Piano','seniman'=>'Sindudarsono Sudjojono','jenis'=>'Lukisan','tahun'=>1956,'gambar'=>'images/p.png'],
            ['id'=> 8, 'judul'=> 'The Man from Bantul','seniman'=> 'I Nyoman','jenis'=>'Lukisan','tahun'=>2000,'gambar'=>'images/b.png'],
            ['id'=> 9, 'judul'=> 'Pasukan Kita di Bawah Pimpinan Pangeran Diponegoro','seniman'=>'Raden Saleh','jenis'=>'Lukisan','tahun'=>1979,'gambar'=>'images/pd.png'],
            ['id'=> 10, 'judul'=> 'The Bull Hunt','seniman'=>'Raden Saleh','jenis'=> 'Lukisan','tahun'=> 1855,'gambar'=> 'images/bh.png'],
            ['id'=> 11, 'judul'=> 'Patung Garuda Wisnu Kencana','seniman'=> 'I Nyoman Nuarta','jenis'=>'Patung','tahun'=> 1989,'gambar'=> 'images/bl.jpg'],
            ['id'=> 12, 'judul'=> 'Patung Dolorosa Sinaga','seniman'=> 'Dolorosa Sinaga','jenis'=>'Patung','tahun'=> 1998,'gambar'=> 'images/ds.jpeg'],            
        ];

        $search=$request->query('search');
        if($search){
            $data=array_filter($data,function($item)use($search){
                return stripos($item['judul'],$search) !== false||stripos($item['seniman'],$search)!==false;
            });
        }
        return view('pengelolaan', compact('data'));
    }

    function detailkarya($id){
        $data = [
            ['id' => 1, 'judul' => 'Self Portrait and His Pipe', 'seniman' => 'Affandi', 'jenis' => 'Lukisan', 'tahun' => 1974,'gambar' => 'images/sp.jpeg', 'deskripsi' => 'Salah satu lukisan Indonesia terkenal, yaitu lukisan karya Affandi yang berjudul Self Portrait and His Pipe. Affandi sering melukis potret dirinya sambil menghisap cerutu atau pipa rokok, yang merupakan ciri khas penampilannya. Lukisan ini benar-benar menampilkan gaya ekspresionis khas Affandi, yang menekankan emosi dan perasaan pelukisnya.'],
            ['id' => 2, 'judul' => 'Penangkapan Diponegoro', 'seniman' => 'Raden Saleh', 'jenis' => 'Lukisan', 'tahun' => 1830,'gambar' => 'images/ppd.jpg', 'deskripsi' => 'Raden Saleh dianggap sebagai salah satu pelukis pionir di Indonesia. Lukisan yang berjudul Penangkapan Diponegoro merupakan salah satu karyanya yang terkenal dan mendunia. Pada lukisan ini, Raden Saleh memberikan detail-detail kecil peristiwa pengkhianatan Belanda kepada Pangeran Diponegoro dengan lebih akurat. Raden Saleh melukis Pangeran Diponegoro lengkap dengan busana khasnya dan raut wajah yang marah dan tegas. Ia juga melukis para pengikut Pangeran Diponegoro dengan mengenakan pakaian tradisional Jawa. Lukisan ini merupakan masterpiece yang menampilkan keakuratan peristiwa sejarah.'],
            ['id' => 3, 'judul' => 'Badai Pasti Berlalu', 'seniman' => 'Affandi', 'jenis' => 'Lukisan', 'tahun' => 1971,'gambar'=> 'images/bpb.png', 'deskripsi' => 'Lukisan Badai Pasti Berlalu merupakan karya Affandi yang menceritakan tentang perjuangan manusia yang mengarungi samudera untuk mencapai suatu tempat tujuan. Lukisan ini menggambarkan sifat alamiah manusia yang pantang menyerah untuk mendapatkan apa yang ingin dimiliki. Tapi di tengah perjuangan untuk mencapai tujuan, ombak badai muncul dan mulai menggoyahkan semangat manusia. Sejatinya, manusia bisa berusaha semaksimal mungkin untuk mencapai tujuan. Akan tetapi, Tuhan-lah yang menentukan takdir mereka.'],
            ['id'=> 4, 'judul'=> 'Perburuan Rusa','seniman'=>'Raden Saleh','jenis'=>'Lukisan','tahun'=>1846,'gambar'=>'images/pr.png','deskripsi'=>'Lukisan terkenal karya seniman Indonesia selanjutnya adalah “Perburuan Rusa” atau “The Deer Hunt” karya Raden Saleh yang menggambarkan perjuangan seseorang untuk bertahan hidup. Lukisan ini sangat terkenal di dunia. Bahkan di tahun 1996, The Deer Hunt berhasil terjual seharga 1,8 miliar dolar di Singapura.'],
            ['id'=> 5, 'judul'=> 'Ali Sadikin Pada Masa Kemerdekaan','seniman'=>'Hendra Gunawan','jenis'=>'Lukisan','tahun'=>1966,'gambar'=>'images/as.png','deskripsi'=>'“Ali Sadikin Pada Masa Kemerdekaan” karya Hendra Gunawan. Lukisan ini mengungkapkan efek dari revolusioner dari sosok gubernur Ali Sadikin  terhadap seniman di Indonesia. Dalam masa pemerintahannya, Ali Sadikin memberi fasilitas, dukungan, dan promosi karya seniman baru untuk menjaga kekayaan budaya Indonesia. Bahkan pada saat Hendra berada di dalam penjara, Ali Sadikin selalu mengirimkan alat lukis kepadanya dengan harapan sang seniman bisa terus berkarya. Hendra sangat tersentuh dengan tindakan dukungan Ali Sadikin. Untuk mengapresiasinya, Hendra menghadiahkan Ali Sadikin sebagai ucapan terima kasih. Melihat dari sejarah ceritanya, lukisan ini tentu memiliki nilai tinggi oleh Hendra Gunawan maupun Ali Sadikin. Jadi tidak heran jika lukisan “Ali Sadikin Pada Masa Kemerdekaan” berhasil terjual di Balai Lelang Sotheby’s Hong Kong pada 5 Oktober 2014 HK$33,24 juta atau setara Rp52,19 miliar (dengan kurs rupiah tanggal tersebut).'],
            ['id'=> 6, 'judul'=> 'A View of Mount Megamendung','seniman'=>'Raden Saleh','jenis'=>'Lukisan','tahun'=>1861,'gambar'=>'images/mm.png','deskripsi'=>'“A View of Mount Megamendung” adalah salah satu karya ciptaan seniman ternama Indonesia, yaitu Raden Saleh. Sesuai dengan namanya, lukisan ini menggambarkan pemandangan alam di area Megamendung, Puncak, Bogor pada masa itu. Sebagai informasi, lukisan ini yang menaikkan status dan pamor pelukis asal Semarang ini. Saat ini, lukisan “A View of Mount Megamendung” dimiliki oleh seorang kolektor seni asal Inggris yang dibeli seharga Rp36 miliar di Drout Paris Prancis.'],
            ['id'=> 7, 'judul'=> 'The Ruins and The Piano','seniman'=>'Sindudarsono Sudjojono','jenis'=>'Lukisan','tahun'=>1956,'gambar'=>'images/p.png','deskripsi'=>'Lukisan karya seniman Indonesia yang terkenal di dunia selanjutnya adalah “The Ruins and The Piano” yang dibuat oleh Sindudarsono Sudjojono. Dalam lukisan ini terdapat sebuah piano yang masih utuh tergeletak di tengah reruntuhan bencana alam. Piano itu bagaikan sebuah barang baru yang baru saja diletakkan di lingkungan yang asing. Mengutip dari laman Christie, piano itu merupakan simbol dari Rose yang merupakan seorang penyanyi mezzosoprano yang memiliki piano di rumahnya. Gambar ini secara jelas menggambarkan dunia dalam Sudjojono yang dibiarkan amburadul dan berbelit-belit. Di bagian sebelah kiri dan kanan lukisan, terdapat sesosok laki-laki yang melangkah ke kejauhan, seakan ingin meninggalkan segalanya. Memiliki lukisan yang penuh dengan makna dan emosi yang terpendam, lukisan “The Ruins and The Piano” berhasil terjual Balai Lelang  Christie’s Hong Kong pada bulan Mei 2017 dengan harga Rp15,74 miliar.'],
            ['id'=> 8, 'judul'=> 'The Man from Bantul','seniman'=> 'I Nyoman','jenis'=>'Lukisan','tahun'=>2000,'gambar'=>'images/b.png','deskripsi'=>'Lukisan sering dijadikan sebagai media untuk menyampaikan pandangan sosial dan politik. Begitulah yang tergambarkan dalam lukisan yang berjudul “The Man from Bantul”. Karya I Nyoman itu menggambarkan situasi politik di Indonesia yang dikemas dalam bentuk sebuah permainan. Secara simbolis, lukisan ini menggambarkan tentang pertarungan keji tanpa memikirkan rasa kemanusiaan. Menyimpan sudut pandang politik yang kritis, karya I Nyoman Mastriadi ini berhasil terjual di harga Rp9,71 miliar melalui Lelang Sotheby’s Hong Kong di tahun 2008.'],
            ['id'=> 9, 'judul'=> 'Pasukan Kita di Bawah Pimpinan Pangeran Diponegoro','seniman'=>'Raden Saleh','jenis'=>'Lukisan','tahun'=>1979,'gambar'=>'images/pd.png','deskripsi'=>'“Pasukan Kita di Bawah Pimpinan Pangeran Diponegoro” yang dibuat oleh Raden Saleh. Lukisan ini menggambarkan perjuangan Pangeran Diponegoro dalam peristiwa perang Jawa di tahun 1825-1830. Lukisan ini sangat terkenal di mancanegara. Bahkan karya Raden Saleh yang satu ini berhasil terjual seharga Rp100,9 miliar di Balai Lelang Sotheby’s Hong Kong pada April 2014.'],
            ['id'=> 10, 'judul'=> 'The Bull Hunt','seniman'=>'Raden Saleh','jenis'=> 'Lukisan','tahun'=> 1855,'gambar'=>'images/bh.png','deskripsi'=> '“Perburuan Banteng” atau “The Bull Hunt” atau "La Chasse au Taureau Sauvage" milik Raden Saleh. Lukisan ini di gambar di atas kanvas berukuran 110x180 cm yang menunjukkan konflik yang terjadi di antara manusia dengan hewan liar. Melalui goresan kuas yang lembut, Raden Saleh berhasil membuat lukisan ini terlihat sangat dramatis. Uniknya, orang yang pernah memiliki lukisan ini menganggap “Perburuan Banteng” tidak bernilai besar dan menyimpannya di gudang bawah tanah. Sampai suatu ketika, dia mencoba menghubungi seorang kolektor barang seni bernama Jack-Philipp Ruellan dan mengetahui bahwa lukisan itu merupakan karya seniman ternama di Indonesia dan memiliki nilai yang sangat besar. Di tahun 2018, lukisan itu dilelang di Prancis dan berhasil mendapat penawaran hingga Rp150 miliar dan menghebohkan para kolektor seni dunia pada saat itu.'],
            ['id'=> 11, 'judul'=> 'Patung Garuda Wisnu Kencana','seniman'=> 'I Nyoman Nuarta','jenis'=>'Patung','tahun'=> 1989,'gambar'=> 'images/bl.jpg','deskripsi'=> 'Patung GWK adalah patung Dewa Wisnu yang menunggang Burung Garuda. Dibangun setinggi 75 meter, dengan pondasi 70 meter tinggi sayap burung Garuda yang membentang selebar 66 meter. Patung yang merepresentasikan Dewa Wisnu sedang menunggangi Burung Garuda ini dibuat oleh I Nyoman Nuarta dalam waktu hingga 28 tahun. Pembangunan patung GWK oleh I Nyoman Nuarta telah muncul sejak tahun 1989. Setahun kemudian pada 1990, usulan Nyoman Nuarta pun disetujui oleh Presiden Soeharto. Pembangunan berjalan sampai dengan peletakan batu pertama yang dilakukan tujuh tahun kemudian pada 8 Juni 1997. Imbas krisis moneter 1997-1998, proyek pembangunan patung GWK sempat dihentikan sementara. Pembangunan dilanjutkan kembali pada 2013 hingga akhirnya diresmikan tahun 2018 oleh Presiden Jokowi. Hal ini berarti bahwa sejarah patung GWK oleh I Nyoman Nuarta butuh waktu 28 tahun hingga akhirnya terwujud.'],
            ['id'=> 12, 'judul'=> 'Patung Dolorosa Sinaga','seniman'=> 'Dolorosa Sinaga','jenis'=>'Patung','tahun'=> 1998,'gambar'=> 'images/ds.jpeg','deskripsi' => 'Karya-karya Dolorosa Sinaga mencerminkan perhatiannya terhadap isu-isu sosial dan budaya, seperti keimanan, krisis, solidaritas, multikulturalisme, perjuangan perempuan, dan hak asasi manusia. Pada 1987, ia mewakili Indonesia dalam Asean Square Sculpture Symposium dan menghasilkan karya besar seperti Gate of Harmony*di Kuala Lumpur, Malaysia, serta *he Crisis*di Hue, Vietnam, yang dibuat pada 1998. Salah satu karyanya yang terkenal di Indonesia adalah Monumen Semangat 66 di Jalan H.R. Rasuna Said, Kuningan, Jakarta Selatan. Selain itu, ia juga pernah menciptakan elemen estetika untuk Bandar Kota Kemayoran, Jakarta, serta beberapa patung di Taman Kalibesar, Kota Tua Jakarta. Pada 1987, Dolorosa Sinaga mendirikan Studio Somalaing sebagai wadah bagi kreativitasnya dan juga sebagai pusat pembelajaran seni patung. Di studio yang terletak di Pinang Ranti, Jakarta Timur ini, Dolorosa tidak hanya menghasilkan karya-karya monumental, tetapi juga membina generasi penerus seniman patung. Dengan sabar dan telaten, ia melatih para pekerjanya menjadi ahli dalam berbagai teknik pembuatan patung, mulai dari mencetak, mewarnai, hingga membuat model. Studio Somalaing pun menjadi tempat yang terbuka bagi siapa saja yang ingin belajar dan mendalami seni patung.'],
        ];

        $karya=collect($data)->firstWhere('id', $id);

        if(!$karya){
            return redirect()->route('pengelolaan')->with('error','Karya tidak ditemukan');
        }
        return view('detailkarya', compact('karya'));
    }

    public function logout(Request $request){
        $request->session()->forget('username');
        return redirect()->route('login')->with('success','Berhasil logout');
    }
}
