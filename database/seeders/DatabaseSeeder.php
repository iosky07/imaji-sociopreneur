<?php

namespace Database\Seeders;

use App\Models\Home;
use App\Models\SizeLogo;
use App\Models\Status;
use App\Models\TypeBudget;
use App\Models\TypeCampaign;
use App\Models\TypeContent;
use App\Models\TypeFinance;
use App\Models\TypeSubmission;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['title' => 'menunggu']);
        Status::create(['title' => 'disetujui']);
        Status::create(['title' => 'ditolak']);

        TypeContent::create(['title' => 'blog']);
        TypeContent::create(['title' => 'event']);
        TypeContent::create(['title' => 'project']);

        TypeCampaign::create(['title' => 'penghargaan']);
        TypeCampaign::create(['title' => 'slider']);

        TypeBudget::create(['title' => 'pengeluaran']);
        TypeBudget::create(['title' => 'pemasukan']);

        TypeFinance::create(['title' => 'rab']);
        TypeFinance::create(['title' => 'spj']);

        TypeSubmission::create(['title'=>'barang']);
        TypeSubmission::create(['title'=>'invoice']);
        TypeSubmission::create(['title'=>'jasa']);

        Home::create([
            'phone' => '+62 823-3545-6772',
            'address' => 'Jalan Tawang Mangu Gang 6 No 10 Sumbersari Jember',
            'full_address' => 'Jalan Tawang Mangu Gang 6 No 10 Sumbersari Jember Jawa Timur Indonesia',
            'opens' => 'Weekdays 08.00-17.00',
            'email' => 'official@imajisociopreneur.id',
            'facebook' => 'https://www.facebook.com/imaji.socioprenur.1',
            'twitter' => 'https://twitter.com/imajisociopr',
            'instagram' => 'https://www.instagram.com/imajisociopreneur/',
            'whatsapp' => 'https://wa.me/6282335456772',
            'number_village' => '25',
            'number_garbage_bank' => '18',
            'number_imaji_academy' => '5',
            'number_cooperation' => '1',
            'number_public_community' => '1501',
        ]);

        SizeLogo::create(['title' => 'besar']);
        SizeLogo::create(['title' => 'kecil']);

        User::create([
            'name' => 'mokhamad asif',
            'email' => 'a@a',
            'role' => '1',
            'password' => bcrypt('asdasdasd')
        ]);
    }
}
