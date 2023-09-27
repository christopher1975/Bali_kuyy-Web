<?php

namespace Database\Seeders;

use App\Models\Feedback;
use App\Models\User;
use App\Models\Wisata;
use Database\Factories\FeedbackFactory;
use Database\Factories\UserFactory;
use Database\Factories\WisataFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->seedUser();
        $this->seedWisata();
        $this->seedFeedback();
    }


    public function seedUser() {
        User::factory()->count(20)->create();
        
    }

    public function seedWisata() {
        Wisata::factory()->count(20)->create();
        
    }

    public function seedFeedback() {
        Feedback::factory()->count(20)->create();
    }
}