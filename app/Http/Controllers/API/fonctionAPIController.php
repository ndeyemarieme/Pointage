<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatefonctionAPIRequest;
use App\Http\Requests\API\UpdatefonctionAPIRequest;
use App\Models\fonction;
use App\Repositories\fonctionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class fonctionController
 * @package App\Http\Controllers\API
 */

class fonctionAPIController extends AppBaseController
{
    /** @var  fonctionRepository */
    private $fonctionRepository;

    public function __construct(fonctionRepository $fonctionRepo)
    {
        $this->fonctionRepository = $fonctionRepo;
    }

    /**
     * Display a listing of the fonction.
     * GET|HEAD /fonctions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fonctionRepository->pushCriteria(new RequestCriteria($request));
        $this->fonctionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $fonctions = $this->fonctionRepository->all();

        return $this->sendResponse($fonctions->toArray(), 'Fonctions retrieved successfully');
    }

    /**
     * Store a newly created fonction in storage.
     * POST /fonctions
     *
     * @param CreatefonctionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatefonctionAPIRequest $request)
    {
        $input = $request->all();

        $fonctions = $this->fonctionRepository->create($input);

        return $this->sendResponse($fonctions->toArray(), 'Fonction saved successfully');
    }

    /**
     * Display the specified fonction.
     * GET|HEAD /fonctions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var fonction $fonction */
        $fonction = $this->fonctionRepository->findWithoutFail($id);

        if (empty($fonction)) {
            return $this->sendError('Fonction not found');
        }

        return $this->sendResponse($fonction->toArray(), 'Fonction retrieved successfully');
    }

    /**
     * Update the specified fonction in storage.
     * PUT/PATCH /fonctions/{id}
     *
     * @param  int $id
     * @param UpdatefonctionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefonctionAPIRequest $request)
    {
        $input = $request->all();

        /** @var fonction $fonction */
        $fonction = $this->fonctionRepository->findWithoutFail($id);

        if (empty($fonction)) {
            return $this->sendError('Fonction not found');
        }

        $fonction = $this->fonctionRepository->update($input, $id);

        return $this->sendResponse($fonction->toArray(), 'fonction updated successfully');
    }

    /**
     * Remove the specified fonction from storage.
     * DELETE /fonctions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var fonction $fonction */
        $fonction = $this->fonctionRepository->findWithoutFail($id);

        if (empty($fonction)) {
            return $this->sendError('Fonction not found');
        }

        $fonction->delete();

        return $this->sendResponse($id, 'Fonction deleted successfully');
    }
}
