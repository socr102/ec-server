<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    public static $categories = [
        'app_issues' => 'App Issues',
        'app_usage_help' => 'App Usage Help',
        'authentication' => 'Authentication',
        'bugs' => 'Bugs',
        'inefficient_process_flow' => 'Inefficient Process Flow',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
