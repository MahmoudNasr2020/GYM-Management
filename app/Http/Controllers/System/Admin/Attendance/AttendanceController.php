<?php

namespace App\Http\Controllers\System\Admin\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Member;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('system\admin\pages\attendance\attendance');
    }

    public function search_attendence(Request $request)
    {
        $date =  strtr($request->attendance_date,'/','-');
        $attendance_date = date('Y-m-d',strtotime($date));
        $members = Member::select('id','name')->orderBy('id','desc')->get();
        //$days = Teacher_Attendance::whereDate('attendance_date',$date)->get();
        foreach($members as $member)
        {
             $member_attendance = Attendance::where('member_id',$member->id)->whereDate('attendance_date','=',$attendance_date)->first();
            if($member_attendance)
            {
                $member->attendance = $member_attendance->attendance;
                $member->attendance_note = $member_attendance->note;
            }
        }
        return DataTables::of($members)
                    ->addColumn('attendance',function($row){

                        $present = $row->attendance == 'present' ?'checked' :'';
                        $absent = $row->attendance == 'absent' ?'checked' :'';
                        $btn_attendance = ' <div class="radio-inline" style="margin: 0 auto;display: inline-flex;">
                                                <label class="radio radio-success">
                                                <input type="radio" class="radio_attendance" name="attendance_date'.$row->id.'"
                                                data-member_id='.$row->id.' data-attendance="present" '.$present.'>
                                                <span></span>حاضر
                                                </label>
                                                <label class="radio radio-danger">
                                                <input type="radio" class="radio_attendance"  name="attendance_date'.$row->id.'"
                                                data-member_id='.$row->id.' '.$absent.' data-attendance="absent" $absent>
                                                <span></span>غايب</label>
                                            </div>
                                            ';
                                            return $btn_attendance;

                    })
                    ->addColumn('note',function($row){
                        $note = $row->attendance_note != '' ? $row->attendance_note : '';
                        return '<textarea type="text"  style="display: inline-flex;width: 270px;"
                        class="form-control member_note" name="attendance_note" autocomplete="off" value='.$note.'>'.$note.'</textarea>';
                    })
                    ->addIndexColumn()
                    ->rawColumns(['attendance','note'])
                    ->make(true);

    }

    public function assign_attendence(Request $request)
    {
        $date = strtr($request->attendance_date, '/', '-');
        $attendance_date = date('Y-m-d',strtotime($date));
        foreach($request->data as $item)
        {
            Attendance::updateOrCreate(
                ['member_id'=>$item['member_id'],'attendance_date'=>$attendance_date],
                ['note'=>$item['note'],'attendance'=>$item['attendance']]
            );
        }
        return 'done';
    }

    public function show_attendence(Request $request)
    {
       $date = strtr($request->date, '/', '-');
       $attendance_date = date('Y-m-d',strtotime($date));
       $member_attendance = Attendance::where(['member_id'=>$request->member_id])->whereDate('attendance_date',$attendance_date)->first();
       $data = $member_attendance != null ? $member_attendance : null ;
       return $data;
    }
}
