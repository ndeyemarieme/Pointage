<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateemployerRequest;
use App\Http\Requests\UpdateemployerRequest;
use App\Repositories\employerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\fonction;

class employerController extends AppBaseController
{
    /** @var  employerRepository */
    private $employerRepository;

    public function __construct(employerRepository $employerRepo)
    {
        $this->employerRepository = $employerRepo;
    }

    /**
     * Display a listing of the employer.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->employerRepository->pushCriteria(new RequestCriteria($request));
        $employers = $this->employerRepository->all();

        return view('employers.index')
            ->with('employers', $employers);
    }

    /**
     * Show the form for creating a new employer.
     *
     * @return Response
     */
    public function create()
    {
        $fonctions = fonction::pluck('libelle', 'id');
        return view('employers.create', compact('fonctions'));
    }

    /**
     * Store a newly created employer in storage.
     *
     * @param CreateemployerRequest $request
     *
     * @return Response
     */
    public function store(CreateemployerRequest $request)
    {
        $input = $request->all();

        $employer = $this->employerRepository->create($input);

        Flash::success('Employer saved successfully.');

        return redirect(route('employers.index'));
    }

    /**
     * Display the specified employer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        return view('employers.show')->with('employer', $employer);
    }

    /**
     * Show the form for editing the specified employer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        return view('employers.edit')->with('employer', $employer);
    }

    /**
     * Update the specified employer in storage.
     *
     * @param  int              $id
     * @param UpdateemployerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateemployerRequest $request)
    {
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        $employer = $this->employerRepository->update($request->all(), $id);

        Flash::success('Employer updated successfully.');

        return redirect(route('employers.index'));
    }

    /**
     * Remove the specified employer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        $this->employerRepository->delete($id);

        Flash::success('Employer deleted successfully.');

        return redirect(route('employers.index'));
    }
}
