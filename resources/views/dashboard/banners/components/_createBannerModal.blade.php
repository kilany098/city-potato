<div class="modal fade"
    id="createBannerModal"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="createBannerModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header {{ app()->getLocale() == 'ar' ? 'flex-row-reverse' : '' }}">
                <h5 class="modal-title" id="createBannerModalLabel">
                    {{ __('messages.Create Banner') }}
                </h5>

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>

            <div class="modal-body">

                <form id="createBannerForm"
                    action="{{ route('banners.store') }}"
                    class="row"
                    method="POST"
                    enctype="multipart/form-data"
                    autocomplete="off">

                    @csrf

                    <div class="mb-3 col-md-12">
                        <label for="title" class="form-label">
                            {{ __('messages.Title') }}
                        </label>

                        <input type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            placeholder="{{ __('messages.title_placeholder') }}"
                            required>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="subtitle" class="form-label">
                            {{ __('messages.Subtitle') }}
                        </label>

                        <textarea class="form-control"
                            id="subtitle"
                            name="subtitle"
                            rows="4"
                            placeholder="{{ __('messages.subtitle_placeholder') }}"></textarea>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="image" class="form-label">
                            {{ __('messages.Image') }}
                        </label>

                        <input type="file"
                            class="form-control"
                            id="image"
                            name="image"
                            required>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="is_active" class="form-label">
                            {{ __('messages.Status') }}
                        </label>

                        <select class="form-control"
                            id="is_active"
                            name="is_active"
                            required>

                            <option value="1">
                                {{ __('messages.Active') }}
                            </option>

                            <option value="0">
                                {{ __('messages.Not active') }}
                            </option>

                        </select>
                    </div>

                </form>

            </div>

            <div class="modal-footer">

                <button type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    {{ __('messages.Cancel') }}
                </button>

                <button type="submit"
                    form="createBannerForm"
                    class="btn btn-primary"
                    id="createBannerButton">

                    {{ __('messages.Create Banner') }}
                </button>

            </div>

        </div>
    </div>
</div>