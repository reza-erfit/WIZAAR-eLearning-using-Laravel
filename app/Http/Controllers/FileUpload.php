<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Materi;
class FileUpload extends Controller
{
  public function createForm(){
    return view('dashboard.file-upload.index');
  }

  public function fileUpload(Request $req){
        $req->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);
        $fileModel = new Materi;
        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->nama = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/.' . $filePath;
            $fileModel->save();
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
   }
}