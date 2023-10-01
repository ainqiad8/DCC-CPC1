<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Termwind\Components\Dd;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    //  path where we will upload the file
    private static $UPLOAD_DIR = "storage/resumes/";



    // function to upload files to the server
    private function uploadFile($file)
    {
        // getting date to append to the file name
        $date = date('Y-m-d');
        // date append before the file name
        $fileName = $date . '-' . $file->hashName();
        // moving the file to the upload directory
        $file->move(self::$UPLOAD_DIR, $fileName);
        // returning the file name
        return $fileName;
    }


    // function to delete the file from the server
    private function deleteFile($fileName)
    {
        // concating file name to file path to get the file path
        $filePath = self::$UPLOAD_DIR . $fileName;

        // checking if file exists
        if (file_exists($filePath)) {
            // deleting the file
            unlink($filePath);
        }
    }


    public function edit(Request $request): View
    {
        return view('frontend.profile.index', [
            'profile' => $request->user()->profile,
            'user' => $request->user()
        ]);
    }
    public function credentials(): View
    {
        return view('frontend.profile.credentials');
    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $request->user()->update([
            'name' => $request->name,
        ]);

        $request->user()->save();

        if ($request->user()->profile == null) {


            $fileName = null;
            // if request has file
            if ($request->hasFile('resume')) {
                // upload the file
                $fileName = $this->uploadFile($request->file('resume'));
            }
            $request->user()->profile()->create([
                'address' => $request->address,
                'phone' => $request->phone,
                'city' => $request->city,
                'country' => $request->country,
                'postal_code' => $request->postal_code,
                'resume' => $fileName,
            ]);
        } else {
            $data = [
                'address' => $request->address,
                'phone' => $request->phone,
                'city' => $request->city,
                'country' => $request->country,
                'postal_code' => $request->postal_code
            ];
            if ($request->hasFile('resume')) {

                // delete the old file
                $this->deleteFile($request->user()->profile->resume);
                // upload the new file
                $fileName = $this->uploadFile($request->file('resume'));
                // add the file name to the data array
                $data['resume'] = $fileName;
            }

            $request->user()->profile()->update($data);
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        // dd($request->all());

        $user = $request->user();
        $profile = $user->profile;
        if ($profile) {
            $this->deleteFile($profile->resume);
            $user->profile()->delete();
        }
        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
