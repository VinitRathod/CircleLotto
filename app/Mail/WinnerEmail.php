<?php

namespace App\Mail;

use App\Models\GroupMembers;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WinnerEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    private $user;
    private $circle;
    public $winner;
    public $ticket;
    public function __construct($user, $circle, $winner, $ticket)
    {
        //
        $this->circle = $circle;
        $this->user = $user;
        $this->winner = $winner;
        $this->ticket = $ticket;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Circle Lotto Results',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $groupMembers = GroupMembers::where('circle_id', $this->circle->id)->count();
        // dd($groupMembers, $this->circle, $this->user, $this->winner, $this->ticket);
        return new Content(
            view: 'emails.winner',
            with: [
                'circle_name' => $this->circle->circle_name,
                'circle_type' => $this->circle->circle_type,
                'total_circle_amount' => $groupMembers * (int)$this->circle->circle_amount,
                'winner' => $this->winner,
                'ticket' => $this->ticket,
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
        return [];
    }
}
