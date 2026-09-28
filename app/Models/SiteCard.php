<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteCard extends Model
{
    protected $fillable = [
        'section',
        'label',
        'title',
        'description',
        'pic_name',
        'action_label',
        'action_url',
        'sort_order',
    ];
}
