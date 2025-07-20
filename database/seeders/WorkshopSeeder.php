<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkshopSeeder extends Seeder
{
    public function run(): void
    {
        $data = 
            // [judul, pemateri, waktu, lokasi, detail, harga]
            [
                ['Web Design Modern', 'Andi Kurniawan', '2025-07-12 09:00', 'Ruang 101', 'Belajar tren terbaru dalam desain web responsif dan interaktif.', 50000],
                ['Cybersecurity Basics', 'Rina Dewi', '2025-07-13 13:00', 'Lab Jaringan', 'Pengenalan dasar keamanan siber untuk pengguna dan pengembang.', 45000],
                ['Mobile App Development', 'Dedi Hidayat', '2025-07-14 10:00', 'Ruang 203', 'Bangun aplikasi Android & iOS dengan pendekatan modern.', 60000],
                ['UI/UX Design Sprint', 'Fitria Hasanah', '2025-07-15 08:30', 'Studio Desain', 'Sesi intensif untuk membuat dan menguji prototipe desain.', 40000],
                ['Python for Data Science', 'Yoga Saputra', '2025-07-16 10:00', 'Lab Komputer 1', 'Dasar Python untuk analisis dan visualisasi data.', 70000],
                ['Database Optimization', 'Lilis Nurhaliza', '2025-07-17 11:00', 'Aula B', 'Optimasi performa query dan struktur database relasional.', 55000],
                ['ReactJS Advance', 'Farhan Maulana', '2025-07-18 14:00', 'Ruang 305', 'Manajemen state, hook, dan arsitektur aplikasi React.', 65000],
                ['Startup Pitching 101', 'Indah Wulandari', '2025-07-19 09:00', 'Gedung Inovasi', 'Belajar menyusun pitch deck dan presentasi startup.', 30000],
                ['Networking Fundamentals', 'Bambang Priyo', '2025-07-20 13:30', 'Lab Cisco', 'Konsep dasar jaringan komputer dan simulasi.', 45000],
                ['Agile Scrum Workshop', 'Nina Aulia', '2025-07-21 10:00', 'Ruang 401', 'Penerapan metodologi Agile dan peran dalam tim Scrum.', 50000],
                ['Flutter for Beginners', 'Yusuf Ibrahim', '2025-08-01 09:00', 'Lab Mobile', 'Membangun aplikasi mobile dengan Flutter dan Dart.', 60000],
                ['Big Data Analysis', 'Ratna Dewanti', '2025-08-05 14:00', 'Gedung IT Center', 'Teknik analisis dan pemrosesan data skala besar.', 75000],
                ['Cloud Computing Intro', 'Surya Purnama', '2025-08-10 11:00', 'Ruang 302', 'Pengantar layanan cloud seperti AWS, GCP, dan Azure.', 55000],
                ['DevOps Strategy', 'Eka Santika', '2025-08-15 13:00', 'Gedung Seminar', 'CI/CD, otomatisasi, dan integrasi tim dev & ops.', 60000],
                ['Blockchain Essentials', 'Teguh Ramadhan', '2025-08-20 09:30', 'Lab Blockchain', 'Dasar teknologi blockchain dan implementasi smart contract.', 70000],
                ['Penulisan Ilmiah', 'Anisa Widya', '2025-09-01 10:30', 'Ruang Perpustakaan', 'Menulis karya ilmiah yang baik dan sesuai kaidah.', 30000],
                ['Machine Learning Basics', 'Rizky Akbar', '2025-09-05 14:00', 'Lab AI', 'Model ML dasar seperti regresi dan klasifikasi.', 80000],
                ['Tech Career Talk', 'Nur Azizah', '2025-09-10 13:00', 'Aula Serbaguna', 'Tips karier dan peluang kerja di dunia teknologi.', 25000],
            ];
            
        

        foreach ($data as [$judul, $pemateri, $waktu, $lokasi, $detail, $harga]) {
            DB::table('workshops')->insert([
                'judul' => $judul,
                'pemateri' => $pemateri,
                'waktu' => Carbon::parse($waktu),
                'lokasi' => $lokasi,
                'detail' => $detail,
                'harga' => $harga,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
