@extends('frontend.layouts.app')
@section('content')
    <div>
        <div class="container mx-auto">
            <div class="flex justify-end my-2">
                <a href="{{ route('profile.edit') }}"
                    class="text-primary hover:underline border rounded-md py-2 px-3 text-sm border-primary hover:bg-primary hover:text-white duration-150 transition-all font-semibold">profile</a>
            </div>
            <form class="w-96 mx-auto p-5 border rounded-md my-5 " method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                <h1 class="py-4 text-center font-bold text-primary">Update Password</h1>
                @if (session('status') === 'password-updated')
                    <p class="text-xs text-white text-center bg-green-500 py-1 my-2 mb-3">Password Updated SuccessFully</p>
                @endif

                <div class="relative z-0 w-full mb-6 group">
                    <input type="password" name="current_password" id="floating_password"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-primary peer"
                        placeholder=" " required />
                    <label for="floating_password"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />


                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="password" name="password" id="floating_password"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-primary peer"
                        placeholder=" " required />
                    <label for="floating_password"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />


                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="password" name="password_confirmation" id="floating_repeat_password"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-primary peer"
                        placeholder=" " required />
                    <label for="floating_repeat_password"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm
                        password</label>
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />


                </div>
                <button type="submit"
                    class="text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm w-full sm:w-auto px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                    Password</button>

            </form>
        </div>
    </div>
@endsection
