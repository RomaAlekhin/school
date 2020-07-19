<?php

namespace Tests\Feature;

use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function testTeacherCanRegister()
    {

        $response = $this->json('POST', '/teacher/register', [
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'super-secret',
            'password_confirmation' => 'super-secret',
            'specialty' => 'General Surgery',
        ]);

        $response->assertStatus(201);

        $user = User::first();
        $teacher = Teacher::first();

        $this->assertNotNull($user);
        $this->assertNotNull($teacher);

        $this->assertEquals('General Surgery', $user->specialty);
        $this->assertEquals('General Surgery', $teacher->specialty);
    }

    /** @test */
    public function testStudentCanRegister()
    {
        $response = $this->json('POST', '/app/register', [
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'super-secret',
            'password_confirmation' => 'super-secret',
            'age' => 12,
            'parent_name' => 'Kate',
        ]);

        $response->assertStatus(201);

        $user = User::first();
        $student = Student::first();

        $this->assertNotNull($user);
        $this->assertNotNull($student);

        $this->assertEquals(12, $user->age);
        $this->assertEquals(12, $student->age);

        $this->assertEquals('Kate', $user->parent_name);
        $this->assertEquals('Kate', $student->parent_name);
    }

    /** @test */
    public function testStudentCanLogin()
    {
        $response = $this->json('POST', '/app/register', [
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'john@example.com',
            'password' => 'super-secret',
            'password_confirmation' => 'super-secret'
        ]);

        $response = $this->json('POST', '/app/login', [
            'email' => 'john@example.com',
            'password' => 'super-secret'
        ]);

        $response->assertStatus(302);

        $user = User::first();

        $this->assertEquals('student', $user->type);
        $this->assertNotNull($user);
    }
}
