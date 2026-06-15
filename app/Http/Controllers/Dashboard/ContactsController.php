<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Cache;

class ContactsController extends Controller
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
    public function index()
    {
        $contacts = Contact::whereIn('key', $this->keys)
            ->pluck('value', 'key');

        return view('dashboard.contacts.index', compact('contacts'));
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone'         => ['nullable', 'string', 'max:20'],
            'email'         => ['nullable', 'email', 'max:100'],
            'whatsapp'      => ['nullable', 'string', 'max:20'],
            'facebook_url'  => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'address'       => ['nullable', 'string', 'max:500'],
        ]);

        foreach ($this->keys as $key) {
            Contact::updateOrCreate(
                ['key' => $key],
                ['value' => $validated[$key] ?? null]
            );
        }
        Cache::forget(self::CACHE_KEY);
        $this->getContacts();
        return redirect()
            ->route('contacts.index')
            ->with('success', __('messages.Contact information updated successfully'));
    }
    protected function getContacts()
    {
        return Cache::rememberForever(self::CACHE_KEY, function () {
            return Contact::whereIn('key', $this->keys)
                ->pluck('value', 'key');
        });
    }
}
