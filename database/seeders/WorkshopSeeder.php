<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkshopSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['Web Design Modern', 'Andi Kurniawan', '2025-07-04 09:00', 'Ruang 101'],
            ['Cybersecurity Basics', 'Rina Dewi', '2025-07-04 13:00', 'Lab Jaringan'],
            ['Mobile App Development', 'Dedi Hidayat', '2025-07-05 10:00', 'Ruang 203'],
            ['UI/UX Design Sprint', 'Fitria Hasanah', '2025-07-06 08:30', 'Studio Desain'],
            ['Python for Data Science', 'Yoga Saputra', '2025-07-07 10:00', 'Lab Komputer 1'],
            ['Database Optimization', 'Lilis Nurhaliza', '2025-07-08 11:00', 'Aula B'],
            ['ReactJS Advance', 'Farhan Maulana', '2025-07-08 14:00', 'Ruang 305'],
            ['Startup Pitching 101', 'Indah Wulandari', '2025-07-09 09:00', 'Gedung Inovasi'],
            ['Networking Fundamentals', 'Bambang Priyo', '2025-07-10 13:30', 'Lab Cisco'],
            ['Agile Scrum Workshop', 'Nina Aulia', '2025-07-11 10:00', 'Ruang 401'],
            ['Flutter for Beginners', 'Yusuf Ibrahim', '2025-07-12 09:00', 'Lab Mobile'],
            ['Big Data Analysis', 'Ratna Dewanti', '2025-07-13 14:00', 'Gedung IT Center'],
            ['Cloud Computing Intro', 'Surya Purnama', '2025-07-14 11:00', 'Ruang 302'],
            ['DevOps Strategy', 'Eka Santika', '2025-07-15 13:00', 'Gedung Seminar'],
            ['Blockchain Essentials', 'Teguh Ramadhan', '2025-07-16 09:30', 'Lab Blockchain'],
            ['Penulisan Ilmiah', 'Anisa Widya', '2025-07-17 10:30', 'Ruang Perpustakaan'],
            ['Machine Learning Basics', 'Rizky Akbar', '2025-07-18 14:00', 'Lab AI'],
            ['Tech Career Talk', 'Nur Azizah', '2025-07-19 13:00', 'Aula Serbaguna'],
        ];

        foreach ($data as [$judul, $pemateri, $waktu, $lokasi]) {
            DB::table('workshops')->insert([
                'judul' => $judul,
                'pemateri' => $pemateri,
                'waktu' => Carbon::parse($waktu),
                'lokasi' => $lokasi,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
