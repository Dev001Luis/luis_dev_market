# IT-Skill Marketplace (Hire your custom Developer)

## Stack

-   **Backend:** PHP 8.3 / Laravel 11 (Service Layer Pattern)
-   **Frontend:** Blade, Tailwind CSS, JavaScript (Async Axios)
-   **Database:** MySQL (Relational)

## Implementation Details

1. **Enums:** Used for Skill Levels to ensure type safety.
2. **Service Pattern:** Decouples the database from the controller.
3. **Async API:** The frontend communicates with `/api/skills` for a seamless experience.

## DB Schema

-   `skills`: id, name, slug, description, stars (0-6), price, category.
