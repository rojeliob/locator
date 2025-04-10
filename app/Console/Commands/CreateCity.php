<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\City;
use App\Models\Province;

class CreateCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-city {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new city';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $name = $this->argument('name'); 
        $data = explode(", ", $name);
        $province = Province::where('name', $data[1])->first();
        
        $city = new City();
        $city->name = $data[0];
        $city->province_id= $province->id;
        $city->save();

        $this->info("City '{$name}' created successfully!");

    }
}
