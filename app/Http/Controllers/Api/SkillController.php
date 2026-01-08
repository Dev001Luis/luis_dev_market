<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Services\SkillService;

class SkillController extends Controller
{
    /**
     * Display a listing of skills JSON format.
     * * @return \Illuminate\Http\JsonResponse
     */
    public function index(SkillService $service)
    {
        $skills = $service->getVisibleSkills();
        return response()->json($skills);
    }
}
