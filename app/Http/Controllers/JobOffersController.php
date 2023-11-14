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
        return view('joboffers.create', compact('job','user'));
    }

    public function insert_into_json($id)
    {
        
        $user = auth()->user();
        $job = JobOffers::find($id)->where("user_rut", auth()->user()->rut)->firstOrFail();
        return view('joboffers.insertjson', compact('job','user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate(JobOffers::$rules);

        // Create JSON structure with null values
        $requirements_json = [
            'skills' => [],
            'studies' => [],
            'experience' => [],
            'age' => null,
            'sex' => null,
        ];

        #use requirements_json to create the json and save it in the database
        $jobOffer = JobOffers::create($request->all() + ['requirements_json' => $requirements_json]);



        // Save the model
        $jobOffer->save();

        // Trigger the event
        event(new CandidateProfileUpdated(auth()->user()));

        // Redirect to the index page
        return redirect()->route('joboffers.index')
            ->withErrors ($jobOffer)
            ->with('success', 'Job offer created successfully.');
    }

    public function show($id)
    {
        $users = User::all();
        $user = auth()->user();
        $jobOffer = JobOffers::find($id)->where("user_rut", auth()->user()->rut)->firstOrFail();
        return view('joboffers.show', compact('jobOffer','user','users'));
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