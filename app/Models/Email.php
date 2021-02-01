<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $table = 'emails';
    protected $fillable = [
        'sender',
        'recipient',
        'subject',
        'content'
    ];

    /**
     * Get the attachment files.
     */
    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'mail_id', 'id');
    }
}
