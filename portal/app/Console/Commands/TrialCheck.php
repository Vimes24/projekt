<?php

namespace App\Console\Commands;

use App\Mail\TrialEndNotofication;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TrialCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trial:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to check user trial expiry date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $users = User::whereNotNull('user_trial')->get();
            $today = Carbon::today('Europe/Warsaw');
            foreach ($users as $user) {
                $trialEnd = Carbon::parse($user->user_trial);

                if ($trialEnd->isSameDay($today)) {
                    Mail::to($user->email)->send(new TrialEndNotofication($user->name));
                    $this->info('Przypomnienie o końcu subskrypcji przesłano do: ' . $user->email);
                }
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
