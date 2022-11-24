<?php

namespace App\Observers;

use App\Models\Facture;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class FactureActionObserver
{
    public function created(Facture $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Facture'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
