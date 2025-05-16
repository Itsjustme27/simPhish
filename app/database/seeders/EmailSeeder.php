<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Email;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Email::insert([
            [
                'sender' => 'support@fb.com',
                'subject' => 'Account Suspended',
                'body' => 'Someone tried to log in. Click here to change password.',
            ],
            [
                'sender' => 'info@github.com',
                'subject' => 'Security Alert',
                'body' => 'We detected unusual activity in your GitHub account.',
            ],
            [
                'sender' => 'admin@banksecure.com',
                'subject' => 'Update Your Details',
                'body' => 'Click here to avoid account suspension!',
            ],
            [
                'sender' => 'newsletter@laravel.com',
                'subject' => 'Laravel News Weekly',
                'body' => 'Check out the new features in Laravel 11!',
            ],
        ]);
    }
}
