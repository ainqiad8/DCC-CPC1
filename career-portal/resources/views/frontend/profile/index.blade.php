@extends('frontend.layouts.app')
@section('content')
    {{-- delete modal  --}}
    <div class="relative z-10 hidden" id="delete-account" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Delete Your
                                    account</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Are you sure you want to Delete your account? All
                                        of your data will be permanently removed. This action cannot be undone.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <form action="{{ route('profile.destroy') }}" class="w-full" method="post">
                            @csrf
                            @method('delete')


                            <div class="mb-6 ">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-red-500 ">Enter Your
                                    Password</label>
                                <input type="password" id="password" name="password"
                                    class="bg-gray-50 border border-red-500 focus:border-red-500 focus:outline-none text-gray-900 text-sm rounded-lg  block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 "
                                    placeholder="•••••••••" required>
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />

                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="submit"
                                    class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Confirm</button>
                                <button type="button" id="cancel-delete-account"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- delete modal ends here  --}}















    <div>
        <div class="container mx-auto">


            <div class="flex justify-end gap-2 my-2">
                <a href="{{ route('profile.credentials') }}"
                    class="text-primary hover:underline border rounded-md py-2 px-3 text-sm border-primary hover:bg-primary hover:text-white duration-150 transition-all font-semibold">Credential</a>

                <button type="submit" onclick="deleteAccount()"
                    class="text-red-500 hover:underline border rounded-md py-2 px-3 text-sm border-red-500 hover:bg-red-500 hover:text-white duration-150 transition-all font-semibold">Delete
                    Account</button>

            </div>
            <form class="w-auto md:w-[650px] mx-auto p-5 border rounded-md my-5 " method="POST"
                action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-3 flex justify-center">
                    <img src="{{ asset('frontend/assets/logo.png') }}" alt="" srcset="">
                </div>
                <h1 class="py-4 text-center font-bold text-primary">Update Profile</h1>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" value="{{ old('name', $user->name) }}" name="name" id="floating_first_name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-primary peer"
                        placeholder=" " />
                    <label for="floating_first_name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Name</label>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                </div>



                <div class="flex  gap-2">
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" value="{{ old('city', $profile?->city) }}" name="city" id="city"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-primary peer"
                            placeholder=" " />
                        <label for="city"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            City</label>
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />

                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" value="{{ old('country', $profile?->country) }}" name="country" id="country"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-primary peer"
                            placeholder=" " />
                        <label for="country"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Country</label>
                        <x-input-error :messages="$errors->get('country')" class="mt-2" />

                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="number" value="{{ old('postal_code', $profile?->postal_code) }}" name="postal_code"
                            id="postal_code"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-primary peer"
                            placeholder=" " />
                        <label for="postal_code"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Postal Code</label>
                        <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />

                    </div>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="phone" name="phone" value="{{ old('phone', $profile?->phone) }}" id="phone"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-primary peer"
                        placeholder=" " />
                    <label for="phone"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Phone</label>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />

                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <textarea rows="5" name="address" id="address"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-primary peer"
                        placeholder=" " required> {{ old('address', $profile?->address) }} </textarea>
                    <label for="address"
                        class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address</label>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
                @if (isset($profile->resume))
                    <div class="my-5">

                        <embed src="{{ asset('storage/resumes/' . $profile->resume) }}" type="application/pdf"
                            width="100%" height="200px" />
                    </div>
                @endif
                <div class="relative z-0 w-full mb-6 group">
                    <input type="file" name="resume" id="resume"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-primary peer"
                        placeholder=" " required />
                    <label for="resume"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Resume</label>
                    <x-input-error :messages="$errors->get('resume')" class="mt-2" />
                </div>

                <button type="submit"
                    class="text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm w-full sm:w-auto px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                    Profile</button>

            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteAccount() {
            document.getElementById('delete-account').classList.remove('hidden');
        }

        document.getElementById('cancel-delete-account').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('delete-account').classList.add('hidden');
        });
    </script>
@endsection
