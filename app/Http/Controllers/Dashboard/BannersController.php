<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\BannerDataTable;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BannersController extends Controller
{
    public function index(BannerDataTable $datatable)
    {
        return $datatable->render('dashboard.banners.index');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'required|boolean',
        ]);
        DB::beginTransaction();
        try {
            $banner = Banner::create([
                'title' => $validated['title'] ?? null,
                'subtitle' => $validated['subtitle'] ?? null,
                'is_active' => $validated['is_active'],
            ]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->store('banners', 'public');
                $banner->image()->create([
                    'path' => $path,
                    'title' => $validated['title'] ?? null,
                    'alt' => $validated['title'] ?? null,
                ]);
            }
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => __('messages.banner_created_successfully'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Banner creation failed', [
                'banner_id' => $banner->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'success' => false,
                'message' =>  __('messages.banner_creation_failed'),
            ], 500);
        }
    }
    public function edit(Banner $banner)
    {
        return response()->json([
            'success' => true,
            'banner' => $banner->load('image'),
            'message' => 'recieve the banner data successfully',
        ]);
    }
    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'required|boolean',
        ]);
        DB::beginTransaction();
        try {
            $banner->update([
                'title' => $validated['title'] ?? null,
                'subtitle' => $validated['subtitle'] ?? null,
                'is_active' => $validated['is_active'],
            ]);
            if ($request->hasFile('image')) {
                if ($banner->image && Storage::disk('public')->exists($banner->image->path)) {
                    Storage::disk('public')->delete($banner->image->path);
                }
                $image = $request->file('image');
                $path = $image->store('banners', 'public');
                if ($banner->image) {
                    $banner->image->update([
                        'path' => $path,
                        'title' => $validated['title'] ?? null,
                        'alt' => $validated['title'] ?? null,
                    ]);
                } else {
                    $banner->image()->create([
                        'path' => $path,
                        'title' => $validated['title'] ?? null,
                        'alt' => $validated['title'] ?? null,
                    ]);
                }
            }
            DB::commit();
            return response()->json([
                'success' => true,
                'banner' => $banner->load('image'),
                'message' => 'banner updated successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Banner update failed', [
                'banner_id' => $banner->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'success' => false,
                'message' => __('messages.banner_update_failed'),
            ], 500);
        }
    }
    public function destroy(Banner $banner)
    {
        DB::beginTransaction();
        $oldPath = $banner->image?->path;
        try {
            $banner->image()?->delete();
            $banner->delete();
            DB::commit();
            if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
            return response()->json([
                'success' => true,
                'message' => __('messages.banner_deleted_successfully'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Banner deletion failed', [
                'banner_id' => $banner->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'success' => false,
                'message' => __('messages.banner_delete_failed'),
            ], 500);
        }
    }
}
