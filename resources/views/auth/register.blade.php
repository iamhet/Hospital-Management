<x-guest-layout>
    <x-slot name="logo">
        <x-jet-authentication-card-logo />
    </x-slot>

    <x-jet-validation-errors class="mb-4" />



    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <label class="card-title text-left mb-3">REGISTER</label>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <x-jet-label for="name" value="{{ __('Name') }}"
                                        style="color: rgb(153, 148, 148);" />
                                    <x-jet-input id="name" class="form-control p_input" type="text" name="name"
                                        style="color: black;" :value="old('name')" required autofocus
                                        autocomplete="name" />
                                </div>
                                <div class="form-group">
                                    <x-jet-label for="phone" value="{{ __('Phone') }}"
                                        style="color: rgb(153, 148, 148);" />
                                    <x-jet-input id="phone" class="form-control p_input" type="text" name="phone"
                                        style="color: black;" :value="old('phone')" required autofocus
                                        autocomplete="phone" />
                                </div>
                                <div class="form-group">
                                    <x-jet-label for="address" value="{{ __('Address') }}"
                                        style="color: rgb(153, 148, 148);" />
                                    <x-jet-input id="address" class="form-control p_input" type="text" name="address"
                                        style="color: black;" :value="old('address')" required autofocus
                                        autocomplete="address" />
                                </div>
                                <div class="form-group">
                                    <x-jet-label for="email" value="{{ __('Email') }}"
                                        style="color: rgb(153, 148, 148);" />
                                    <x-jet-input id="email" class="form-control p_input" type="email" name="email"
                                        style="color: black;" :value="old('email')" required />
                                </div>
                                <div class="form-group">
                                    <x-jet-label for="password" value="{{ __('Password') }}"
                                        style="color: rgb(153, 148, 148);" />
                                    <x-jet-input id="password" class="form-control p_input" type="password"
                                        name="password" style="color: black;" required autofocus
                                        autocomplete="password" />
                                </div>
                                <div class="form-group">
                                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"
                                        style="color: rgb(153, 148, 148);" />
                                    <x-jet-input id="password_confirmation" class="form-control p_input" type="password"
                                        name="password_confirmation" style="color: black;" required
                                        autocomplete="new-password" />
                                </div>

                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mt-4">
                                        <x-jet-label for="terms">
                                            <div class="flex items-center">
                                                <x-jet-checkbox name="terms" id="terms" />

                                                <div class="ml-2">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
]) !!}
                                                </div>
                                            </div>
                                        </x-jet-label>
                                    </div>
                                @endif

                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <a class="underline text-sm text-gray-600 hover:text-white"
                                        href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                </div>
                                <div class="text-center">
                                    <x-jet-button class="btn btn-primary btn-block enter-btn">
                                        {{ __('Register') }}
                                    </x-jet-button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-facebook col me-2">
                                        <i class="mdi mdi-facebook"></i> Facebook </button>
                                    <button class="btn btn-google col">
                                        <i class="mdi mdi-google-plus"></i> Google plus </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
