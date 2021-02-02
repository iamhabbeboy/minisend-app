<?php

namespace Tests\Feature;

use App\Models\Email;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test email creation endpoint
     *
     * @return void
     */
    public function test_email_store_endpoint()
    {
        $email = Email::factory()->create();
        $data = [
            "sender" => "aiboudn@gmail.com",
            "subject" => "hello world",
            "recipient" => "info@gmil.com",
            "content" => "Hello world",
            "attachmentId" => "[]"
        ];
        $this->post(route('emails.store'), $data)
        ->assertJson(['data' => $data]);
    }
    /**
     * Test list emails endpoint
     */
    public function test_all_email_endpoint()
    {
        $response = $this->json('GET', route('emails.index'));
        $response->assertStatus(200);
    }

     /**
     * Test single emails endpoint
     */
    public function test_single_email_endpoint()
    {
        $id = 1;
        $response = $this->json('GET', route('emails.show', $id));
        $response->assertStatus(200);
    }

    /**
     * Test single recipient endpoint
     */
    public function test_single_recipient_endpoint()
    {
        $response = $this->json('GET',
            route('emails.recipient', 'iamhabbeboy@gmail.com')
        );
        $response->assertStatus(200);
    }

    /**
     * Test email search endpoint
     */
    public function test_search_emails_endpoint()
    {
        $response = $this->json('GET',
            route('emails.search', 'iamhabbeboy@gmail.com')
        );
        $response->assertStatus(200);
    }
}
