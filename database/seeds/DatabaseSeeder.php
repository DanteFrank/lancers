<?php

use App\Subscription;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(DocumentsTableSeeder::class);

        factory(App\User::class, 50)->create()->each(function ($user){
            $subscriber = new Subscription;
            $subscriber->subscribeToPlan(1 , $user->id, 12);
        });

        factory(App\Project::class, 50)->create()->each(function ($project) {
            $estimate = $project->estimate()->save(factory(App\Estimate::class)->make());
            $client = factory(App\Client::class, 1)->create(['user_id' => $project->user_id]);
            $project->update(['estimate_id' =>$estimate->id, 'client_id' => $project->id]);
        });

        factory(App\Task::class, 100)->create();
    }
}
