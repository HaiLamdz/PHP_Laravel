<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // nơi cấu hình tiêu đề, cc, bcc, ...
            subject: 'Chào mừng bạn đến với hệ thống của chúng tôi!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Nơi cấu hình nội dung dữ liệu cần trình bày trong email 
        return new Content(
            view: 'email.welcome',
            with: [
                'user' => $this->user,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // DÙng để gắn kèm các file muốn gửi cùng mail
        return [];
    }
}
