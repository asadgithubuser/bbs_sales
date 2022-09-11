<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceItem;
use App\Models\TemplateSetting;
use App\Models\SmsEmailTemplate;
use App\Models\Level;
use App\Models\AssessmentTemplate;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
class SettingController extends Controller
{
    public function templateSetting()
    {
        menuSubmenu('setting','templateSetting');
        $user = Auth::user();

        if (Gate::allows('settings', $user)) 
        {
            if(Gate::allows('all_template',$user))
            {
                $templates = TemplateSetting::latest()->paginate(25);
                return view('backend.admin.setting.templateSetting',[
                    'templates' => $templates
                ]);
            }
            else
            {
                abort(403);
            }
            
        }
        else
        {
            abort(403);
        }

    }

    public function showTemp(TemplateSetting $template)
    {
       return view('backend.admin.setting.showTemp',[
           'template' => $template
       ]);
    }
    // Assessment template
    public function assessmentTemplate()
    {
        menuSubmenu('setting','assessmentTemplate');
        $user = Auth::user();

        if (Gate::allows('settings', $user)) 
        {
            if(Gate::allows('assessment_template',$user))
            {
                $templates = AssessmentTemplate::latest()->paginate(25);

                return view('backend.admin.setting.assessmentTemplates', compact('templates'));
            }
            else
            {
                abort(403);
            }
            
        }
        else
        {
            abort(403);
        }

    }

    // Show add assessment template form
    public function addAssessmentTemplate()
    {
        return view('backend.admin.setting.assessmentCreate');
    }

    // Store assessment template form
    public function storeAssessmentTemplate(Request $request)
    {
        $assessmentTemplate = new AssessmentTemplate;
        $assessmentTemplate->name = $request->name;
        $assessmentTemplate->header = $request->header;
        $assessmentTemplate->footer = $request->footer;
        if ($request->status)
        {
            $alter = AssessmentTemplate::where('status', 1)->get();
            foreach ($alter as $alt)
            {
                $alt->status = 0;
                $alt->save();
            }
            $assessmentTemplate->status = 1;

        } else {
            $assessmentTemplate->status = 0;
        }
        
        $done = $assessmentTemplate->save();

        if ($done)
        {
            return redirect(route('admin.setting.assessmentTemplate'))->with('success', 'New assessment template added.');
        } else {
            return redirect(route('admin.setting.assessmentTemplate'))->with('error', 'Something went wrong, Please try again...!');
        }

    }

    // Edit assessment template
    public function editAssessmentTemplate($id)
    {
        $AT = AssessmentTemplate::where('id', $id)->first();
        return view('backend.admin.setting.editAssessmentTemplate', compact('AT'));
    }

    // Update assessment template
    public function updateAssessmentTemplate(Request $request , $id)
    {
        $assessmentTemplate = AssessmentTemplate::where('id', $id)->first();
        $assessmentTemplate->name = $request->name;
        $assessmentTemplate->header = $request->header;
        $assessmentTemplate->footer = $request->footer;
        if ($request->status)
        {
            $alter = AssessmentTemplate::where('status', 1)->get();
            foreach ($alter as $alt)
            {
                $alt->status = 0;
                $alt->save();
            }
            $assessmentTemplate->status = 1;

        } else {
            $assessmentTemplate->status = 0;
        }
        
        $done = $assessmentTemplate->save();

        if ($done)
        {
            return redirect(route('admin.setting.assessmentTemplate'))->with('success', 'New assessment template added.');
        } else {
            return redirect(route('admin.setting.assessmentTemplate'))->with('error', 'Something went wrong, Please try again...!');
        }
    }

    // Delete assessment template
    public function deleteAssessmentTemplate($id)
    {
        $done = $assessmentTemplate = AssessmentTemplate::where('id', $id)->delete();

        if ($done)
        {
            return redirect(route('admin.setting.assessmentTemplate'))->with('success', 'Assessment deleted successfully.');
        } else {
            return redirect(route('admin.setting.assessmentTemplate'))->with('error', 'Something went wrong, Please try again...!');
        }
    }

    public function createTemplate()
    {
        $user = Auth::user();

        if (Gate::allows('settings', $user)) 
        {
            if(Gate::allows('add_template',$user))
            {
                $services = Service::where('id','<>',3)->get();
                $certificate_service = Service::where('id',3)->first();
                $service_items = ServiceItem::where('service_id',3)->get();
                // dd($service_items);
                    return view('backend.admin.setting.createTemplate',[
                    'services' => $services,
                    'certificate_service' => $certificate_service,
                    'service_items' =>$service_items
                ]);
            }
            else
            {
                abort(403);
            }
            
        }
        else
        {
            abort(403);
        }
        
    }

