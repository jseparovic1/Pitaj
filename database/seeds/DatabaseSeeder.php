<?php

use Illuminate\Database\Seeder;
use Pitaj\Models\Answer;
use Pitaj\Models\Question;
use Pitaj\Models\Tag;
use Pitaj\Models\User;
use Pitaj\Models\Vote;

class DatabaseSeeder extends Seeder
{
    protected $tables = [
        "users",
        "questions",
        "answers",
        "tags",
        "votes",
        "question_tag"
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->clearDatabase();

        $users = factory(User::class, 15)->create();
        $tags = factory(Tag::class, 30)->create();

        $users->each(function ($u) {
            factory(Question::class, 10)->create([
                'author_id' => $u->id
            ]);
        });
        $this->command->info('Made users and questions!');

        $questions =  Question::all();
        $users->each(function ($u) use ($questions) {
            $questions->each(function($q) use ($u) {
                factory(Answer::class)->create([
                    'question_id' => $q->id,
                    'author_id' => $u->id
                ]);
            });
        });
        $this->command->info('Made answers');

        $questions->each(function($q) use ($tags) {
            foreach (range(1,5) as $range) {
                $q->tags()->sync(array_rand($tags->toArray()));
            }
        });
        $this->command->info('Associated tags');

        $answers = Answer::all();
        $answers->each(function ($a) {
            factory(Vote::class, 10)->create([
                'answer_id' => $a->id,
                'voter_id' => User::inRandomOrder()->pluck('id')->first()
            ]);
        });
        $this->command->info('Associated votes');
    }

    /**
     * Prepare db for seeding
     */
    private function clearDatabase()
    {
        $this->command->info('Truncating tables');
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Eloquent::reguard();
        $this->command->info('Finished truncating!');
    }
}
