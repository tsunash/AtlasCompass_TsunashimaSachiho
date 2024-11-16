<?php
namespace App\Calendars\Admin;

use Carbon\Carbon;
use App\Models\Calendars\ReserveSettings;
use App\Models\Users\User;

class CalendarWeekDay{
  protected $carbon;

  function __construct($date){
    $this->carbon = new Carbon($date);
  }

  function getClassName(){
    return "day-" . strtolower($this->carbon->format("D"));
  }

  function render(){
    return '<p class="day">' . $this->carbon->format("j") . '日</p>';
  }

  function everyDay(){
    return $this->carbon->format("Y-m-d");
  }

  function dayPartCounts($ymd){
    $html = [];
    $one_part = ReserveSettings::with('users')->where('setting_reserve', $ymd)->where('setting_part', '1')->first();
    if($one_part){
      $one_part_count = $one_part->users()->count();
    }else{
      $one_part_count = 0;
    }

    $two_part = ReserveSettings::with('users')->where('setting_reserve', $ymd)->where('setting_part', '2')->first();
    if($two_part){
      $two_part_count = $two_part->users()->count();
    }else{
      $two_part_count = 0;
    }

    $three_part = ReserveSettings::with('users')->where('setting_reserve', $ymd)->where('setting_part', '3')->first();
    if($three_part){
      $three_part_count = $three_part->users()->count();
    }else{
      $three_part_count = 0;
    }

    $html[] = '<div class="text-left">';
    // if($one_part){
    $one_part_url= route('calendar.admin.detail',['date'=>$ymd , 'part'=>1]);
      $html[] = '<p class="day_part m-0 pt-1"><a href="'.$one_part_url.'">1部</a></p>';
      $html[] = '<p class="day_part m-0 pt-1">'.$one_part_count.'</p>';
    // }
    // if($two_part){
      $two_part_url= route('calendar.admin.detail',['date'=>$ymd , 'part'=>2]);
      $html[] = '<p class="day_part m-0 pt-1"><a href="'.$two_part_url.'">2部</a></p>';
      $html[] = '<p class="day_part m-0 pt-1">'.$two_part_count.'</p>';
    // }
    // if($three_part){
      $three_part_url= route('calendar.admin.detail',['date'=>$ymd , 'part'=>3]);
      $html[] = '<p class="day_part m-0 pt-1"><a href="'.$three_part_url.'">3部</a></p>';
      $html[] = '<p class="day_part m-0 pt-1">'.$three_part_count.'</p>';
    // }
    $html[] = '</div>';

    return implode("", $html);
  }


  function onePartFrame($day){
    $one_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '1')->first();
    if($one_part_frame){
      $one_part_frame =  ReserveSettings::where('setting_reserve', $day)->where('setting_part', '1')->first()->limit_users;
    }else{
      $one_part_frame = "20";
    }
    return $one_part_frame;
  }
  function twoPartFrame($day){
    $two_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '2')->first();
    if($two_part_frame){
      $two_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '2')->first()->limit_users;
    }else{
      $two_part_frame = "20";
    }
    return $two_part_frame;
  }
  function threePartFrame($day){
    $three_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '3')->first();
    if($three_part_frame){
      $three_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '3')->first()->limit_users;
    }else{
      $three_part_frame = "20";
    }
    return $three_part_frame;
  }

  //
  function dayNumberAdjustment(){
    $html = [];
    $html[] = '<div class="adjust-area">';
    $html[] = '<p class="d-flex m-0 p-0">1部<input class="w-25" style="height:20px;" name="1" type="text" form="reserveSetting"></p>';
    $html[] = '<p class="d-flex m-0 p-0">2部<input class="w-25" style="height:20px;" name="2" type="text" form="reserveSetting"></p>';
    $html[] = '<p class="d-flex m-0 p-0">3部<input class="w-25" style="height:20px;" name="3" type="text" form="reserveSetting"></p>';
    $html[] = '</div>';
    return implode('', $html);
  }
}
