<?php

namespace App\Listeners;

use App\Events\CandidateProfileUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Study;
use App\Models\User;

class UpdateCandidateScore
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CandidateProfileUpdated  $event
     * @return void
     */
    public function handle(CandidateProfileUpdated $event)
    {
        $user = $event->user;
        $user->loadCount(['skills', 'experiences', 'studies']);

        // Si usas increment, no necesitas calcular el total de antemano,
        // simplemente incrementas por cada evento. Esto es más efectivo si tu evento
        // se dispara para cada adición individualmente.

        // Actualiza la puntuación del candidato de manera atómica.
        // Suponiendo que la puntuación inicial es cero o está correctamente establecida.
        $user->increment('score', $user->skills_count * 10);
        $user->increment('score', $user->experiences_count * 10);
        $user->increment('score', $user->studies_count * 10);
    }
}
