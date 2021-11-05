<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarCorreoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject ="Hola";
    public $datos = "datos";

    public $pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos, $pdf)
    {
        $this->datos = $datos; 
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.infocorreo')
        ->attachData($this->pdf,'Historial_Alertas.pdf',['mime'=> 'application/pdf']);
    }
}
