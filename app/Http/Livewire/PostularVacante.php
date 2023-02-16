<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        // if($this->vacante->candidatos()->where('user_id', auth()->user()->id)->count() > 0) {
        //     session()->flash('error', 'Ya postulaste a esta vacante anteriormente');

        // Almacenar cv
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        // Crear candidato
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],

        ]);

        // Notificar

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        // Return
        session()->flash('mensaje', 'Te postulaste con éxito! Mucha Suerte');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
