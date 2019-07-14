<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Intervention\Image\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;

class ProfileController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($name, Request $request)
    {
        $this->data['user'] = User::where('name', $name)->with(['films' => function($film) {
            $film->where('active', 1)->select('id', 'title', 'author')->take(10);
        }, 'comments' => function($comment) {
            $comment->where('active', 1)->orderBy('created_at', 'desc')->take(20);
        }])->firstOrFail();
        $this->data['is_me'] = $this->data['user']->id == $request->user()->id;
        return view('profile.show', $this->data);
    }


    public function edit($name, Request $request)
    {
        if($request->user()->name !== $name)
            return __('access.messages.error_access');
        $this->data['user'] = $request->user();
        return view('profile.edit', $this->data);
    }


    public function update(Request $request, $name)
    {
        if($request->user()->name !== $name)
            return __('access.messages.error_access');

        $this->validate($request, [
           'name' => 'required|min:3|max:30',
           'email' => 'required|email|unique:users',
           'avatar' => 'image|max:5000'
        ]);

        $name = $request->name;
        $email = $request->email;
        $user = $request->user();

        $fullFilename = null;
        $resizeWidth = 300;
        $resizeHeight = 200;
        $slug = 'users/'.$user->id;
        $file = $request->input()->file('avatar');
        $filename = Str::random(20);
        $fullPath = $slug.'/'.date('F').date('Y').'/'.$filename.'.'.$file->getClientOriginalExtension();

        $ext = $file->guessClientExtension();

        if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif'])) {
            $image = Image::make($file)
                ->resize($resizeWidth, $resizeHeight, function (Constraint $constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode($file->getClientOriginalExtension(), 75);

            // move uploaded file from temp to uploads directory
            if (Storage::disk('public')->put($fullPath, (string) $image, 'public')) {
                $status = 'Image successfully uploaded!';
                $fullFilename = $fullPath;
                return $fullFilename;
            } else {
                $status = 'Upload Fail: Unknown error occurred!';
            }
        } else {
            $status = 'Upload Fail: Unsupported file format or It is too large to upload!';
        }
        return $status;

        return back();
    }


    public function destroy($id)
    {
        //
    }
}
