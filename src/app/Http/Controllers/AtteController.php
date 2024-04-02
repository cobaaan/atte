<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Date;
use App\Models\Time;

use Auth;

use Carbon\Carbon;

class AtteController extends Controller
{
    public function login(){
        return view('auth/login');
    }
    
    public function register(){
        return view('auth/register');
    }
    
    public function date(Request $request){
        if($request->date == null) {
            $dt = Carbon::now();
        }
        $dt = Carbon::now();
        /*
        else {
            if($request->num < 0){
                $dt = Carbon::now();
                $dt = $dt->subDays()->format('Y-m-d');
            }
            else if($request->num > 0){
                $dt = Carbon::now();
                $dt = $dt->addDays()->format('Y-m-d');
            }
        }
        */
        return view('date', compact('dt'));
    }
    
    public function subDate(Request $request) {
        $dt = Carbon::createFromTimeString($request->dt);
        $dt = $dt->subDays();
        
        return view('date', compact('dt'));
    }
    
    public function addDate(Request $request) {
        $dt = Carbon::createFromTimeString($request->dt);
        $dates = Date::all();
        
        $dt = $dt->addDays();
        
        $param = $this->searchDate($dt);
        
        
        return view('date', compact('dt', 'param', 'dates'));
    }
    
    
    private function searchDate($dt) {
        $users = User::all();
        /*
        $dates = Date::whereDate('work_start', $dt->format('Y-m-d'))->where('user_id', 1)->get();
        $datesWorkStart = Carbon::createFromTimeString($dates[0]['work_start']);
        dd($dates[0]['work_start']);
        */
        for($i = 0; $i < count($users); $i++){
            $dates[$i] = Date::whereDate('work_start', $dt->format('Y-m-d'))->where('user_id', ($i + 1))->get();
            $datesWorkStart = Carbon::createFromTimeString($dates[0]['work_start']);
            dd($dates[0]['work_start']);
            //$datesWorkStart[$i] = Carbon::createFromTimeString($dates[1]['work_start']);
            /*
            $param[$i] = [
                'name' => $users[$i]['name'],
                'dates' => $dates[$i]['work_start'],
            ];
            */
        }
        dd($dates);
        
        
        
        $dates = Date::whereDate('work_start', $dt->format('Y-m-d'))->where('user_id', 1)->get();
        $datesWorkStart = Carbon::createFromTimeString($dates[0]['work_start']);
        $datesWorkEnd = Carbon::createFromTimeString($dates[0]['work_end']);
        //$datesWorkTime = date_diff($datesWorkStart, $datesWorkEnd);
        
        $datesWorkTime = $datesWorkStart->diffInSeconds($datesWorkEnd);
        $hours = floor($datesWorkTime / 3600);
        $hour = sprintf("%02d",$hours);
        $minutes = floor(($datesWorkTime % 3600) / 60);
        $minute = sprintf("%02d",$minutes);
        $seconds = $datesWorkTime % 60;
        $second = sprintf("%02d",$seconds);
        
        //$times = Time::whereDate('break_start', $dt->format('Y-m-d'))->where('user_id', 1)->get();
        
        //DD($times);
        $param = [
            'name' => $users[0]['name'],
            'work_start' => $datesWorkStart->format('H:i:s'),
            'work_end' => $datesWorkEnd->format('H:i:s'),
            'work_hours' => $hour,
            'work_minutes' => $minute,
            'work_seconds' => $second,
            //'work_time' => $datesWorkTime->format('H:i:s'),
        ];
        //DD($param);
        return($param);
    }
    
    
    
    public function stamp(){
        $auths = Auth::user();
        $dt = Carbon::now();
        
        $isCreated = $this->checkWork();
        
        return view('stamp', compact('auths', 'isCreated'));
    }
    
    public function workStart() {
        $auths = Auth::user();
        $dt = Carbon::now();
        //$isCreated = $this->checkWork();
        $param = [
            'user_id' => $auths->id,
            'work_start' => $dt,
        ];
        Date::create($param);
        
        return view('stamp', compact('auths'));
    }
    
    public function workEnd() {
        $auths = Auth::user();
        $dt = Carbon::now();
        //$isCreated = $this->checkWork();
        Date::where('user_id', $auths->id)->latest()->first()->update([
            'work_end' => $dt,
        ]);
        
        return view('stamp', compact('auths'));
    }
    
    public function breakStart(){
        $auths = Auth::user();
        $dt = Carbon::now();
        $param = [
            'user_id' => $auths->id,
            'break_start' => $dt,
        ];
        Time::create($param);
        
        return view('stamp', compact('auths'));
    }
    
    public function breakEnd() {
        $auths = Auth::user();
        $dt = Carbon::now();
        //$isCreated = $this->checkWork();
        Time::where('user_id', $auths->id)->latest()->first()->update([
            'break_end' => $dt,
        ]);
        
        return view('stamp', compact('auths'));
    }
    
    
    
    private function checkWork(){
        $auths = Auth::user();
        $dt = Carbon::now();
        
        $isCreated = Date::whereDate('created_at', $dt->format('Y-m-d'))->where('user_id', $auths->id)->get();
        
        return($isCreated);
    }
}
