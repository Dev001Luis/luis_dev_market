<?php

namespace App\Enums;

/**
 * Enum Skill levels
 * Defines the level of knowledge of a skill based on star rating.
 */
enum SkillLevel: int
{
    case NOVICE = 0;
    case LEARNER = 1;
    case COMPETENT = 2;
    case JUNIOR = 3;
    case MIDDLE = 4;
    case SENIOR = 5;
    case LEGENDARY = 6;

    /**
     * Get the label from the expertise level.
     **  @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::NOVICE => "Never heard of it",
            self::LEARNER => "Studied & used in small projects",
            self::COMPETENT => "Confident in multiple projects",
            self::JUNIOR => "Daily use, solves real-world tasks",
            self::MIDDLE => "3+ years in the game",
            self::SENIOR => "Pro level / Tony Stark with Jarvis",
            self::LEGENDARY => "Future Skill / Invented",
        };
    }
}
