<?php

namespace App\Services;

use App\Models\UserPoint; // Adjust according to your model name
use Illuminate\Support\Facades\Auth;

class UserPointsService
{
    public function addPoints($mealType)
    {
        $user = Auth::user();
        $points = 0;

        switch ($mealType) {
            case 'meal_and_drink':
                $points = 5;
                break;
            case 'meal_or_snack':
                $points = 3;
                break;
            case 'drink':
                $points = 1;
                break;
            default:
                throw new \Exception('Invalid meal type.');
        }

        // Save points to the database
        return $this->updateUserPoints($user->id, $points);
    }

    private function updateUserPoints($userId, $points)
    {
        $userPoints = UserPoint::firstOrCreate(['user_id' => $userId]);
        $userPoints->points += $points;
        $userPoints->save();

        return $userPoints;
    }
}
