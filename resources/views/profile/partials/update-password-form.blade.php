<section>
    <header>
        <h2 class="text-lg font-medium text-dark">
            Update Password
        </h2>

        <p class="mt-1 text-sm text-gray-600 ">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>
    <input type="text" value="{{ $user= Auth::user() }}" hidden>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div class="container">


        <div class="mb-5">

            <label for="password" class="form-label">New Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="enter a new password"
                    autofocus
                  />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="mb-5">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Confirm Password"
                    autofocus
                  />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 text-left pl-4">
            <div class="mb-3 centered-div">
                <button class="btn btn-primary " type="submit">Save</button>
              </div>
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


