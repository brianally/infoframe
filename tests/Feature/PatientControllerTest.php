<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\DatabaseSeed;
use Tests\DefaultUser;

class PatientControllerTest extends TestCase
{
    use DatabaseSeed;
    use DefaultUser;

    public function newPatientProvider()
    {
        return [
            ['New Patient', 'newpatient@test.net', '(555) 555-5555', 50, 'm', true],
            ['New Patient', 'newpatient@test.net', '(555) 555-5555', 50, 'f', true],
            ['New Patient', 'newpatient@test.net', '(555) 555-5555', 50, '?', true],
            [null, 'newpatient@test.net', '(555) 555-5555', 50, 'm', false],
            ['', 'newpatient@test.net', '(555) 555-5555', 50, 'm', false],
            ['New Patient', 'newpatient@test', '(555) 555-5555', 50, 'm', false],
            ['New Patient', null, '(555) 555-5555', 50, 'm', false],
            ['New Patient', '', '(555) 555-5555', 50, 'm', false],
            ['New Patient', 'newpatient@test.net', null, 50, 'm', false],
            ['New Patient', 'newpatient@test.net', '', 50, 'm', false],
            ['New Patient', 'newpatient@test.net', '(555) 555-5555', null, 'm', false],
            ['New Patient', 'newpatient@test.net', '(555) 555-5555', '', 'm', false],
            ['New Patient', 'newpatient@test.net', '(555) 555-5555', 50, null, false],
            ['New Patient', 'newpatient@test.net', '(555) 555-5555', 50, '', false]
        ];
    }


    /**
     * @test
     * @return void
     */
    public function it_lists_patients()
    {
        $user = $this->getDefaultUser();

        $response = $this->actingAs($user)
            ->get('/patients');

        $response->assertSee('All Patients');
    }


    /**
     * @test
     * @return void
     */
    public function it_fetches_patient_for_show()
    {
        $user    = $this->getDefaultUser();
        $patient = factory(\App\Patient::class)->create();

        $response = $this->actingAs($user)
            ->get('/patients/' . $patient->id);

        $response->assertSee('Patient Details');
        $response->assertSee($patient->name);
    }


    /**
     * @test
     * @return void
     */
    public function it_fetches_user_for_edit()
    {
        $user    = $this->getDefaultUser();
        $patient = factory(\App\Patient::class)->create();

        $response = $this->actingAs($user)
            ->get('/patients/' . $patient->id . '/edit');

        $response->assertSee('Edit Patient');
        $response->assertSee($patient->name);
    }


    /**
     * @test
     * @dataProvider    newPatientProvider
     * @return void
     */
    public function it_creates_new_patients($name, $email, $phone, $age, $gender, $expected)
    {
        $user = $this->getDefaultUser();

        $patientData = [
            'name'       => $name,
            'email'      => $email,
            'phone'      => $phone,
            'age'        => $age,
            'gender'     => $gender,
            'surgeon_id' => 1       // surgeons table already seeded
        ];

        $response = $this->actingAs($user)
            ->post('/patients', $patientData);

        if ( $expected ) {
            $this->assertDatabaseHas('patients', ['name' => $name]);
        }
        else {
            $this->assertDatabaseMissing('patients', ['name' => $name]);
        }
    }



    /**
     * @test
     * @return void
     */
    public function it_deletes_patients()
    {
        $user    = $this->getDefaultUser();
        $patient = factory(\App\Patient::class)->create();


        $this->assertDatabaseHas('patients', ['name' => $patient->name]);

        // using route model binding
        $response = $this->actingAs($user)
            ->call('DELETE', '/patients/' . $patient->id);

        $this->assertDatabaseMissing('patients', ['name' => $patient->name]);
    }
}
