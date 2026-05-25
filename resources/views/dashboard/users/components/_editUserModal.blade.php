<div class="modal fade" id="editUserModal" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header {{ app()->getLocale() == 'ar' ? 'flex-row-reverse' : '' }}">
                <h5 class="modal-title" id="editUserModalLabel">{{__('messages.Update User')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" class="row" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editUserId" name="id">
                    <div class="mb-3 col-md-12">
                        <label for="name" class="form-label">{{__('messages.name')}}</label>
                        <input type="text" class="form-control" id="edit_name"
                            placeholder="{{ __('messages.name_placeholder') }}" name="name">
                    </div>


                    <div class="mb-3 col-md-12">
                        <label for="email" class="form-label">{{__('messages.Email')}}</label>
                        <input type="email" class="form-control" id="edit_email"
                            placeholder="{{ __('messages.email_placeholder') }}" name="email">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="phone" class="form-label">{{__('messages.phone')}}</label>
                        <input type="tel" class="form-control" id="edit_phone"
                            placeholder="{{ __('messages.phone_placeholder') }}" name="phone">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="userStatus" class="form-label">{{__('messages.Status')}}</label>
                        <select class="form-control" id="edit_userStatus" name="status">
                            <option value="" disabled>{{__('messages.Choose Status')}}</option>
                            <option value=1>{{__('messages.Active')}}</option>
                            <option value=0>{{__('messages.Not active')}}</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="role" class="form-label">{{__('messages.role')}}</label>
                        <select class="form-control" id="edit-role" name="role">
                            <option value="" disabled selected>{{__('messages.Choose Role')}}</option>
                            @foreach ($roles as $role)
                            <option value={{$role->name}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                        <small class="text-warning">{{__('messages.leave it empty to keep current role')}}</small>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="password" class="form-label">{{__('messages.Password')}}</label>
                        <input type="tel" class="form-control mb-1" id="edit_password"
                            placeholder="{{ __('messages.password_placeholder') }}" name="password">
                        <small class="text-warning">{{__('messages.leave it empty to keep current password')}}</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('messages.Cancel')}}</button>
                <button type="submit" form="editUserForm" class="btn btn-primary" id="editUserButton">{{__('messages.Update User')}}</button>
            </div>
        </div>
    </div>
</div>