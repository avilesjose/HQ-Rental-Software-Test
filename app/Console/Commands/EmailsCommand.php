<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Notification;
use App\Notifications\NewMessage;

class EmailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send_emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $notifications=Notification::all();

        foreach($notifications as $notification) {
            $notification->notify(new NewMessage($notification));
        }
    }
}
