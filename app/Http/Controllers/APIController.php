<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use App\Berita;

class APIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function berita()
    {
        //get 5 berita terbaru
        $banner = Berita::all()->sortByDesc('created_at')->take(5);

        $bannerId = $banner->pluck('id');

        // get 5 berita terbaru muhammdiyah dan 8 berita terbaru imm diluar banner
        $persyarikatan = Berita::all()->where('star_name', 'muhammadiyah')->whereNotIn('id', $bannerId)->sortByDesc('created_at')->take(5);
        $imm = Berita::all()->where('star_name', 'imm')->whereNotIn('id', $bannerId)->sortByDesc('created_at')->take(8);

        $persyarikatanId = $persyarikatan->pluck('id');
        $immId = $imm->pluck('id');
        $id = $bannerId->merge($persyarikatanId)->merge($immId);

        // get 10 berita terbaru diluar banner, muhammadiyah, imm
        $umum = Berita::all()->whereNotIn('id', $id)->sortByDesc('created_at')->take(10);
        // $banner = $banner->flatten()->toArray();

        $object = [
            'state' => 200,
            'message' => 'success',
            'data' => [
                'module' => [
                    [
                        'm_s_name' => "banner",
                        'content' => $banner->flatten()->toArray()
                    ],
                    [
                        'm_s_name' => "Kabar Persyarikatan",
                        'm_s_style' => 3,
                        'content' => $persyarikatan->flatten()->toArray()
                    ],
                    [
                        'm_s_name' => "Kabar Ikatan",
                        'm_s_style' => 1,
                        'content' => $imm->flatten()->toArray()
                    ],
                    [
                        'm_s_name' => "Kabar Berita",
                        'm_s_style' => 4,
                        'content' => $umum->flatten()->toArray()
                    ]
                ]
            ]
        ];

        return response()->json($object);
    }

    public function doc()
    {    
        $doc = Dokumen::all()->toArray();

        $object = [
            'state' => 200,
            'message' => 'success',
            'data' => $doc
        ];

        return response()->json($object);
    }

    public function sambutan()
    {
        $object = [
            "state" => 200,
            "message" => "success",
            "data" => [
              "id" => 11,
              "judul" => "Tanfidz IMM",
              "detail" => "Sambutan Ketua Umum Dewan\r\nPimpinan Pusat Ikatan Mahasiswa Muhammadiyah\r\n\r\nAssalamu`alaikum Warahmatullahi Wabarakatuh.\r\n\r\nSegenap puji dan syukur kehadirat Allah SWT, atas rahmat serta hidayah-Nya kepada kita sekalian sehingga Dewan Pimpinan Pusat Ikatan Mahasiswa Muhammadiyah (DPP IMM) dapat mentanfidzkan hasil-hasil keputusan Muktamar XVI Ikatan Mahasiswa Muhammadiyah, yang diselenggarakan pada tanggal 26 Mei s/d 01 Juni 2014 di Kota Solo Jawa Tengah.\r\n\r\nMuktamar adalah forum pengambilan keputusan tertinggi dan kedudukannya paling sahih sebagai rujukan untuk memahami arah dan orientasi gerakan Ikatan Mahasiswa Muhammadiyah (IMM) secara nasional. Oleh karena itu menjadi kewajiban organisatoris bagi seluruh jajaran pimpinan di setiap level dan segenap anggota IMM untuk menaati dan melaksanakan dengan ikhlas dan penuh tanggung jawab bagi Ikatan, Persyarikatan serta Ummat dan Bangsa.\r\n\r\nAkhirnya, ucapan terimakasih yang tak terhingga kami ucapkan kepada Panitia Pengarah (Steering Comitte), Panitia Pemilihan (Election Comitte) dan Panitia Pelaksana Muktamar XVI IMM, serta kepada seluruh Kader dan Pimpinan DPD IMM Jawa Tengah selaku tuan rumah Muktamar XVI IMM yang telah menyukseskan Muktamar XVI IMM. Kepada Tim Penyusun Tanfidz Muktamar XVI IMM yang telah mengedit (teks) dan mengumpulkan materi hasil Muktarnar XVI IMM dan berbagai pihak yang telah menjadi sponsor yang telah membantu sehingga menjadi sebuah buku yang kami persembahkan untuk seluruh Kader dan Pimpinan IMM di seluruh Indonesia, semoga amal ibadahnya diberi limpahan pahala yang setimpal.\r\nBillahi fi sabilil haq, fastahiqul Khairat Wassalamu`alaikum warah matulahi Wabarokatuh.\r\n\r\n\r\nJakarta, 06 Agustus 2014\r\n\r\nDewan Pimpinan Pusat\r\nIkatan Mahasiswa Muhammadiyah\r\nKetua Umum,\r\n\r\nBeni Pramula",
              "sumber" => "Muktamar XVI",
              "foto" => "http://immku.irit-io.id/file/foto/Sq3EL53BBbdZMUeH.jpg",
            ]
        ];

        return response()->json($object);
    }

}
