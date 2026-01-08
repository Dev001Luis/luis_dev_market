<?php

namespace App\Models;

use App\Enums\SkillLevel;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'stars', 'price', 'category'];

    /**
     * Cast the stars attrubute to our Enum automatically.
     * * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'stars' => SkillLevel::class,
        ];
    }
}
