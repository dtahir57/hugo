<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Opportunity;
use Carbon\Carbon;

class InactiveOpportunity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:inactive-opportunity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'In active any oppotunity which is past due, it will  run every day';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $opps = Opportunity::all();
        foreach($opps as $opp) {
            if (Carbon::now() > $opp->closing_date) {
                $opp->status = 'inactive';
                $opp->update();
            }
        }
        $this->info('Opportunities status updated successfully!');
    }
}
