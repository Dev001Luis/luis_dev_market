@extends('layouts.app')

@section('left_panel')
    <div x-data="{ tab: 'generic' }">
        <h2 class="text-xl font-bold mb-6">Search Panel</h2>

        <div class="flex border-b mb-6">
            <button @click="tab = 'generic'" :class="tab === 'generic' ? 'border-blue-500 text-blue-500' : ''"
                class="flex-1 pb-2 font-semibold">Generic Search</button>
            <button @click="tab = 'unicorn'" :class="tab === 'unicorn' ? 'border-blue-500 text-blue-500' : ''"
                class="flex-1 pb-2 font-semibold">Create Unicorn</button>
        </div>

        <form id="searchForm">
            <div x-show="tab === 'generic'" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium mb-3">What level of developer are you looking for?</label>
                    <div class="flex flex-wrap gap-2">
                        @foreach (['Enthusiast Student', 'Junior', 'Middle', 'Senior'] as $level)
                            <label class="cursor-pointer">
                                <input type="checkbox" class="hidden peer">
                                <span
                                    class="px-3 py-1 border rounded-full peer-checked:bg-blue-600 peer-checked:text-white">
                                    {{ $level }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-3">Specific competences?</label>
                    <div class="flex flex-wrap gap-2 mb-3">
                        <button type="button" class="px-3 py-1 border rounded bg-slate-200">PHP</button>
                        <button type="button"
                            class="px-3 py-1 border rounded bg-slate-200">Laravel</button>
                        <button type="button"
                            class="px-3 py-1 border rounded bg-slate-200">MySQL</button>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-slate-500">or:</span>
                        <input type="text"
                            class="flex-1 bg-white border rounded px-3 py-1"
                            placeholder="Type skill name...">
                    </div>
                </div>
            </div>

            <div x-show="tab === 'unicorn'" class="space-y-4">
                <div class="border rounded p-3">Career Progression ▾</div>
                <div class="border rounded p-3">Front-End ▾</div>
                <div class="border rounded p-3">Back-End ▾</div>
                <div class="border rounded p-3 text-purple-500 font-bold">S.P.E.C.I.A.L ▾</div>
            </div>

            <div class="flex justify-between mt-10">
                <button type="reset" class="px-6 py-2 bg-gray-500 text-white rounded font-bold">RESET</button>
                <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded font-bold">SEARCH</button>
            </div>
        </form>
    </div>
@endsection

@section('right_panel')
    <div class="flex flex-col items-center justify-center h-full text-slate-400">
        <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <p>Results will appear here after search...</p>
    </div>
@endsection
