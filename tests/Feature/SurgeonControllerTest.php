<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\DatabaseSeed;
use Tests\DefaultUser;

class SurgeonControllerTest extends TestCase
{
    use DatabaseSeed;
    use DefaultUser;

    public function newSurgeonProvider()
    {
        return [
            ['New Surgeon', 'newsurgeon@test.net', true],
            [null, 'newsurgeon@test.net', false],
            ['', 'newsurgeon@test.net', false],
            ['New Surgeon', null, false],
            ['New Surgeon', '', false],
            ['New Surgeon', 'newsurgeon@test', false],
            ['New Surgeon', '@test.net', false],
            ['New Surgeon', 'newsurgeontest.net', false]
        ];
    }


    /**
     * @test
     * @return void
     */
    public function it_lists_surgeons()
    {
        $user = $this->getDefaultUser();

        $response = $this->actingAs($user)
            ->get('/surgeons');

        $response->assertSee('All Surgeons');
    }


    /**
     * @test
     * @return void
     */
    public function it_fetches_surgeon_for_show()
    {
        $user    = $this->getDefaultUser();
        $surgeon = factory(\App\Surgeon::class)->create();

        $response = $this->actingAs($user)
            ->get('/surgeons/' . $surgeon->id);

        $response->assertSee('Surgeon Details');
        $response->assertSee($surgeon->email);
    }


    /**
     * @test
     * @return void
     */
    public function it_fetches_user_for_edit()
    {
        $user    = $this->getDefaultUser();
        $surgeon = factory(\App\Surgeon::class)->create();

        $response = $this->actingAs($user)
            ->get('/surgeons/' . $surgeon-> id . '/edit');

        $response->assertSee('Edit Surgeon');
        $response->assertSee($surgeon->email);
    }


    /**
     * @test
     * @dataProvider    newSurgeonProvider
     * @return void
     */
    public function it_creates_new_surgeons($name, $email, $expected)
    {
        $user = $this->getDefaultUser();

        $data = [
            'name'  => $name,
            'email' => $email
        ];

        $response = $this->actingAs($user)
            ->post('/surgeons', $data);

        if ( $expected ) {
            $this->assertDatabaseHas('surgeons', ['name' => $name]);
        }
        else {
            $this->assertDatabaseMissing('surgeons', ['name' => $name]);
        }
    }



    /**
     * @test
     * @return void
     */
    public function it_deletes_surgeons()
    {
        $user    = $this->getDefaultUser();
        $surgeon = factory(\App\Surgeon::class)->create();

        $this->assertDatabaseHas('surgeons', ['name' => $surgeon->name]);

        // using route model binding
        $response = $this->actingAs($user)
            ->call('DELETE', '/surgeons/' . $surgeon->id);

        $this->assertDatabaseMissing('surgeons', ['name' => $surgeon->name]);
    }



    /**
     * @test
     * @return void
     */
    public function it_will_not_delete_surgeons_with_patients()
    {
        $user    = $this->getDefaultUser();
        $surgeon = factory(\App\Surgeon::class)->create();
        $patient = factory(\App\Patient::class)->create();

        $this->assertDatabaseHas('surgeons', ['name' => $surgeon->name]);

        $patient->surgeon_id = $surgeon->id;
        $patient->save();

        // using route model binding
        $response = $this->actingAs($user)
            ->call('DELETE', '/surgeons/' . $surgeon->id);

        $this->assertDatabaseHas('surgeons', ['name' => $surgeon->name]);
    }
}
