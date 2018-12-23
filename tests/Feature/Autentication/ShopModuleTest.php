<?php

namespace Tests\Feature\Autentication;

use App\Shop;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShopModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_logins_an_existing_shop()
    {
        $this->withoutExceptionHandling();

        $user = 'shop1';
        $email =  'shop1@gmail.com';
        $password = '123456';

        $shop = factory(Shop::class)->create([
            'name' => $user,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        //dd($shop);

        $this->post('/shop/login', [
            'email' => $email,
            'password' => $password,
        ])->assertRedirect('shop/panel');
    }

    /** @test */
    function it_creates_a_new_shop()
    {
        $this->post('/shop/register/', [
            'name' => 'Shop2',
            'email' => 'shop2@gmail.com',
            'password' => '123456',
            'password_confirmation' => '123456',

        ])->assertRedirect('shop/panel');

        $this->assertDatabaseHas('shops',[
            'email' => 'shop2@gmail.com',
        ]);
    }
}
