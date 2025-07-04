<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecretInfo extends Model
{
    protected $fillable = [
        'user_id',
        'username',
        'password',
        'use_AI',
        'ai_provider',
        'deepseek_api_url',
        'deepseek_api_key',
        'deepseek_model',
        'llm_api_url',
        'llm_api_key',
        'llm_model',
        'llm_spec',
        'stream_output',
    ];

    protected $casts = [
        'use_AI' => 'boolean',
        'stream_output' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}