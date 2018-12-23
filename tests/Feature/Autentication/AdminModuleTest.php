<?php

namespace Tests\Feature\Autentication;

use App\Admin;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_logins_an_existing_admin()
    {

        $this->withoutExceptionHandling();

        $user = 'admin';
        $email =  'admin@gmail.com';
        $password = '123456';

        $admin = factory(admin::class)->create([
            'name' => $user,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        //dd($shop);

        $this->post('/admin/login', [
            'email' => $email,
            'password' => $password,
        ])->assertRedirect('admin/panel');
    }
}
