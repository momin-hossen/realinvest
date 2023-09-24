<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Helpers\HasUploader;
use App\Models\ProjectsPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectsPlanController extends Controller
{
    use HasUploader;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects_plans = ProjectsPlan::when(request('search'), function($q) {
            $q->where('title', 'like', '%'.request('search').'%');
        })
        ->latest()
        ->paginate(2);

        return view('admin.projects_plans.index', compact('projects_plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects_plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'unique',
            'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'preview_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'invest_type' => 'required',
            'capital_back' => 'required',
            'min_invest' => 'required|numeric|min:0',
            'max_invest' => 'required|numeric|min:0',
            'max_invest_amount' => 'required|numeric|min:0',
            'is_period' => 'required',
            'profit_range' => 'required',
            'loss_range' => 'required',
            'location' => 'required',
            'address' => 'required',
            'description' => 'required',
        ]);

        ProjectsPlan::create($request->except('image') + [
            'slug' => Str::slug($request->title),
            'gallery_image' => $this->upload($request, 'gallery_image'),
            'thumbnail_image' => $this->upload($request, 'thumbnail_image'),
            'preview_image' => $this->upload($request, 'preview_image'),
        ]);

        return response()->json([
            'message' => 'Projects Plan created successfully.',
            'redirect' => route('admin.projects_plans.index')
        ]);
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
    public function edit(ProjectsPlan $projectsPlan)
    {
        return view('admin.projects_plans.edit', compact('projectsPlan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

        ]);

        $projects_plans = ProjectsPlan::findOrFail($id);

        $projects_plans->update($request->except('image') + [
            'gallery_image' => $request->hasFile('gallery_image') ? $this->upload($request, 'image', $projects_plans->gallery_image) : $projects_plans->gallery_image,
            'thumbnail_image' => $request->hasFile('thumbnail_image') ? $this->upload($request, 'image', $projects_plans->thumbnail_image) : $projects_plans->thumbnail_image,
            'preview_image' => $request->hasFile('preview_image') ? $this->upload($request, 'image', $projects_plans->preview_image) : $projects_plans->preview_image,

            'slug' => Str::slug($request->title),
        ]);

        return response()->json([
            'message' => 'Projects Plan updated successfully.',
            'redirect' => route('admin.projects_plans.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projects_plans = ProjectsPlan::findOrFail($id);
        if (file_exists($projects_plans->gallery_image ?? false)) {
            Storage::delete($projects_plans->gallery_image);
        }
        if (file_exists($projects_plans->thumbnail_image ?? false)) {
            Storage::delete($projects_plans->thumbnail_image);
        }
        if (file_exists($projects_plans->preview_image ?? false)) {
            Storage::delete($projects_plans->preview_image);
        }
        $projects_plans->delete();
        return response()->json([
            'message' => __("Projects Plans deleted successfully"),
            'redirect' => route('admin.projects_plans.index')
        ]);
    }
}
