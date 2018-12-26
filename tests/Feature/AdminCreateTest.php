<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Admin;

class AdminCreateTest extends TestCase
{
    /** @test */
    function create_admin()
    {
        $user = 'admin';
        $email =  'admin1@gmail.com';
        $password = '123456';

        $admin = factory(Admin::class)->create([
            'name' => $user,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $this->assertTrue(true);
    }
}
