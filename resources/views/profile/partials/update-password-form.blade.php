<section>
    <header>
        <h2 class="text-lg font-medium text-gray-100 dark:text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-group">
    <label for="update_password_current_password">{{ __('Current Password') }}</label>
    <input type="password" class="form-control" id="update_password_current_password" name="current_password" autocomplete="current-password">
    
    @if($errors->updatePassword->has('current_password'))
        <div class="mt-2 text-danger">
            @foreach($errors->updatePassword->get('current_password') as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
</div>

<div class="form-group">
    <label for="update_password_password">{{ __('New Password') }}</label>
    <input type="password" class="form-control" id="update_password_password" name="password" autocomplete="new-password">
    
    @if($errors->updatePassword->has('password'))
        <div class="mt-2 text-danger">
            @foreach($errors->updatePassword->get('password') as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
</div>

<div class="form-group">
    <label for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
    <input type="password" class="form-control" id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password">
    
    @if($errors->updatePassword->has('password_confirmation'))
        <div class="mt-2 text-danger">
            @foreach($errors->updatePassword->get('password_confirmation') as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
</div>


        <div class="flex items-center gap-4">
        <button type="submit" class="btn btn-block btn-primary">{{ __('Save') }}</button>
        @if (session('status') === 'password-updated')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400"
        >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
