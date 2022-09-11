<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserActivity;

class StaffactivityController extends Controller
{
    // Confirmation Payment Waiting
    public function user_activity(Request $request)
    {
        $date = $request->date;

        $user_activity = UserActivity::orderBy('id', 'desc');


        $user_activity = $user_activity->paginate(15);
        return view('backend.staff.activity.index', compact('user_activity', 'date'));
    }




    public function create()
    {
        //
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_activity=UserActivity::findOrFail($id);
        $user_activity->delete($user_activity->id);
        flash(translate('Delete Successfull'))->success();
        return back();
    }
}
