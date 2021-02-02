<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_email_store_endpoint()
    // {
    //     $data = [
    //         'sender' => 'abiodun.solomon.a@gmail.com',
    //         'subject' => 'Hello world',
    //         'recipient' => 'iamhabbeboy@gmail.com',
    //         'content' => 'Hello world',
    //     ];
    //     $this->post(route('emails.store'), $data)
    //     ->assertStatus(201);
    // }

    public function test_all_email_endpoint()
    {
        $response = $this->json('GET', route('emails.index'));
        $response->assertStatus(200);
        // ->responseJson({
        // });
    }
}
