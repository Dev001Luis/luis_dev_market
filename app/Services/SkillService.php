<?php

namespace App\Services;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class SkillService
 * Handles business logic for calculating skill value and filtering.
 */
class SkillService
{
    /**
     * Fetch all skills, also filtered by level.
     * * @return int|null $minStars
     * @return Collection
     */
    public function getVisibleSkills(?int $minStars = null): Collection
    {
        $query = Skill::query();

        if ($minStars !== null) {
            $query->where('stars', '>=', $minStars);
        }

        return $query->orderBy('stars', 'desc')->get();
    }
}
