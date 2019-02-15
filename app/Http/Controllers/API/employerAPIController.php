<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateemployerAPIRequest;
use App\Http\Requests\API\UpdateemployerAPIRequest;
use App\Models\employer;
use App\Repositories\employerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class employerController
 * @package App\Http\Controllers\API
 */

class employerAPIController extends AppBaseController
{
    /** @var  employerRepository */
    private $employerRepository;

    public function __construct(employerRepository $employerRepo)
    {
        $this->employerRepository = $employerRepo;
    }

    /**
     * Display a listing of the employer.
     * GET|HEAD /employers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->employerRepository->pushCriteria(new RequestCriteria($request));
        $this->employerRepository->pushCriteria(new LimitOffsetCriteria($request));
        $employers = $this->employerRepository->all();

        return $this->sendResponse($employers->toArray(), 'Employers retrieved successfully');
    }

    /**
     * Store a newly created employer in storage.
     * POST /employers
     *
     * @param CreateemployerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateemployerAPIRequest $request)
    {
        $input = $request->all();

        $employers = $this->employerRepository->create($input);

        return $this->sendResponse($employers->toArray(), 'Employer saved successfully');
    }

    /**
     * Display the specified employer.
     * GET|HEAD /employers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var employer $employer */
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            return $this->sendError('Employer not found');
        }

        return $this->sendResponse($employer->toArray(), 'Employer retrieved successfully');
    }

    /**
     * Update the specified employer in storage.
     * PUT/PATCH /employers/{id}
     *
     * @param  int $id
     * @param UpdateemployerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateemployerAPIRequest $request)
    {
        $input = $request->all();

        /** @var employer $employer */
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            return $this->sendError('Employer not found');
        }

        $employer = $this->employerRepository->update($input, $id);

        return $this->sendResponse($employer->toArray(), 'employer updated successfully');
    }

    /**
     * Remove the specified employer from storage.
     * DELETE /employers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var employer $employer */
        $employer = $this->employerRepository->findWithoutFail($id);

        if (empty($employer)) {
            return $this->sendError('Employer not found');
        }

        $employer->delete();

        return $this->sendResponse($id, 'Employer deleted successfully');
    }
}