    public function storeTemplate(Request $request)
    {
        // dd($request->all());
        $validation = Validator::make($request->all(),
        [   'service' => ['required'],
            'header' => ['required','min:3','string'],
            'footer' => ['required','min:3','string'],
            'body' => ['required','min:3','string'],
        ]);

        if($validation->fails())
        {
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => false,
                    'errors' => $validation->errors()->toArray(),
                    'sessionMessage' => 'Please, fillup the form correctly and try again.'
                ));
            }

            return back()
            ->withInput()
            ->withErrors($validation);
        }
        $template = new TemplateSetting;
        $template->type = $request->service;
        if($request->service == 'other')
        {
            $template->service_id = $request->service_type_other;
        }
        elseif($request->service == 'certificate')
        {
            $template->service_id = $request->service_type_certificate;
            $template->service_item_id = $request->service_item;
        }
        $template->header = $request->header;
        $template->footer = $request->footer;
        $template->body = $request->body;
        $template->status = true;
        
        // dd($template);
        $template->save();

        return redirect()->route('admin.setting.templateSetting')->with('success','Template Create Successfully.');
    }

    public function editTemplate(TemplateSetting $template)
    {
        
        $user = Auth::user();

        if (Gate::allows('settings', $user)) 
        {
            if(Gate::allows('edit_template',$user))
            {
                $services = Service::all();
                return view('backend.admin.setting.editTemplate',[
                    'services' => $services,
                    'template' => $template
                ]);
            }
            else
            {
                abort(403);
            }
            
        }
        else
        {
            abort(403);
        }
        
    }

    public function updateTemplate(Request $request, TemplateSetting $template)
    {
        $validation = Validator::make($request->all(),
        [   'service' => ['required'],
            'header' => ['required','min:3','string'],
            'footer' => ['required','min:3','string'],
            'body' => ['required','min:3','string'],
        ]);

        if($validation->fails())
        {
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => false,
                    'errors' => $validation->errors()->toArray(),
                    'sessionMessage' => 'Please, fillup the form correctly and try again.'
                ));
            }

            return back()
            ->withInput()
            ->withErrors($validation);
        }

        
        $template->service_id = $request->service;
        $template->header = $request->header;
        $template->footer = $request->footer;
        $template->body = $request->body;
        
        $template->save();

        return redirect()->route('admin.setting.templateSetting')->with('success','Template Create Successfully.');
    }

    public function destroy(TemplateSetting $template)
    {
        $user = Auth::user();

        if (Gate::allows('settings', $user)) 
        {
            if(Gate::allows('status_template',$user))
            {
                if($template->status == 1)
                {
                    $template->status = false;
                    $template->save();

                    return back()->with('info','Template Disable Successfully.');
                }
                else
                {
                    $template->status = true;
                    $template->save();

                    return back()->with('info','Template Enable Successfully.');
                }
            }
            else
            {
                abort(403);
            }
            
        }
        else
        {
            abort(403);
        }

        
    }

    // sms template setting

    public function smsTemplateSetting()
    {

        $user = Auth::user();

        if (Gate::allows('settings', $user)) 
        {
            if(Gate::allows('all_sms_template',$user))
            {
                menuSubmenu('setting','smsTemplateSetting');
        
                $templates = SmsEmailTemplate::latest()->paginate(25);
                
                return view('backend.admin.setting.smsTemplateSetting',[
                    'templates' => $templates
                ]);
            }
            else
            {
                abort(403);
            }
            
        }
        else
        {
            abort(403);
        }
    }

    public function createSMSTemplate()
    {
        $user = Auth::user();

        if (Gate::allows('settings', $user)) 
        {
            if(Gate::allows('add_sms_template',$user))
            {
                return view('backend.admin.setting.createSMSTemplate');
            }
            else
            {
                abort(403);
            }
            
        }
        else
        {
            abort(403);
        }
       
    }

    public function editSmsTemplate(SmsEmailTemplate $template)
    {
        $user = Auth::user();

        if (Gate::allows('settings', $user)) 
        {
            if(Gate::allows('edit_sms_template',$user))
            {
                return view('backend.admin.setting.editSmsTemplate',[
                    'template' => $template
                ]);
            }
            else
            {
                abort(403);
            }
            
        }
        else
        {
            abort(403);
        }

    }

    public function storeSmsTemplate(Request $request)
    {
        
        $validation = Validator::make($request->all(),
        [   'type' => ['required'],
            'title' => ['required','min:3','string'],
            'details' => ['required','min:3','string'],
            'subject' => ['required','min:3','string'],
        ]);

        if($validation->fails())
        {
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => false,
                    'errors' => $validation->errors()->toArray(),
                    'sessionMessage' => 'Please, fillup the form correctly and try again.'
                ));
            }

            return back()
            ->withInput()
            ->withErrors($validation);
        }
        $template = new SmsEmailTemplate;
        $template->type = $request->type;
        $template->title = $request->title;
        $template->details = $request->details;
        $template->subject = $request->subject;
        

        $template->save();

        return redirect()->route('admin.setting.smsTemplateSetting')->with('success','SMS-Email Template Create Successfully.');
    }

    public function updateSmsTemplate(Request $request, SmsEmailTemplate $template)
    {
        $validation = Validator::make($request->all(),
        [   'type' => ['required'],
            'title' => ['required','min:3','string'],
            'details' => ['required','min:3','string'],
            'subject' => ['required','min:3','string'],
        ]);

        if($validation->fails())
        {
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => false,
                    'errors' => $validation->errors()->toArray(),
                    'sessionMessage' => 'Please, fillup the form correctly and try again.'
                ));
            }

            return back()
            ->withInput()
            ->withErrors($validation);
        }
        
        $template->type = $request->type;
        $template->title = $request->title;
        $template->details = $request->details;
        $template->subject = $request->subject;
        

        $template->save();

        return redirect()->route('admin.setting.smsTemplateSetting')->with('success','SMS-Email Updated Create Successfully.');
    }

    public function smsDestroy(SmsEmailTemplate $template)
    {

        $user = Auth::user();

        if (Gate::allows('settings', $user)) 
        {
            if(Gate::allows('delete_sms_template',$user))
            {
                
                $template->delete();
                return redirect()->route('admin.setting.smsTemplateSetting')->with('success','SMS-Email Delete Successfully.');
            }
            else
            {
                abort(403);
            }
            
        }
        else
        {
            abort(403);
        }
        

    }

    public function levelSetting()
    {
        $user = Auth::user();

        if (Gate::allows('settings', $user)) 
        {
            if(Gate::allows('all_level',$user))
            {
                menuSubmenu('setting','levelSetting');

                $levels = Level::latest()->paginate(25);
                return view('backend.admin.setting.levelSetting',[
                    'levels'=>$levels
                ]);
            }
            else
            {
                abort(403);
            }
            
        }
        else
        {
            abort(403);
        }

    }

    public function createLevel(Request $request)
    {
        $validation = Validator::make($request->all(),
        [   
            'name_en' => ['required','min:2','string'],
            'name_bn' => ['required','min:2','string'],
        ]);

        if($validation->fails())
        {
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => false,
                    'errors' => $validation->errors()->toArray(),
                    'sessionMessage' => 'Please, fillup the form correctly and try again.'
                ));
            }

            return back()
            ->withInput()
            ->withErrors($validation);
        }

        $level = new Level;
        $level->name_en = $request->name_en;
        $level->name_bn = $request->name_bn;

        $level->save();

        return redirect()->route('admin.setting.levelSetting')->with('success','Level Updated Successfully.');
    }

    public function editLevelSetting(Level $level)
    {
        $user = Auth::user();

        if (Gate::allows('settings', $user)) 
        {
            if(Gate::allows('edit_level',$user))
            {
                return view('backend.admin.setting.editLevelSetting',[
                    'level'=>$level
                ]);
            }
            else
            {
                abort(403);
            }
            
        }
        else
        {
            abort(403);
        }
        
    }

    public function updateLevel(Level $level, Request $request)
    {
        $validation = Validator::make($request->all(),
        [   
            'name_en' => ['required','min:2','string'],
            'name_bn' => ['required','min:2','string'],
        ]);

        if($validation->fails())
        {
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => false,
                    'errors' => $validation->errors()->toArray(),
                    'sessionMessage' => 'Please, fillup the form correctly and try again.'
                ));
            }

            return back()
            ->withInput()
            ->withErrors($validation);
        }

        $level->name_en = $request->name_en;
        $level->name_bn = $request->name_bn;

        $level->save();
        
        return redirect()->route('admin.setting.levelSetting')->with('success','Level Updated Successfully.');

    }
}
