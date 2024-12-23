<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_number'];

    protected static function boot()
{
    parent::boot();  // Don't forget to call the parent boot method

    // Assign a ticket number when creating a new ticket
    static::creating(function($ticket){
        // Retrieve the latest ticket by ticket_number or id
        $lastTicket = Support::latest('id')->first();

        // Generate the ticket number by incrementing the last ticket number
        if ($lastTicket) {
            // Extract the numeric part from the ticket_number (e.g., PWT-1)
            $lastNumber = (int) str_replace('PWT-', '', $lastTicket->ticket_number);
            // Increment the number and create the new ticket_number
            $ticket->ticket_number = 'PWT-' . ($lastNumber + 1);
        } else {
            // If there are no tickets yet, start with PWT-1
            $ticket->ticket_number = 'PWT-1';
        }
    });
}

}
