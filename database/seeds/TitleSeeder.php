<?php

use App\Title;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [
            [
                'name' => 'Newbie Chef',
                'decsription' => 'first join member',
                'priority' => 1
            ],
            [
                'name' => 'Basic Chef',
                'decsription' => 'first title of chef',
                'priority' => 2
            ],
            [
                'name' => 'Rare Chef',
                'decsription' => 'second title of chef',
                'priority' => 3
            ],
            [
                'name' => 'Immortal Chef',
                'decsription' => 'second title of chef',
                'priority' => 4
            ],
        ];
        Title::insert($titles);
    }
}
