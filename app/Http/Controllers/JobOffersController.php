<?php
namespace App\Http\Controllers;

use App\Models\JobOffers;
use Illuminate\Http\Request;
use App\Events\CandidateProfileUpdated;

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

        // Extract form input
        $skills = $request->input('skills', []);
        $studies = $request->input('studies', []);
        $experience = $request->input('experience', []);
        $age = $request->input('age', []);
        $sex = $request->input('sex', []);

        // Create JSON structure
        $requirementsJson = [
            'skills' => $skills,
            'studies' => $studies,
            'experience' => $experience,
            'age' => $age,
            'sex' => $sex,
        ];

        // Create the JobOffers model
        $jobOffer = JobOffers::create($request->all());

        // Assign the requirements_json attribute
        $jobOffer->requirements_json = $requirementsJson;

        // Save the model
        $jobOffer->save();

        // Trigger the event
        event(new CandidateProfileUpdated(auth()->user()));

        // Redirect to the index page
        return redirect()->route('joboffers.index')
            ->withErrors ($jobOffer)
            ->with('success', 'Job offer created successfully.');
    }

    // ... other methods ...

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