<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Facades\Cache;


class ContactService
{
    protected array $keys = [
        'phone',
        'email',
        'whatsapp',
        'facebook_url',
        'instagram_url',
        'address',
    ];
    const CACHE_KEY = 'contacts.all';
    public function update(array $data): void
    {
        foreach ($this->keys as $key) {
            Contact::updateOrCreate(
                ['key' => $key],
                ['value' => $data[$key] ?? null]
            );
        }
        Cache::forget(self::CACHE_KEY);
    }

    public function getContacts()
    {
        return Cache::rememberForever(self::CACHE_KEY, function () {
            return Contact::whereIn('key', $this->keys)
                ->pluck('value', 'key');
        });
    }
}
