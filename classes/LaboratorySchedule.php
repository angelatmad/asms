<?php
require_once __DIR__ . '/Schedule.php';


class LaboratorySchedule extends Schedule
{
    // Protected
    protected $labRoom;
    protected $equipment;

    // Private
    private $safetyChecked;

    public function __construct($subjectCode, $subjectName, $dayOfWeek, $startTime, $endTime, $instructor, $labRoom, $equipment, $safetyChecked)
    {
        parent::__construct($subjectCode, $subjectName, $dayOfWeek, $startTime, $endTime, $instructor);

        $this->labRoom = $labRoom;
        $this->equipment = $equipment;
        $this->safetyChecked = $safetyChecked;
        $this->type = 'laboratory';
    }

    public function getLabRoom()    { return $this->labRoom; }
    public function getEquipment()  { return $this->equipment; }
    public function isSafetyChecked() { return $this->safetyChecked; }

    //OVERRIDE #1: getCategory()
    public function getCategory()
    {
        return 'Laboratory Session';
    }

    //OVERRIDE #2: getDuration() 
     public function getDuration()
    {
        return parent::getDuration() + 30; 
    }

    //OVERRIDE #3: displaySummary() 
     public function displaySummary()
    {
        return "{$this->getSubjectCode()} - {$this->getSubjectName()} | LAB {$this->getDayOfWeek()} {$this->getStartTime()}-{$this->getEndTime()} | {$this->labRoom}";
    }
}
