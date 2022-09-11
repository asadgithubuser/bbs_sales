<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseCertificate;
use Illuminate\Support\Facades\Storage;
use DB;
use Auth;
use View;
class CourseCertificateController extends Controller
{
    public function createCertificate (){
        menuSubmenu('certificate','create_certificate');
        return view('backend.admin.certificate.create');
    }
    public function createCertificateInfo (Request $request){
        // menuSubmenu('certificate','create_certificate');
        $certificate = new CourseCertificate();

        $certificate->heading_1     = $request->heading_1;
        $certificate->heading_2     = $request->heading_2;
        $certificate->heading_3     = $request->heading_3;
        $certificate->heading_4     = $request->heading_4;
        $certificate->content_text  = $request->content_text;
        $certificate->create_date  = $request->create_date;
        $certificate->status        = $request->status;


        $image1 = $request->file('logo_1');
        $image2 = $request->file('logo_2');
        $image3 = $request->file('cd_sign');
        $image4 = $request->file('d_sign');
        $image5 = $request->file('dg_sign');

        $name1 = $image1->getClientOriginalName();
        $name2 = $image2->getClientOriginalName();
        $name3 = $image3->getClientOriginalName();
        $name4 = $image4->getClientOriginalName();
        $name5 = $image5->getClientOriginalName();
        $destinationPath = 'images/';

        $img1=$destinationPath.$name1;
        $img2=$destinationPath.$name2;
        $img3=$destinationPath.$name3;
        $img4=$destinationPath.$name4;
        $img5=$destinationPath.$name5;

        $image1->move($destinationPath, $name1);
        $image2->move($destinationPath, $name2);
        $image3->move($destinationPath, $name3);
        $image4->move($destinationPath, $name4);
        $image5->move($destinationPath, $name5);

        $certificate->logo_1 = $img1;
        $certificate->logo_2 = $img2;
        $certificate->cd_sign = $img3;
        $certificate->d_sign = $img4;
        $certificate->dg_sign = $img5;

    //   dd( $certificate);


        $certificate->save();

        return redirect()->back();
    }
    public function viewCertificate (){

        menuSubmenu('certificate','view_certificate');
       $certificates = CourseCertificate::all();
        return view('backend.admin.certificate.view',
        [
            'certificates'=>$certificates
        ]);
    }

    public function viewCertificateInfos(){
        $get= CourseCertificate::findOrFail($_GET['id']);
        // menuSubmenu('certificate','view_certificate');
        return view('backend.admin.certificate.certificate_view',['certificate'=>$get]);
    }

   public function viewCertificateByTrainee(){
        menuSubmenu('certificate','get_certificate');
        $certificate= CourseCertificate::where('status',1)->first();
        return view('backend.admin.certificate.certificate_view_by_trainee', [
            'certificate' => $certificate
        ]);
   }


    public function activeTemplate(){
        $active= CourseCertificate::findOrFail($_GET['id']);
        $active->status=1;
        if($active){
            CourseCertificate::whereStatus(1)->update(['status'=>0]);
        }
        $active->save();
        return redirect()->back();

    }


    public function inactiveTemplate(){
        $inactive= CourseCertificate::findOrFail($_GET['id']);
        $inactive->status=0;
        $inactive->save();
         return redirect()->back();

    }


    public function deleteCertificateInfo(){
        $delete= CourseCertificate::findOrFail($_GET['id']);
        $delete->delete();
        return redirect()->back();
    }

}
