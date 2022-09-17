<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InscripcionTurno extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Confirmación de inscripción de PazMuseu";
    public $data;
    public $turno;
    public $inscripcion;
    public $ruta;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->turno = $data['turno'];
        $this->inscripcion = $data['inscripcion'];
        $this->ruta = $data['ruta'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.confimacion');
    }
}
