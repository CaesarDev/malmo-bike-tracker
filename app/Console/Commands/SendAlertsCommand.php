<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendAlertsCommand extends Command
{
    protected $signature = 'send:alerts';

    protected $description = 'Send alerts to users when a station is in a bad state';

    public function handle(): void
    {
        // TODO: Either loop through all subscriptions and send alerts or loop through all stations and send alerts
        // How do we prevent sending multiple alerts for the same station?
        // Should we save a log of the last time an alert was sent for a station?
        // Or just keep it as a field in the subscription table?
        // Should we send an alert when the station is in a good state again?
        // And how do we prevent it from ping-ponging between good and bad states?
        // Or maybe just send one alert with in the timeframe of the subscription?

        // For each subscription
        // Get the station
        // Get the status of the station
        // Check if the station is in a bad state
        // If it is, send an alert

        // For each station
        // Get the status of the station
        // Check if the station is in a bad state
        // If it is, send an alert

    }
}
