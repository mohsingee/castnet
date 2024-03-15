<?php
use App\Models\Setting;
use App\Models\SocialLinks;
use App\Models\CommonEventSection;
use App\Models\JoinWidget;

function appSetting(){
  return Setting::first();
}
function socialLinks(){
  return SocialLinks::first();
}
function joinWidget(){
    return JoinWidget::first();
}

function eventWidget(){
    return CommonEventSection::first();
}
