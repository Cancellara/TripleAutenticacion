<?php

namespace Tests\Feature\Autentication;


use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModuleTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function it_creates_a_new_user()
    {
        $this->post('/register/', [
            'name' => 'Miguel',
            'email' => 'miguelintxi@gmail.com',
            'password' => '123456',
            'password_confirmation' => '123456',

        ])->assertRedirect('user/panel');

        //Si la tabla por defecto no es user hay que pasarla como argumento
        $this->assertCredentials([
            'email'=>'miguelintxi@gmail.com',
            'password'=>'123456',
        ]);
    }

    /** @test */
    function it_login_an_existing_user()
    {
        $user = 'Miguel';
        $email =  'miguelintxi@gmail.com';
        $password = '123456';

        factory(User::class)->create([
            'name' => $user,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $this->post('/login', [
            'email' => $email,
            'password' => $password,
        ])->assertRedirect('user/panel');
    }


}
