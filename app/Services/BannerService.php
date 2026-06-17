<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerService
{
    public function store(array $data): Banner
    {
        return DB::transaction(function () use ($data) {

            $banner = Banner::create([
                'title' => $data['title'] ?? null,
                'subtitle' => $data['subtitle'] ?? null,
                'is_active' => $data['is_active'],
            ]);

            if (isset($data['image'])) {

                $path = $data['image']->store('banners', 'public');

                $banner->image()->create([
                    'path' => $path,
                    'title' => $data['title'] ?? null,
                    'alt' => $data['title'] ?? null,
                ]);
            }

            return $banner;
        });
    }

    public function update(Banner $banner, array $data): Banner
    {
        return DB::transaction(function () use ($banner, $data) {

            $banner->update([
                'title' => $data['title'] ?? null,
                'subtitle' => $data['subtitle'] ?? null,
                'is_active' => $data['is_active'],
            ]);

            if (isset($data['image'])) {

                if (
                    $banner->image &&
                    Storage::disk('public')->exists($banner->image->path)
                ) {
                    Storage::disk('public')->delete(
                        $banner->image->path
                    );
                }

                $path = $data['image']->store('banners', 'public');

                if ($banner->image) {

                    $banner->image->update([
                        'path' => $path,
                        'title' => $data['title'] ?? null,
                        'alt' => $data['title'] ?? null,
                    ]);
                } else {

                    $banner->image()->create([
                        'path' => $path,
                        'title' => $data['title'] ?? null,
                        'alt' => $data['title'] ?? null,
                    ]);
                }
            }

            return $banner->fresh()->load('image');
        });
    }

    public function delete(Banner $banner): void
    {
        DB::transaction(function () use ($banner) {

            $oldPath = $banner->image?->path;

            $banner->image()?->delete();

            $banner->delete();

            if (
                $oldPath &&
                Storage::disk('public')->exists($oldPath)
            ) {
                Storage::disk('public')->delete($oldPath);
            }
        });
    }
}
