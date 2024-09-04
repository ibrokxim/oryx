<?php

namespace App\Services\Admin;

use App\Models\Store;
use App\Models\Category_Store;
use Illuminate\Support\Collection;
use App\Services\ShortcodeService;

class PageService
{
    public function aboutCompany()
    {
        return ShortcodeService::doShortcode('o-kompanii');
    }

    public function getStoreIdsByCategoryId(int $categoryId): array
    {
        $fields = Category_Store::where('category_id', $categoryId)->get();
        return $fields->pluck('store_id')->all();
    }

    public function getActiveStoresByIds(array $storeIds)
    {
        return Store::whereIn('id', $storeIds)->where('status', 'active')->get();
    }

    public function getAllActiveStores()
    {
        return Store::where('status', 'active')->get();
    }

    public function transformStoreImages(Collection $stores)
    {
        return $stores->transform(function ($store) {
            $store->img = url('storage/' . $store->img);
            return $store;
        });
    }
}
