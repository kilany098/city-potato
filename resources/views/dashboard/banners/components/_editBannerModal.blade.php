<div class="modal fade"
    id="editBannerModal"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="editBannerModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header {{ app()->getLocale() == 'ar' ? 'flex-row-reverse' : '' }}">
                <h5 class="modal-title" id="editBannerModalLabel">
                    {{ __('messages.Update Banner') }}
                </h5>

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>

            <div class="modal-body">

                <form id="editBannerForm"
                    class="row"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <input type="hidden"
                        id="editBannerId"
                        name="id">

                    <div class="mb-3 col-md-12">
                        <label for="edit_title" class="form-label">
                            {{ __('messages.Title') }}
                        </label>

                        <input type="text"
                            class="form-control"
                            id="edit_title"
                            name="title"
                            placeholder="{{ __('messages.title_placeholder') }}">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="edit_subtitle" class="form-label">
                            {{ __('messages.Subtitle') }}
                        </label>

                        <textarea class="form-control"
                            id="edit_subtitle"
                            name="subtitle"
                            rows="4"
                            placeholder="{{ __('messages.subtitle_placeholder') }}"></textarea>
                    </div>

                    <div class="mb-3 col-md-12">

                        <img id="previewBannerImage"
                            src=""
                            width="120"
                            class="mb-2 rounded d-none">

                        <label for="edit_image" class="form-label">
                            {{ __('messages.Image') }}
                        </label>

                        <input type="file"
                            class="form-control"
                            id="edit_image"
                            name="image">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="edit_is_active" class="form-label">
                            {{ __('messages.Status') }}
                        </label>

                        <select class="form-control"
                            id="edit_is_active"
                            name="is_active">

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
                    form="editBannerForm"
                    class="btn btn-primary"
                    id="editBannerButton">

                    {{ __('messages.Update Banner') }}
                </button>

            </div>

        </div>
    </div>
</div>