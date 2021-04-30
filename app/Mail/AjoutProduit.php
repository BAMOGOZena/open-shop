<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AjoutProduit extends Mailable
{
    use Queueable, SerializesModels;
    public $produit;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($produit)
    {
        $this->produit = $produit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('emails.produits.ajout-produit');
        return $this->subject('Un nouveau produit sur OpenShop')->from('marketing@open-shop.com', 'Service Marking de OpenShop')->markdown('emails.produits.ajout-produit');
    }
}
