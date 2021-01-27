<?php

namespace App\Mail;

use App\Model\PackageSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PackageMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $packageSubmission;
    public function __construct(PackageSubmission $packageSubmission)
    {
        $this->packageSubmission = $packageSubmission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.package-submit-email')->subject("Enquiry for :".$this->packageSubmission->package->title);
    }
}
