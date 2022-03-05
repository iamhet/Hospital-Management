<x-guest-layout>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

       


        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
              <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                  <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                      <div class="mb-4 text-sm text-white">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
                      <form method="POST" action="{{ route('password.email') }}">
                        <div class="form-group">
                            <x-jet-label for="email" value="{{ __('Email') }}" style="color:white;"/><br>
                            <x-jet-input id="email" class="form-control p_input" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                        
                        <div class="text-center">
                            <x-jet-button>
                                {{ __('Email Password Reset Link') }}
                            </x-jet-button>
                        </div>
                        
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
