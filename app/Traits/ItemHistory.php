<?php

namespace App\Traits;

use App\Models\History;
use Illuminate\Support\Carbon;

trait ItemHistory
{
    public function setHistory()
    {
        if ($this->user) {

            $history = $this->user->histories()
                ->where('item_id', $this->item)
                ->where('session_id', $this->session_id)
                ->first();

            if ($history) {
                // Verificar si la historia es menor de una hora
                $createdAt = Carbon::parse($history->created_at);
                if ($createdAt->diffInMinutes(Carbon::now()) <= 60) {
                    // Si es menor de una hora, actualiza el quantity
                    $history->increment('quantity');
                } else {
                    // Si tiene más de una hora, crea un nuevo registro
                    $this->user->histories()->create([
                        'item_id' => $this->item,
                        'session_id' => $this->session_id,
                        'quantity' => 1
                    ]);
                }
            } else {
                // Si no existe el historial, crea uno nuevo
                $this->user->histories()->create([
                    'item_id' => $this->item,
                    'session_id' => $this->session_id,
                    'quantity' => 1
                ]);
            }

        } else {
            $history = History::query()
                ->whereNull('user_id')
                ->where('item_id', $this->item)
                ->where('session_id', $this->session_id)
                ->first();

            if ($history) {
                // Verificar si la historia es menor de una hora
                $createdAt = Carbon::parse($history->created_at);
                if ($createdAt->diffInMinutes(Carbon::now()) <= 60) {
                    // Si es menor de una hora, actualiza el quantity
                    $history->increment('quantity');
                } else {
                    // Si tiene más de una hora, crea un nuevo registro
                    History::create([
                        'item_id' => $this->item,
                        'session_id' => $this->session_id,
                        'quantity' => 1
                    ]);
                }
            } else {
                // Si no existe el historial, crea uno nuevo
                History::create([
                    'item_id' => $this->item,
                    'session_id' => $this->session_id,
                    'quantity' => 1
                ]);
            }
        }
    }
}