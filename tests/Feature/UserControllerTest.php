<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\DatabaseSeed;
use Tests\DefaultUser;

class UserControllerTest extends TestCase
{
    use DatabaseSeed;
    use DefaultUser;

    public function newUserProvider()
    {
        return [
            ['New User', 'newuser@test.net', 'newuserpass', 'newuserpass', true],
            [null, 'newuser@test.net', 'newuserpass', 'newuserpass', false],
            ['', 'newuser@test.net', 'newuserpass', 'newuserpass', false],
            ['New User', null, 'newuserpass', 'newuserpass', false],
            ['New User', '', 'newuserpass', 'newuserpass', false],
            ['New User', '@test.net', 'newuserpass', 'newuserpass', false],
            ['New User', 'newusertest.net', 'newuserpass', 'newuserpass', false],
            ['New User', 'newuser@test', 'newuserpass', 'newuserpass', false],
            ['New User', 'newuser@test.net', 'pass', 'pass', false],
            ['New User', 'newuser@test.net', 'newuserpass', null, false],
            ['New User', 'newuser@test.net', 'newuserpass', '', false],
            ['New User', 'newuser@test.net', null, null, false],
            ['New User', 'newuser@test.net', '', '', false]
        ];

        /* Found a bug?
         * See App\Http\Requests\UserRequest
         * line 32:
         *
         * if ( $this->method === 'POST' ) {
         *
         * This condition is false when in testing. Consequently,
         * the password rule is not added to the returned array.
         * When the rule is manually added the tests pass.
         *
         * UPDATE
         *
         * I had commented the last 5 items in the provider to
         * avoid failing on bad passwords. But I've sorted out the
         * problem. I've updated UserRequest to check
         * $this->server('REQUEST_METHOD') if $this->method is null.
         * I had missed the server() method before while I was off
         * trying to understand how the request differs in testing.
         *
         * I presume it's not a bug but I'll continue to look into why
         * it and several other members are null in tests.
         *
         */
    }


    /**
     * @test
     * @return void
     */
    public function it_lists_users()
    {
        $user = $this->getDefaultUser();

        $response = $this->actingAs($user)
            ->get('/users');

        $response->assertSee('All Users');
    }


    /**
     * @test
     * @return void
     */
    public function it_fetches_user_for_show()
    {
        $user = $this->getDefaultUser();

        $response = $this->actingAs($user)
            ->get('/users/' . $user->id);

        $response->assertSee('User Details');

        $response->assertViewHas('user', $user);
    }


    /**
     * @test
     * @return void
     */
    public function it_fetches_user_for_edit()
    {
        $user = $this->getDefaultUser();

        $response = $this->actingAs($user)
            ->get('/users/' . $user->id . '/edit');

        $response->assertSee('Edit User');

        $response->assertViewHas('user', $user);
    }


    /**
     * @test
     * @dataProvider    newUserProvider
     * @return void
     */
    public function it_creates_new_users($name, $email, $password, $password_confirmation, $expected)
    {
        $user = $this->getDefaultUser();

        $data = [
            'name'                  => $name,
            'email'                 => $email,
            'password'              => $password,
            'password_confirmation' => $password_confirmation
        ];

        $response = $this->actingAs($user)
            ->post('/users', $data);

        if ( $expected ) {
            $this->assertDatabaseHas('users', ['name' => $name]);
        }
        else {
            $this->assertDatabaseMissing('users', ['name' => $name]);
        }
    }


    /**
     * @test
     * @return void
     */
    public function it_deletes_users()
    {
        $user    = $this->getDefaultUser();
        $newUser = factory(\App\User::class)->create();

        $this->assertDatabaseHas('users', ['name' => $newUser->name]);

        // using route model binding
        $response = $this->actingAs($user)
            ->call('DELETE', '/users/' . $newUser->id);

        $this->assertDatabaseMissing('users', ['name' => $newUser->name]);
    }
}
