<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Date extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'date', 'work_start', 'work_end'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function getDate($user_id){
        $dates = DB::table("dates")
        ->where('user_id', $user_id)
        ->get();
        
        return($dates->date);
    }
    
    public function getUserId(){
        $times = DB::table('times')
        ->where('date_id', $this->id)
        ->select('date_id')
        ->selectRaw('SEC_TO_TIME(SUM(TIME_TO_SEC(break_end)) - SUM(TIME_TO_SEC(break_start))) AS break_time')
        ->groupBy('date_id')
        ->get();
        
        $breakTimes = DB::table('times')
        ->where('date_id', $this->id)
        ->pluck(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(break_end)) - SUM(TIME_TO_SEC(break_start))) AS break_time'))
        ->first();
        
        return $breakTimes;
    }
    
    public function getUserName(){
        $users = User::select('name')->get();
        $id = $this->user_id;
        $userName = $users[$id - 1]->name;
        
        return $userName;
    }
    
    public function getWorkStart(){
        return $this->work_start;
    }
    
    public function getWorkEnd(){
        return $this->work_end;
    }
    
    public function getWorkHour(){
        if(isset($this->work_end)){
            $datesWorkStart = Carbon::createFromTimeString($this->work_start);
            $datesWorkEnd = Carbon::createFromTimeString($this->work_end);
            $datesWorkTime = $datesWorkStart->diffInSeconds($datesWorkEnd);
            $hours = floor($datesWorkTime / 3600);
            $hour = sprintf("%02d",$hours);
        }
        else {
            $hour = '-- ';
        }
        
        return $hour;
    }
    public function getWorkMinute(){
        if(isset($this->work_end)){
            $datesWorkStart = Carbon::createFromTimeString($this->work_start);
            $datesWorkEnd = Carbon::createFromTimeString($this->work_end);
            $datesWorkTime = $datesWorkStart->diffInSeconds($datesWorkEnd);
            $minutes = floor(($datesWorkTime % 3600) / 60);
            $minute = sprintf("%02d",$minutes);
        }
        else {
            $minute = ' -- ';
        }
        
        return $minute;
    }
    public function getWorkSecond(){
        if(isset($this->work_end)){
            $datesWorkStart = Carbon::createFromTimeString($this->work_start);
            $datesWorkEnd = Carbon::createFromTimeString($this->work_end);
            $datesWorkTime = $datesWorkStart->diffInSeconds($datesWorkEnd);
            $seconds = $datesWorkTime % 60;
            $second = sprintf("%02d",$seconds);
        }
        else {
            $second = ' --';
        }
        
        return $second;
    }
}
