<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\File;
  
class FileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imageUpload');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'filenames' => '',
                'filenames.*' => ''
        ]);


        $files = [];
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = time().rand(1, 100).'.'.$file->extension();
                $file->move(public_path('files'), $name);
                $files[] = $name;
            }
        }

        $file= new File();
        $file->filenames = $files;
        $file->save();


        return back()->with('success', 'Your file has been successfully added');
    }
}
   