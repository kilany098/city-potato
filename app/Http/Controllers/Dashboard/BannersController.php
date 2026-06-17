<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\DataTables\BannerDataTable;
use App\Models\Banner;
use App\Http\Requests\{
    StoreBannerRequest,
    UpdateBannerRequest,
};
use App\Services\BannerService;
use Illuminate\Support\Facades\{
    Log
};


class BannersController extends Controller
{
    public function __construct(protected BannerService $bannerService) {}
    public function index(BannerDataTable $datatable)
    {
        return $datatable->render('dashboard.banners.index');
    }

    public function store(StoreBannerRequest $request)
    {
        try {
            $this->bannerService->store(
                $request->validated()
            );
            return response()->json([
                'success' => true,
                'message' => __('messages.banner_created_successfully'),
            ]);
        } catch (\Throwable $e) {
            Log::error('Banner creation failed', [
                'error' => $e->getMessage(),

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
            'message' => 'receive the banner data successfully',
        ]);
    }

    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        try {
            $banner = $this->bannerService->update(
                $banner,
                $request->validated()
            );
            return response()->json([
                'success' => true,
                'banner' => $banner->load('image'),
                'message' => __('messages.banner_updated_successfully'),
            ]);
        } catch (\Throwable $e) {
            Log::error('Banner update failed', [
                'banner_id' => $banner->id,
                'error' => $e->getMessage(),
            ]);
            return response()->json([
                'success' => false,
                'message' => __('messages.banner_update_failed'),
            ], 500);
        }
    }


    public function destroy(Banner $banner)
    {
        try {
            $this->bannerService->delete($banner);
            return response()->json([
                'success' => true,
                'message' => __('messages.banner_deleted_successfully'),
            ]);
        } catch (\Throwable $e) {
            Log::error('Banner deletion failed', [
                'banner_id' => $banner->id,
                'error' => $e->getMessage(),
            ]);
            return response()->json([
                'success' => false,
                'message' => __('messages.banner_delete_failed'),
            ], 500);
        }
    }
}
