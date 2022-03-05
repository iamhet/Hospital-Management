<x-guest-layout>
       

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="row w-100 m-0">
                    <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                        <div class="card col-lg-4 mx-auto">
                            <div class="card-body px-5 py-5">
                                <label class="card-title text-left mb-3">LOGIN</label>
                                <br><br>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group" >
                                        <x-jet-label for="email" style="color: rgb(153, 148, 148);" value="{{ __('Email') }}" />
                                        <br>
                                        <x-jet-input id="email" class="form-control p_input" type="email" name="email" style="color: black ;"
                                            :value="old('email')" required autofocus />

                                    </div>
                                    <div class="form-group">
                                        <x-jet-label for="password"  style="color: rgb(153, 148, 148);" value="{{ __('Password') }}" />
                                        <br>
                                        <x-jet-input id="password" class="form-control p_input" type="password" style="color: black;"
                                            name="password" required autocomplete="current-password" />
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between">
                                        <div class="form-check">
                                            <label for="form-check-label" class="flex items-center">
                                                <x-jet-checkbox id="remember_me" name="remember" />
                                                <span
                                                    class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a class="forgot-pass" href="{{ route('password.request') }}" style="color: white;">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <x-jet-button class="btn btn-primary btn-block enter-btn">
                                            {{ __('Log in') }}
                                        </x-jet-button>

                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-facebook me-2 col">
                                            <i class="mdi mdi-facebook"></i> Facebook </button>
                                        <button class="btn btn-google col">
                                            <i class="mdi mdi-google-plus"></i> Google plus </button>
                                    </div>
                                    <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                </div>
                <!-- row ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
</x-guest-layout>
