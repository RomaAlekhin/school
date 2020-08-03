<?php

namespace App\Jobs;

use App\Models\Group;
use App\Models\Lesson;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateLessons implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $schedules = $this->getAllSchedules();
        $days = $this->getWeekDays();

        if (empty($schedules) || empty($days)) return false;

        $this->createLessons($schedules, $days);
    }

    /**
     * Create lessons for a week
     * @param Array $schedules - all schedules with group_id, day and time
     * @param Array $days - list of week days with day like key and date(without time)
     */
    private function createLessons($schedules = [], $days = [])
    {
        foreach ($schedules as $schedule) {
            $group_id = $schedule['group_id'];
            $day = $schedule['day'];
            $time = $schedule['time'];

            $date = $days[$day];

            $dateTime = (new DateTime("$date $time"))->format('Y-m-d H:i');

            Lesson::updateOrInsert([
                'group_id' => $group_id,
                'date' => $dateTime,
            ]);
        }
    }

    /**
     * @return Array
     */
    private function getAllSchedules()
    {
        $groups = Group::all();
        if (!$groups) return [];

        $result = [];
        foreach ($groups as $group) {
            $schedules = $group->schedules;
            if (!$schedules) continue;

            foreach ($schedules as $schedule) {
                $result[] = [
                    'group_id' => $schedule->group_id,
                    'day' => $schedule->day,
                    'time' => $schedule->time,
                ];
            }
        }

        return $result;
    }

    /**
     * @return Array
     */
    private function getWeekDays()
    {
        $begin = new DateTime();

        $end = new DateTime();
        $end = $end->modify('+7 day');

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval, $end);

        $days = [];
        foreach ($daterange as $date) {
            $day = $date->format("w");
            $days[$day] = $date->format("Y-m-d");
        }

        return $days;
    }
}
