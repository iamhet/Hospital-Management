<?php

namespace App\Console\Commands;

use App\Mail\ReminderEmailDigest;
use App\Models\approve_appointment;
use App\Models\User;
use App\Providers\AppServiceProvider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to user about reminder';

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
     * @return int
     */
    public function handle()
    {
        $reminders= approve_appointment::where('date',now()->addDays(1)->format('Y-m-d'))->where('status','approved')->orderBy('id')->get();
        $data = [];
        foreach($reminders as $reminder)
        {
            $data[$reminder->id][]=$reminder->toArray();
        }
        foreach($data as $id =>$reminders)
        {
            $this->sendEmailToUser($id,$reminders);
        }
        
    }
    
    private function sendEmailToUser($id,$reminders)
    {
        $user = approve_appointment::where('id',$id)->get();
        Mail::to($user)->send(new ReminderEmailDigest($reminders));
    }
}
