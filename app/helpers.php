<?php

if (! function_exists('getCurrentTime')) {
    /**
     * Get current time.
     */
    function getCurrentTime() {
        return (new \DateTime())->format("Y-m-d h:i:s");
    }
}


if (! function_exists('getTaskStatus')) {
    /**
     * Get status of a task.
     * @param \App\Models\Task $task
     * @return string
     */
    function getTaskStatus(\App\Models\Task $task) {
        if ($task->end_time < getCurrentTime()) {
            return array_search(config('status.Completed'), config('status'));
        }

        return array_search($task->status, config('status'));
    }
}

if (! function_exists('getStatusNameFromTaskStatus')) {
    /**
     * Get status of a task.
     * @param \App\Models\Task $task
     * @return string
     */
    function getStatusNameFromTaskStatus($status) {
        return array_search(status, config('status'));
    }
}
