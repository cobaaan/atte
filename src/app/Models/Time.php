<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Time extends Model
{
    use HasFactory;
    
    protected $fillable = ['date_id', 'break_start', 'break_end'];
    
    public function user(){
        return $this->belongsTo(Date::class);
    }
    
    public function getBreakTime(){
        if(isset($this->break_end)){
            $datesBreakStart = Carbon::createFromTimeString($this->break_start);
            $datesBreakEnd = Carbon::createFromTimeString($this->break_end);
            $datesBreakTime = $datesBreakStart->diffInSeconds($datesBreakEnd);
            $ddd = $datesBreakTime;
            $result = gmdate("H:i:s", $ddd) ;
            dd($result);
            $hours = floor($datesBreakTime / 3600);
            $hour = sprintf("%02d",$hours);
        }
        else {
            $hour = 0;
        }
        
        return $hour;
    }
    
    public function getBreakHour(){
        if(isset($this->break_end)){
            $datesBreakStart = Carbon::createFromTimeString($this->break_start);
            $datesBreakEnd = Carbon::createFromTimeString($this->break_end);
            $datesBreakTime = $datesBreakStart->diffInSeconds($datesBreakEnd);
            $hours = floor($datesBreakTime / 3600);
            $hour = sprintf("%02d",$hours);
        }
        else {
            $hour = 0;
        }
        
        return $hour;
    }
    public function getBreakMinute(){
        if(isset($this->break_end)){
            $datesBreakStart = Carbon::createFromTimeString($this->break_start);
            $datesBreakEnd = Carbon::createFromTimeString($this->break_end);
            $datesBreakTime = $datesBreakStart->diffInSeconds($datesBreakEnd);
            $minutes = floor(($datesBreakTime % 3600) / 60);
            $minute = sprintf("%02d",$minutes);
        }
        else {
            $minute = 0;
        }
        
        return $minute;
    }
    public function getBreakSecond(){
        if(isset($this->break_end)){
            $datesBreakStart = Carbon::createFromTimeString($this->break_start);
            $datesBreakEnd = Carbon::createFromTimeString($this->break_end);
            $datesBreakTime = $datesBreakStart->diffInSeconds($datesBreakEnd);
            $seconds = $datesBreakTime % 60;
            $second = sprintf("%02d",$seconds);
        }
        else {
            $second = 0;
        }
        
        return $second;
    }
}