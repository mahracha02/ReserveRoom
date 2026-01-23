<?php

namespace App\Enum;

enum EquipmentType: string
{
    case PROJECTOR = 'projector';
    case WHITEBOARD = 'whiteboard';
    case VIDEO_CONFERENCING = 'video_conferencing';
    case COMPUTER = 'computer';
    case CHAIR = 'chair';
    case TABLE = 'table';
    case MICROPHONE = 'microphone';
    case SPEAKERS = 'speakers';
    case CAMERA = 'camera';
    case Printer = 'printer';
    case OTHER = 'other';


}