<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Date;
use App\Models\Time;

use Auth;

use Carbon\Carbon;

use App\Http\Request\RegisterRequest;

class AtteController extends Controller
{    
    public function userList(){
        $users = User::orderBy('created_at')->paginate(5);
        return view('user_list', compact('users'));
    }
    
    public function attendanceRecord(Request $request){
        $user_name = DB::table("users")
        ->where('id', $request->id)
        ->select('name')
        ->get();
        
        $user_id = $request->id;
        
        $dates = Date::where('user_id', $user_id)->paginate(5);
        return view('attendance_record', compact('dates', 'user_name', 'user_id'));
    }
    
    public function date(Request $request){
        $users = User::all();
        
        if($request->date == null) {
            $dt = Carbon::now();
        }
        $dt = Carbon::now();
        
        $dates = Date::whereDate('created_at', $dt->format('Y-m-d'))->paginate(5);
        
        return view('date', compact('dt', 'dates', 'users'));
    }
    
    public function subDate(Request $request) {
        $users = User::all();
        
        $dt = Carbon::createFromTimeString($request->dt);
        $dt = $dt->subDays();
        
        $dates = Date::whereDate('created_at', $dt->format('Y-m-d'))->paginate(5);
        
        return view('date', compact('dt', 'dates', 'users'));
    }
    
    public function addDate(Request $request) {
        $users = User::all();
        
        $dt = Carbon::createFromTimeString($request->dt);
        $dt = $dt->addDays();
        
        $dates = Date::whereDate('created_at', $dt->format('Y-m-d'))->paginate(5);
        
        return view('date', compact('dt', 'dates', 'users'));
    }
    
    public function stamp(){
        $auths = Auth::user();
        $dt = Carbon::now();
        
        $checkAttendance = $this->checkAttendance();
        
        return view('stamp', compact('auths', 'checkAttendance'));
    }
    
    public function workStart() {
        $auths = Auth::user();
        $dt = Carbon::now();
        $param = [
            'user_id' => $auths->id,
            'work_start' => $dt->format('H:i:s'),
        ];
        Date::create($param);
        $checkAttendance = $this->checkAttendance();
        
        return view('stamp', compact('auths', 'checkAttendance'));
    }
    
    public function workEnd() {
        $auths = Auth::user();
        $dt = Carbon::now();
        Date::where('user_id', $auths->id)->latest()->first()->update([
            'work_end' => $dt->format('H:i:s'),
        ]);
        
        $checkAttendance = $this->checkAttendance();
        
        return view('stamp', compact('auths', 'checkAttendance'));
    }
    
    public function breakStart(){
        $auths = Auth::user();
        $dt = Carbon::now();
        $dates = Date::all();
        $dates = Date::where('user_id', $auths->id)->whereDate('created_at', $dt->format('Y-m-d'))->latest()->first();
        $param = [
            'date_id' => $dates->id,
            'break_start' => $dt,
            'break_end' => $dt,
        ];
        Time::create($param);
        $checkAttendance = $this->checkAttendance();
        
        return view('stamp', compact('auths', 'checkAttendance'));
    }
    
    public function breakEnd() {
        $auths = Auth::user();
        $dt = Carbon::now();
        $dates = Date::all();
        $dates = Date::where('user_id', $auths->id)->whereDate('created_at', $dt->format('Y-m-d'))->latest()->first();
        Time::where('date_id', $dates->id)->latest()->first()->update([
            'break_end' => $dt,
        ]);
        $checkAttendance = $this->checkAttendance();
        
        return view('stamp', compact('auths', 'checkAttendance'));
    }
    
    
    
    private function checkAttendance(){
        $auths = Auth::user();
        $dt = Carbon::now();
        
        $dates = Date::whereDate('created_at', $dt->format('Y-m-d'))->where('user_id', $auths->id)->latest()->first();
        
        if(isset($dates)){
            $times = Time::where('date_id', $dates->id)->latest()->first();
            
            if(isset($times)){
                if($times->break_start === $times->break_end){
                    $isBreakStart = "NotNull";
                    $isBreakEnd = null;
                }
                else{
                    $isBreakStart = null;
                    $isBreakEnd = null;
                }
            }
            else{
                $isBreakStart = null;
                $isBreakEnd = null;
            }
        }
        else{
            $isBreakStart = null;
            $isBreakEnd = null;
        }
        
        if(isset($dates->work_start)){
            $isWorkStart = "NotNull";
        }
        else{
            $isWorkStart = null;
        }
        if(isset($dates->work_end)){
            $isWorkEnd = "NotNull";
            $isWorkStart = "NotNull";
        }
        else{
            $isWorkEnd = null;
        }
        
        if(!isset($isWorkStart)){
            $checkAttendance = 1;
        }
        
        if(isset($isWorkStart)){
            if(isset($isBreakStart) && isset($isBreakEnd)){
                $checkAttendance = 2;
            }
            else if(!isset($isBreakStart) && !isset($isBreakEnd)){
                $checkAttendance = 2;
            }
        }
        
        if(isset($isWorkStart) && isset($isBreakStart) && !isset($isBreakEnd)){
            $checkAttendance = 3;
        }
        
        if(isset($isWorkEnd)){
            $checkAttendance = 4;
        }
        
        return($checkAttendance);
    }
}
