<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run()
    {
        // ---- ROOT CATEGORIES ----
        $categories = [
            ['name' => 'Back-End', 'description' => 'Server-side development', 'category' => 'Back-End'],
            ['name' => 'Front-End', 'description' => 'Client-side development', 'category' => 'Front-End'],
            ['name' => 'Specials', 'description' => 'Other special skills', 'category' => 'Specials'],
        ];

        $categoryIds = [];
        $categorySlugs = [];

        foreach ($categories as $cat) {
            $skill = Skill::create([
                'name' => $cat['name'],
                'slug' => $this->makeUniqueSlug($cat['name']),
                'description' => $cat['description'],
                'stars' => 0,
                'price' => 0,
                'category' => $cat['category'],
                'parent_id' => null
            ]);

            $categoryIds[$cat['name']] = $skill->id;
            $categorySlugs[$cat['name']] = $skill->slug;
        }

        // ---- BACK-END LANGUAGES AND FRAMEWORKS ----
        $backEnd = [
            'PHP' => ['Laravel', 'Symfony', 'CodeIgniter', 'CakePHP', 'Yii2'],
            'Python' => ['Django', 'Flask', 'FastAPI', 'Pyramid'],
            'JavaScript' => ['Node.js', 'Express', 'NestJS'],
            'C#' => ['.NET Core', 'ASP.NET MVC', 'Blazor'],
            'Java' => ['Spring', 'Hibernate'],
        ];

        foreach ($backEnd as $lang => $frameworks) {
            $langSkill = Skill::create([
                'name' => $lang,
                'slug' => $this->makeUniqueSlug($lang, $categorySlugs['Back-End']),
                'description' => "$lang language",
                'stars' => 0,
                'price' => 0,
                'category' => 'Back-End',
                'parent_id' => $categoryIds['Back-End']
            ]);

            foreach ($frameworks as $fw) {
                Skill::create([
                    'name' => $fw,
                    'slug' => $this->makeUniqueSlug($fw, $langSkill->slug),
                    'description' => "$fw framework for $lang",
                    'stars' => 0,
                    'price' => 0,
                    'category' => 'Back-End',
                    'parent_id' => $langSkill->id
                ]);
            }
        }

        // ---- FRONT-END LANGUAGES AND LIBRARIES ----
        $frontEnd = [
            'JavaScript' => ['React', 'Vue.js', 'Angular', 'Svelte', 'TypeScript', 'Alpine.js'],
            'HTML' => ['HTML5', 'Pug'],
            'CSS' => ['TailwindCSS', 'Bootstrap', 'Sass', 'LESS'],
        ];

        foreach ($frontEnd as $lang => $libs) {
            $langSkill = Skill::create([
                'name' => $lang,
                'slug' => $this->makeUniqueSlug($lang, $categorySlugs['Front-End']),
                'description' => "$lang for Front-End",
                'stars' => 0,
                'price' => 0,
                'category' => 'Front-End',
                'parent_id' => $categoryIds['Front-End']
            ]);

            foreach ($libs as $lib) {
                Skill::create([
                    'name' => $lib,
                    'slug' => $this->makeUniqueSlug($lib, $langSkill->slug),
                    'description' => "$lib library or framework",
                    'stars' => 0,
                    'price' => 0,
                    'category' => 'Front-End',
                    'parent_id' => $langSkill->id
                ]);
            }
        }

        // ---- SPECIALS ----
        $specials = [
            'DevOps' => ['Docker', 'Kubernetes', 'CI/CD', 'Terraform', 'Ansible'],
            'SEO' => ['On-page SEO', 'Technical SEO', 'Link Building'],
            'UI/UX' => ['Figma', 'Adobe XD', 'Prototyping', 'Wireframing'],
            'CyberSecurity' => ['Ethical Hacking', 'Penetration Testing', 'Network Security'],
            'Databases' => ['MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'SQLite', 'MariaDB']
        ];

        foreach ($specials as $area => $subs) {
            $areaSkill = Skill::create([
                'name' => $area,
                'slug' => $this->makeUniqueSlug($area, $categorySlugs['Specials']),
                'description' => "$area specialization",
                'stars' => 0,
                'price' => 0,
                'category' => 'Specials',
                'parent_id' => $categoryIds['Specials']
            ]);

            foreach ($subs as $sub) {
                Skill::create([
                    'name' => $sub,
                    'slug' => $this->makeUniqueSlug($sub, $areaSkill->slug),
                    'description' => "$sub skill",
                    'stars' => 0,
                    'price' => 0,
                    'category' => 'Specials',
                    'parent_id' => $areaSkill->id
                ]);
            }
        }

        // ---- EXTRA SKILLS ----
        $extraSkills = [
            ['name' => 'GraphQL', 'description' => 'API query language', 'category' => 'Back-End', 'parent' => 'Back-End'],
            ['name' => 'REST APIs', 'description' => 'API development', 'category' => 'Back-End', 'parent' => 'Back-End'],
            ['name' => 'WordPress', 'description' => 'CMS platform', 'category' => 'Specials', 'parent' => 'Specials'],
            ['name' => 'Laravel Livewire', 'description' => 'Dynamic front-end for Laravel', 'category' => 'Front-End', 'parent' => 'PHP'],
            ['name' => 'Next.js', 'description' => 'React framework', 'category' => 'Front-End', 'parent' => 'JavaScript'],
        ];

        foreach ($extraSkills as $s) {
            $parent = Skill::where('name', $s['parent'])->first();
            Skill::create([
                'name' => $s['name'],
                'slug' => $this->makeUniqueSlug($s['name'], $parent?->slug),
                'description' => $s['description'],
                'stars' => 0,
                'price' => 0,
                'category' => $s['category'],
                'parent_id' => $parent ? $parent->id : null,
            ]);
        }
    }

    // ----------------- HELPER -----------------
    private function makeUniqueSlug($name, $parentSlug = null)
    {
        $base = $parentSlug ? $parentSlug . '-' . $name : $name;
        $slug = Str::slug($base);
        $originalSlug = $slug;
        $counter = 1;

        while (Skill::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
