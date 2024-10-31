<x-guest-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row">
        
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <img src="{{ asset('images/E-SMA.png') }}" alt="Logo" class="w-24 h-24 mx-auto mb-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Input[ype="email"] -->
                    <div class="mt-4">
                        <x-input-label :value="__('Email')"/>
                        <x-text-input type="email"
                                 id="email"
                                 name="email"
                                 value="{{ old('email') }}"
                                 class="block w-full"
                                 required
                                 autofocus/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Input[ype="password"] -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')"/>
                        <x-text-input type="password"
                                 id="password"
                                 name="password"
                                 class="block w-full"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex mt-6 text-sm">
                        <label class="flex items-center dark:text-gray-400">
                            <input type="checkbox"
                                   name="remember"
                                   class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple">
                            <span class="ml-2">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="mt-4">
                        <x-primary-button class="block w-full" style="color:black !important;,background-color:blue !important;">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>

                <hr class="my-8"/>

                @if (Route::has('password.request'))
                    <p class="mt-4">
                        <a class="text-sm font-medium text-primary-600 hover:underline"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>
