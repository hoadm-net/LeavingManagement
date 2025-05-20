<?php

namespace App\Mail;

use App\Models\Leaving;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RequestCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    /**
     * Create a new message instance.
     */
    public function __construct(Leaving $ticket)
    {
        //
        $this->afterCommit();
        $this->ticket = $ticket;
    }

    /**RequestCreated
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'A leave request has been created.',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.new-request-created',
            with: [
                'full_name' => $this->ticket->full_name,
                'email' => $this->ticket->email,
                'position' => $this->ticket->position,
                'shift' => $this->ticket->shift,
                'department'=> $this->ticket->department->name,
                'leave_days' => $this->ticket->leave_days,
                'from' => date('d-m-Y H:i', strtotime($this->ticket->from)),
                'to' => date('d-m-Y H:i', strtotime($this->ticket->to)),
                'emergency_contact' => $this->ticket->emergency_contact,
                'paid_leave' => $this->ticket->paid_leave,
                'reason_company_pay'=> $this->ticket->reason_company_pay,
                'child_under_12'=> $this->ticket->child_under_12,
                'self_marriage'=> $this->ticket->self_marriage,
                'child_marriage'=> $this->ticket->child_marriage,
                'grand_funeral'=> $this->ticket->grand_funeral,
                'parent_funeral'=> $this->ticket->parent_funeral,
                'pregnancy_check'=> $this->ticket->pregnancy_check,
                'maternity_leave'=> $this->ticket->maternity_leave,
                'paternity_leave'=> $this->ticket->paternity_leave,
                'other_insurance_leave'=> $this->ticket->other_insurance_leave,
                'reason_insurance'=> $this->ticket->reason_insurance,
                'sick_leave'=> $this->ticket->sick_leave,
                'child_sick_leave'=> $this->ticket->child_sick_leave,
                'unpaid_reason'=> $this->ticket->unpaid_reason,
                'file_name' => $this->ticket->file_name
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
