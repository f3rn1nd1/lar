<?php

namespace App\Http\Controllers;

use App\Models\JobOffers;
use Illuminate\Http\Request;
use App\Events\CandidateProfileUpdated;
use app\Models\User;

class JobOffersController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $jobs = JobOffers::where("user_rut", auth()->user()->rut)->paginate();
        return view('joboffers.index', compact('jobs'))
            ->with('i', (request()->input('page', 1) - 1) * $jobs->perPage());
    }

    public function create()
    {
        $user = auth()->user();
        $job = new JobOffers();
        
        return view('joboffers.create', compact('job', 'user'));
    }

    public function insert_into_json($id)
    {

        $user = auth()->user();
        $job = JobOffers::find($id)->where("user_rut", auth()->user()->rut)->firstOrFail();
        return view('joboffers.insertjson', compact('job', 'user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validar la solicitud
    $request->validate(JobOffers::$rules);

    // Extraer solo los campos permitidos para JobOffers
    $formData = $request->only(['user_rut', 'puesto', 'empresa', 'descripcion', 'choosen_one']);

     // Convertir las cadenas de habilidades y estudios en arrays
     $skillsArray = explode(',', $request->input('skills', ''));
     $studiesArray = explode(',', $request->input('studies', ''));
     $experienceArray = explode(',', $request->input('experience', ''));
     // Limpieza y procesamiento adicional, si es necesario
     $skillsArray = array_map('trim', $skillsArray);
    $studiesArray = array_map('trim', $studiesArray);
    $experienceArray = array_map('trim', $experienceArray);
 
     // Procesar experiencia, edad y sexo
     $experience = trim($request->input('experience'));
     $age = $request->input('age'); // Asegúrate de que sea un número
     $sex = $request->input('sex'); // Puede ser una entrada directa

    // Crear la estructura JSON de requisitos
    $requirementsJson = [
        'skills' => $skillsArray,
        'studies' => $studiesArray,
        'experience' => $experienceArray,
        'age' => $request->input('age'),
        'sex' => $request->input('sex'),
    ];

        #use requirements_json to create the json and save it in the database
        $jobOffer = new JobOffers($formData);
        $jobOffer->requirements_json = $requirementsJson;

        // Save the model
        $jobOffer->save();
        // Trigger the event
        event(new CandidateProfileUpdated(auth()->user()));
        return redirect()->route('joboffers.index')
            ->with('success', 'Job offer created successfully.');

        //event(new CandidateProfileUpdated(auth()->user()));

        // Redirect to the index page
        //return redirect()->route('joboffers.index')
        //->withErrors($jobOffer)
        //->with('success', 'Job offer created successfully.');
    }
    private function createRequirementsJson(Request $request)
    {
        // Ejemplo de lógica para construir el JSON de requisitos
        // Puedes ajustar esto según las necesidades de tu aplicación
        return [
            'skills' => $this->processSkills($request->input('skills', [])),
            'studies' => $this->processStudies($request->input('studies', [])),
            'experience' => $this->processExperience($request->input('experience', [])),
            'age' => $request->input('age'),
            'sex' => $request->input('sex'),
        ];
    }
    private function processSkills($skills)
    {
        // Procesar y retornar las habilidades
        // Por ejemplo, podrías validar o modificar las habilidades aquí
        return $skills;
    }

    private function processStudies($studies)
    {
        // Procesar y retornar los estudios
        return $studies;
    }

    private function processExperience($experience)
    {
        // Procesar y retornar la experiencia
        return $experience;
    }

    public function show($id)
    {
        $user = auth()->user();
        $jobOffer = JobOffers::find($id)->where("user_rut", auth()->user()->rut)->firstOrFail();
        
        // Si 'requirements_json' es un campo JSON en la base de datos, Laravel lo convertirá automáticamente en un array
        // Pero asegúrate de que el campo exista y esté correctamente formateado en tu base de datos
    
        return view('joboffers.show', compact('jobOffer', 'user'));
    }

    /**
     * Validate the parsed JSON structure for requirements.
     *
     * @param array $requirements
     * @return void
     */
    private function validateParsedRequirements($requirements)
    {
        // Add your validation rules for the parsed requirements structure
        // For example, you can check if the required keys and values are present
        // Customize this validation based on your specific requirements

        // Example validation:
        // Check if 'skills' key is present and is an array
        if (!isset($requirements['skills']) || !is_array($requirements['skills'])) {
            abort(422, 'Invalid requirements structure: Skills are required and must be an array.');
        }

        // Additional validation checks...
    }
}
