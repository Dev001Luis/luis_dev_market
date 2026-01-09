@extends('layouts.app')

@section('left_panel')
    <div class="space-y-6">
        <h2 class="text-xl font-bold mb-4">Profile Recap</h2>
        <div class="space-y-4">
            <div>
                <label class="text-xs uppercase font-bold text-slate-500">Nickname</label>
                <input type="text" value="CleanCoder99"
                    class="w-full bg-transparent border-b focus:border-blue-500 outline-none py-1">
            </div>
            <div>
                <label class="text-xs uppercase font-bold text-slate-500">Years of Expertise</label>
                <input type="number" value="4"
                    class="w-full bg-transparent border-b focus:border-blue-500 outline-none py-1">
            </div>
            <div>
                <label class="text-xs uppercase font-bold text-slate-500">Description</label>
                <textarea class="w-full bg-transparent border rounded p-2 text-sm h-32">Passionate about clean architecture and SOLID principles.</textarea>
            </div>
            <p class="text-xs italic text-slate-400">Changes are saved automatically.</p>
        </div>
    </div>
@endsection

@section('right_panel')
    <div x-data="{ tab: 'skills' }">
        <div class="flex gap-8 border-b mb-8">
            <button @click="tab = 'skills'" :class="tab === 'skills' ? 'border-b-2 border-blue-500 text-blue-500' : ''"
                class="pb-2 font-bold">Personal Skills</button>
            <button @click="tab = 'tree'" :class="tab === 'tree' ? 'border-b-2 border-blue-500 text-blue-500' : ''"
                class="pb-2 font-bold">Skill Tree</button>
        </div>

        <div x-show="tab === 'skills'">
            <div class="grid grid-cols-2 gap-6">
                <div class="p-4 border rounded-xl">
                    <h3 class="font-bold mb-4 border-b pb-2">Back-End</h3>
                    <div class="flex flex-wrap gap-2">
                        <span
                            class="bg-blue-100 text-blue-800 px-3 py-1 rounded text-sm">PHP</span>
                        <button
                            class="p-1 border-2 border-dashed rounded border-slate-300 text-slate-400">+</button>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="tab === 'tree'"
            class="flex items-center justify-center h-64 bg-slate-50 rounded-3xl border-2 border-dashed">
            <p class="text-slate-500 italic">Visual Skill Tree implementation coming soon...</p>
        </div>
    </div>
@endsection
