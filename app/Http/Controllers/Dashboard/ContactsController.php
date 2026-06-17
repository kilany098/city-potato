<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\UpdateContactRequest;
use App\Services\ContactService;

class ContactsController extends Controller
{

    public function __construct(protected ContactService $contactService) {}

    public function index()
    {
        $contacts = $this->contactService->getContacts();

        return view(
            'dashboard.contacts.index',
            compact('contacts')
        );
    }
    public function update(UpdateContactRequest $request)
    {
        $this->contactService->update(
            $request->validated()
        );

        return redirect()
            ->route('contacts.index')
            ->with(
                'success',
                __('messages.Contact information updated successfully')
            );
    }
}
