<?php


class BanglaConverter {
  public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
  public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

  public static function bnToen($number) {
      return str_replace(self::$bn, self::$en, $number);
  }

  public static function enTobn($number) {
      return str_replace(self::$en, self::$bn, $number);
  }
}

function menuSubmenu($menu, $submenu)
{
    $request = request();
    $request->session()->forget(['lsbm','lsbsm','lsbssm']);
    $request->session()->put(['lsbm'=>$menu,'lsbsm'=>$submenu]);
    return true;
}

function menuSubmenuSubsubmeny($menu, $submenu, $subsubmenu)
{
    $request = request();
    $request->session()->forget(['lsbm','lsbsm','lsbssm']);
    $request->session()->put(['lsbm'=>$menu,'lsbsm'=>$submenu,'lsbssm'=>$subsubmenu]);
    return true;
}

function custom_name($text, $limit)
{
  if(strlen($text) > $limit)
  {
    return str_pad(mb_substr($text, 0, ($limit - 2),"utf-8"), ($limit +1),'.');
  }
  else
  {
    return $text;
  }
}

function custom_slug($text)
{
    
    $string = Str::slug($text);
   
    $string = substr($string, 0,100);
    return $string;
}


function traineeCourseCountStatus()
{
    $training_course_ids = array();
    $trainingLists = App\Models\CourseTrainingList::where('status', 1)->get();
    foreach($trainingLists as $trainingList){
        if(in_array(Auth::user()->department_id, json_decode($trainingList->department_id))){
            array_push($training_course_ids, $trainingList->id);
        }
    }
    $trainingCourseList = App\Models\CourseTrainingList::whereIn('id', $training_course_ids)->latest()->paginate(25);
    $count = 0;
    foreach($trainingCourseList as $tcl){
        if(isset($tcl->course) && !$tcl->course->courseListDetails){
            $count ++;
        }
    }
    return $count;
}

