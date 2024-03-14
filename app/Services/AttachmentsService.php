<?php

namespace App\Services;

use App\Models\Attachments;

class AttachmentsService extends Service
{

    protected $attachments;
    
    public function __construct(Attachments $attachments)
    {
        $this->attachments = $attachments;
    }
}