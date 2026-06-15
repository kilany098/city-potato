<div class="row">

    {{-- LEFT: Display Card --}}
    <div class="col-lg-5 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="ri-contacts-book-line me-2"></i>
                    {{ __('messages.Current Contact Info') }}
                </h5>
            </div>
            <div class="card-body">

                <ul class="list-unstyled mb-0">

                    <li class="d-flex align-items-start gap-3 py-3 border-bottom">
                        <span class="avatar-sm bg-primary-subtle text-primary rounded d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="ri-phone-line fs-18"></i>
                        </span>
                        <div>
                            <p class="text-muted mb-1 fs-13">{{ __('messages.Phone') }}</p>
                            @if($contacts->get('phone'))
                            <p class="mb-0 fw-semibold">{{ $contacts->get('phone') }}</p>
                            @else
                            <p class="mb-0 text-muted fst-italic">{{ __('messages.Not provided yet') }}</p>
                            @endif
                        </div>
                    </li>

                    <li class="d-flex align-items-start gap-3 py-3 border-bottom">
                        <span class="avatar-sm bg-success-subtle text-success rounded d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="ri-mail-line fs-18"></i>
                        </span>
                        <div>
                            <p class="text-muted mb-1 fs-13">{{ __('messages.Email') }}</p>
                            @if($contacts->get('email'))
                            <p class="mb-0 fw-semibold">{{ $contacts->get('email') }}</p>
                            @else
                            <p class="mb-0 text-muted fst-italic">{{ __('messages.Not provided yet') }}</p>
                            @endif
                        </div>
                    </li>

                    <li class="d-flex align-items-start gap-3 py-3 border-bottom">
                        <span class="avatar-sm bg-info-subtle text-info rounded d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="ri-whatsapp-line fs-18"></i>
                        </span>
                        <div>
                            <p class="text-muted mb-1 fs-13">{{ __('messages.WhatsApp') }}</p>
                            @if($contacts->get('whatsapp'))
                            <p class="mb-0 fw-semibold">{{ $contacts->get('whatsapp') }}</p>
                            @else
                            <p class="mb-0 text-muted fst-italic">{{ __('messages.Not provided yet') }}</p>
                            @endif
                        </div>
                    </li>

                    <li class="d-flex align-items-start gap-3 py-3 border-bottom">
                        <span class="avatar-sm bg-primary-subtle text-primary rounded d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="ri-facebook-line fs-18"></i>
                        </span>
                        <div>
                            <p class="text-muted mb-1 fs-13">{{ __('messages.Facebook') }}</p>
                            @if($contacts->get('facebook_url'))
                            <a href="{{ $contacts->get('facebook_url') }}" target="_blank" class="mb-0 fw-semibold text-truncate d-block" style="max-width:220px;">
                                {{ $contacts->get('facebook_url') }}
                            </a>
                            @else
                            <p class="mb-0 text-muted fst-italic">{{ __('messages.Not provided yet') }}</p>
                            @endif
                        </div>
                    </li>

                    <li class="d-flex align-items-start gap-3 py-3 border-bottom">
                        <span class="avatar-sm bg-danger-subtle text-danger rounded d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="ri-instagram-line fs-18"></i>
                        </span>
                        <div>
                            <p class="text-muted mb-1 fs-13">{{ __('messages.Instagram') }}</p>
                            @if($contacts->get('instagram_url'))
                            <a href="{{ $contacts->get('instagram_url') }}" target="_blank" class="mb-0 fw-semibold text-truncate d-block" style="max-width:220px;">
                                {{ $contacts->get('instagram_url') }}
                            </a>
                            @else
                            <p class="mb-0 text-muted fst-italic">{{ __('messages.Not provided yet') }}</p>
                            @endif
                        </div>
                    </li>

                    <li class="d-flex align-items-start gap-3 py-3">
                        <span class="avatar-sm bg-warning-subtle text-warning rounded d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="ri-map-pin-2-line fs-18"></i>
                        </span>
                        <div>
                            <p class="text-muted mb-1 fs-13">{{ __('messages.Address') }}</p>
                            @if($contacts->get('address'))
                            <p class="mb-0 fw-semibold">{{ $contacts->get('address') }}</p>
                            @else
                            <p class="mb-0 text-muted fst-italic">{{ __('messages.Not provided yet') }}</p>
                            @endif
                        </div>
                    </li>

                </ul>

            </div>
        </div>
    </div>

    {{-- RIGHT: Form --}}
    <div class="col-lg-7 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="ri-edit-line me-2"></i>
                    {{ __('messages.Update Contact Info') }}
                </h5>
            </div>
            <div class="card-body">

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="ri-checkbox-circle-line me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="ri-error-warning-line me-2"></i>
                    {{ __('messages.Please fix the errors below') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <form action="{{ route('contacts.update') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="phone">
                            <i class="ri-phone-line me-1 text-primary"></i>
                            {{ __('messages.Phone') }}
                        </label>
                        <input type="text"
                            class="form-control @error('phone') is-invalid @enderror"
                            id="phone"
                            name="phone"
                            value="{{ old('phone', $contacts->get('phone')) }}"
                            placeholder="+962 7x xxx xxxx">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="email">
                            <i class="ri-mail-line me-1 text-success"></i>
                            {{ __('messages.Email') }}
                        </label>
                        <input type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            value="{{ old('email', $contacts->get('email')) }}"
                            placeholder="info@example.com">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="whatsapp">
                            <i class="ri-whatsapp-line me-1 text-info"></i>
                            {{ __('messages.WhatsApp') }}
                        </label>
                        <input type="text"
                            class="form-control @error('whatsapp') is-invalid @enderror"
                            id="whatsapp"
                            name="whatsapp"
                            value="{{ old('whatsapp', $contacts->get('whatsapp')) }}"
                            placeholder="+962 7x xxx xxxx">
                        @error('whatsapp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="facebook_url">
                            <i class="ri-facebook-line me-1 text-primary"></i>
                            {{ __('messages.Facebook URL') }}
                        </label>
                        <input type="url"
                            class="form-control @error('facebook_url') is-invalid @enderror"
                            id="facebook_url"
                            name="facebook_url"
                            value="{{ old('facebook_url', $contacts->get('facebook_url')) }}"
                            placeholder="https://facebook.com/yourpage">
                        @error('facebook_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="instagram_url">
                            <i class="ri-instagram-line me-1 text-danger"></i>
                            {{ __('messages.Instagram URL') }}
                        </label>
                        <input type="url"
                            class="form-control @error('instagram_url') is-invalid @enderror"
                            id="instagram_url"
                            name="instagram_url"
                            value="{{ old('instagram_url', $contacts->get('instagram_url')) }}"
                            placeholder="https://instagram.com/yourpage">
                        @error('instagram_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="address">
                            <i class="ri-map-pin-2-line me-1 text-warning"></i>
                            {{ __('messages.Address') }}
                        </label>
                        <textarea class="form-control @error('address') is-invalid @enderror"
                            id="address"
                            name="address"
                            rows="3"
                            placeholder="{{ __('messages.Enter full address') }}">{{ old('address', $contacts->get('address')) }}</textarea>
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="ri-save-line me-1"></i>
                            {{ __('messages.Save Changes') }}
                        </button>
                        <a href="{{ route('contacts.index') }}" class="btn btn-light px-4">
                            {{ __('messages.Reset') }}
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>