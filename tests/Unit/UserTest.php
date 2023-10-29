<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_age(): void
    {
        $user = new User;
        $user->age = 11;

        $this->assertEquals('Menor de edad', $user->age);
    }

    public function test_name_lowercase(): void
    {
        $user = new User;
        $user->name = 'Jorge';

        $this->assertEquals('jorge', $user->name);
    }
}
