<div class="modal fade" id="createUserModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header {{ app()->getLocale() == 'ar' ? 'flex-row-reverse' : '' }}">
                <h5 class="modal-title" id="createUserModalLabel">{{__('messages.Create User')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createUserForm" action="{{ route('users.store') }}" class="row" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="mb-3 col-md-12">
                        <label for="name" class="form-label">{{__('messages.name')}}</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="{{ __('messages.name_placeholder') }}" required>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="email" class="form-label">{{__('messages.Email')}}</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                            placeholder="{{ __('messages.email_placeholder') }}" required>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="phone" class="form-label">{{__('messages.phone')}}</label>
                        <input type="tel" class="form-control" id="phone" name="phone"
                            placeholder="{{ __('messages.phone_placeholder') }}" required>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="role" class="form-label">{{__('messages.role')}}</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="" disabled selected>
                                {{__('messages.Choose Role')}}
                            </option>
                            @foreach ($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="password" class="form-label">{{__('messages.Password')}}</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="new-password"
                            placeholder="{{ __('messages.password_placeholder') }}" required>
                        <small class="text-warning">
                            {{__('messages.password_hint')}}
                        </small>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="password_confirmation" class="form-label">
                            {{__('messages.Confirm Password')}}
                        </label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation"
                            placeholder="{{ __('messages.confirm_password_placeholder') }}" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('messages.Cancel')}}</button>
                <button type="submit" form="createUserForm" class="btn btn-primary" id="createUserButton">{{__('messages.Create User')}}</button>
            </div>
        </div>
    </div>
</div>