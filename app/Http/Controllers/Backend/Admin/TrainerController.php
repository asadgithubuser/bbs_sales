<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\TrainingTrainer;

class TrainerController extends Controller
{
    // Trainer list
    public function index()
    {
        menuSubmenu('manageTrainer','allTrainer');

        $trainers = TrainingTrainer::latest()->paginate(25);
        
        return view('backend.admin.trainer.index', compact('trainers'));
    }

    
    // Add new Trainer
    public function addTrainer()
    {
        menuSubmenu('manageTrainer','addTrainer');

        return view('backend.admin.trainer.add');
    }

    // Store Trainer into DB
    public function store(Request $request, $type)
    {
        $trainer = new TrainingTrainer;
        $trainer->name = $request->name;
        $trainer->phone = $request->phone;
        $trainer->email = $request->email;
        $trainer->address = $request->address;
        $trainer->created_by = Auth::user()->id;
        $trainer->status = 1;

        if($request->hasFile('photo'))
        {
            $cp = $request->file('photo');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = 'Trainer_photo'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            Storage::disk('public')->put('trainers/'.$randomFileName, File::get($cp));

            $trainer->photo = $randomFileName;
            $trainer->save();
      	}
        $done = $trainer->save();

        if ($type == 'add_outer_trainer'){
            return back()->with('success', 'New trainer added successfully');
        }else{
            if ($done)
            {
                return redirect()->route('admin.trainer.index')->with('success', 'New trainer added successfully');
            } else {
                return back()->with('error', 'New trainer added successfully');
            }
        }
        
    }

    // Edit trainer
    public function edit($id)
    {
        $trainer = TrainingTrainer::where('id', $id)->first();
        return view('backend.admin.trainer.edit', compact('trainer'));
    }

    // Update trainer
    public function update(Request $request, $id)
    {
        $trainer = TrainingTrainer::where('id', $id)->first();
        $trainer->name = $request->name;
        $trainer->phone = $request->phone;
        $trainer->email = $request->email;
        $trainer->address = $request->address;
        $trainer->updated_by = Auth::user()->id;

        if($request->hasFile('photo'))
        {
            $cp = $request->file('photo');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = 'Trainer_photo'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            Storage::disk('public')->put('trainers/'.$randomFileName, File::get($cp));

            $trainer->photo = $randomFileName;
            $trainer->save();
      	}
        $done = $trainer->save();

        if ($done)
        {
            return redirect()->route('admin.trainer.index')->with('success', 'New trainer added successfully');
        } else {
            return back()->with('error', 'New trainer added successfully');
        }
    }

    // Change trainer status (active/inactive)
    public function changeStatus($id)
    {
        $trainer = TrainingTrainer::where('id', $id)->first();

        if($trainer->status == 0)
        {
            $trainer->status = 1;
            $trainer->save();
            return back()->with('success', 'Trainer successfully activated.');
        } else {
            $trainer->status = 0;
            $trainer->save();
            return back()->with('success', 'Trainer successfully deactivated.');
        }
    }
        

}
