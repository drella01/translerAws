<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Vehicle;

class RentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $days;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$days)
    {
        $this->data = $data;
        $this->days = $days;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirmation')
                    ->subject('Reserva confirmada del vehículo '.Vehicle::find($this->data->vehicle_id)->registration);
    }
}
