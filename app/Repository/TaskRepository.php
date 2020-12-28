<?php
namespace App\Repository;

use App\Models\Task;
use App\Traits\AuthTrait;
use Illuminate\Support\Facades\Auth;

class TaskRepository {
    use AuthTrait;

    public function __construct()
    {
    }

    /**
     * @throws \Exception
     */
    public function getTasksOfCurrentUser() {
        $this->userAuthCheck();

        $userId = Auth::id();
        return Task::where('user_id', $userId)
            ->orderBy('end_time', 'asc')
            ->get();
    }

    public function getTaskCountOfCurrentUser() {
        return count($this->getTasksOfCurrentUser());
    }

    public function getRecentTasksOfCurrentUser($noOfTasks = 5)
    {
        return $this->getTasksOfCurrentUser()->take($noOfTasks);
    }

    public function createTask($task)
    {
        $endTime = (new \DateTime($task['end_time']))->format('Y-m-d h:i:s');
        $userID = Auth::id();
        $task = Task::create([
            'name' => $task['name'],
            'description' => $task['description'],
            'end_time' => $endTime,
            'user_id' => $userID,
        ]);

        if (!$task) {
            throw new \Exception("Failure saving task");
        }

        return $task;
    }

    /**
     * @param $id
     * @return Task
     */
    public function getTaskById($id)
    {
        return Task::findOrFail($id);
    }

    public function deleteTaskById($id)
    {
        return $this->getTaskById($id)->delete();
    }

}
