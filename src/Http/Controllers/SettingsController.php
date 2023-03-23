<?php

namespace News\Http\Controllers;


use Illuminate\Http\Request;
use News\Enums\NewsEnums;
use News\Models\Settings;
use News\QueryBuilder\NewsBuilder;
use News\Requests\UpdateSettingsRequest;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(NewsBuilder $newsBuilder)
    {
        return view('news::news.settings',[
            'links' => $newsBuilder->getLinks(NewsEnums::SETTINGS->value)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingsRequest $request, Settings $settings)
    {
        $updated = Settings::query()->find($request->validated('id'));
        $updated = $updated->fill($request->validated());
        if ($updated->save()) {
            return \redirect()->route('admin.news.settings.create')->with('success', __('messages.admin.news.settings.success'));
        }

        return \back()->with('error', __('messages.admin.news.settings.fail'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
