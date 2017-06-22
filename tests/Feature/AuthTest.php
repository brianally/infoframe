<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\DatabaseSeed;
use Tests\DefaultUser;
use App\User;

class AuthTest extends TestCase
{
    use DatabaseSeed;
    use DefaultUser;

    /**
     * redirects to login if not authorised.
     *
     * @return void
     * @test
     */
    public function test_it_redirects_to_login()
    {
        $response = $this->get('/');

        $response->assertStatus(302);

        $response->assertRedirect('/login');
    }


    /**
     * default user is authorised.
     *
     * @return void
     * @test
     */
    public function test_default_login()
    {
        $data = ['email' => 'default@test.net', 'password' => 'default'];

        $response = $this->post('/login', $data);

        $response->assertStatus(302);

        $response->assertRedirect('/home');
    }


    /**
     * logout redirects and removes authorisation
     *
     * @return void
     * @test
     */
    public function test_logout()
    {
        $user = $this->getDefaultUser();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertStatus(302);

        $response->assertRedirect('/');
    }
}
