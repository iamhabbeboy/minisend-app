<?php

namespace Tests\Feature;

use App\Models\Attachment;
use Database\Factories\AttachmentFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AttachmentApiTest extends TestCase
{
    public function test_image_support_for_email_attachment()
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->json('POST', route('attachment.store'), [
            'attachments' => [$file],
        ]);
        $response->assertStatus(200);
    }

    public function test_pdf_support_for_email_attachment()
    {
        Storage::fake('document');

        $file = UploadedFile::fake()->image('document.pdf');

        $response = $this->json('POST', route('attachment.store'), [
            'attachments' => [$file],
        ]);
        $response->assertStatus(200);
    }

}
