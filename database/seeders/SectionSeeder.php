<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfileCard;
use App\Models\TextDescription;
use App\Models\DataTable;
use App\Models\TableRow;
use App\Models\TagCollection;
use App\Models\Tag;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Membuat ProfileCard
        $profileCard = ProfileCard::create([
            'front_degree' => 'Dr.',
            'name' => 'Rendi Santoso',
            'back_degree' => 'M.Sc., Ph.D.',
            'title' => 'Profesor di Bidang Ilmu Komputer',
            'specialization' => 'Kecerdasan Buatan dan Pembelajaran Mesin',
            'email' => 'budi.santoso@example.ac.id',
            'website' => 'https://budisantoso.example.ac.id',
            'address' => 'Fakultas Ilmu Komputer, Universitas Indonesia, Depok',
        ]);

        // Membuat Section untuk ProfileCard
        Section::create([
            'title' => 'Profil Dosen',
            'description' => 'Informasi tentang dosen pengajar',
            'position' => 1,
            'is_active' => true,
            'content_type' => ProfileCard::class,
            'content_id' => $profileCard->id,
        ]);

        // 2. Membuat TextDescription
        $textDescription = TextDescription::create([
            'heading' => 'Tentang Program Studi',
            'content' => '<p>Program Studi Teknik Informatika didirikan pada tahun 1986 dan telah menghasilkan ribuan lulusan yang berkiprah di industri teknologi informasi.</p><p>Visi program studi adalah menjadi pusat unggulan pendidikan dan penelitian di bidang ilmu komputer yang diakui secara internasional.</p><h3>Misi Program Studi:</h3><ul><li>Menyelenggarakan pendidikan tinggi yang berkualitas di bidang teknik informatika</li><li>Melakukan penelitian dan pengembangan ilmu pengetahuan di bidang teknik informatika</li><li>Menerapkan ilmu pengetahuan dan teknologi untuk kesejahteraan masyarakat</li></ul>',
        ]);

        // Membuat Section untuk TextDescription
        Section::create([
            'title' => 'Deskripsi Program Studi',
            'description' => 'Informasi lengkap tentang program studi',
            'position' => 2,
            'is_active' => true,
            'content_type' => TextDescription::class,
            'content_id' => $textDescription->id,
        ]);

        // 3. Membuat DataTable
        $dataTable = DataTable::create([
            'title' => 'Jadwal Mata Kuliah',
            'description' => 'Jadwal perkuliahan semester ganjil tahun akademik 2023/2024',
            'columns' => [
                ['key' => 'code', 'label' => 'Kode MK'],
                ['key' => 'course', 'label' => 'Mata Kuliah'],
                ['key' => 'day', 'label' => 'Hari'],
                ['key' => 'time', 'label' => 'Waktu'],
                ['key' => 'room', 'label' => 'Ruangan'],
            ],
        ]);

        // Menambahkan baris untuk DataTable
        TableRow::create([
            'data_table_id' => $dataTable->id,
            'values' => [
                'code' => 'CS101',
                'course' => 'Pengantar Ilmu Komputer',
                'day' => 'Senin',
                'time' => '08:00 - 10:30',
                'room' => 'Gedung A - 301',
            ],
        ]);

        // Membuat Section untuk DataTable
        Section::create([
            'title' => 'Jadwal Kuliah',
            'description' => 'Informasi jadwal perkuliahan terbaru',
            'position' => 3,
            'is_active' => true,
            'content_type' => DataTable::class,
            'content_id' => $dataTable->id,
        ]);

        // 4. Membuat TagCollection
        $tagCollection = TagCollection::create([
            'title' => 'Bidang Penelitian',
            'description' => 'Bidang penelitian yang menjadi fokus program studi',
        ]);

        // Menambahkan tags
        $tags = [
            ['name' => 'Kecerdasan Buatan', 'color' => '#3b82f6'], // Biru
            ['name' => 'Data Science', 'color' => '#10b981'], // Hijau
            ['name' => 'Keamanan Jaringan', 'color' => '#ef4444'], // Merah
            ['name' => 'Komputasi Awan', 'color' => '#8b5cf6'], // Ungu
            ['name' => 'Pengembangan Web', 'color' => '#f59e0b'], // Oranye
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'tag_collection_id' => $tagCollection->id,
                'name' => $tag['name'],
                'color' => $tag['color'],
            ]);
        }

        // Membuat Section untuk TagCollection
        Section::create([
            'title' => 'Area Riset',
            'description' => 'Bidang penelitian utama di program studi',
            'position' => 4,
            'is_active' => true,
            'content_type' => TagCollection::class,
            'content_id' => $tagCollection->id,
        ]);
    }
}
