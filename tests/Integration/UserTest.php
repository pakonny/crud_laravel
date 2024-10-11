<?php

namespace Tests\Integration;
use Tests\TestCase;

class UserTest extends TestCase
{
     // // mehtod setup dijalankan setiap kali method" dari test itu mulai dijalankan
    // protected function setUp(): void
    // {
    //     Parent::setUp();
    //     var_dump("halo");
    // }

    // // method teardown dijalankan setiap kali method" dari test itu selesi dijalankan
    // protected function tearDown(): void
    // {
    //     Parent::tearDown();
    //     var_dump("berakhir");
    // }
    public function test_user_success()
    {
        $this->assertTrue(true);
    }
     // public function test_example_2(): void
    // {
    //     var_dump("test 2");
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
