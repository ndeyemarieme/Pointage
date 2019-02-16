<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepointerAPIRequest;
use App\Http\Requests\API\UpdatepointerAPIRequest;
use App\Models\pointer;
use App\Repositories\pointerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class pointerController
 * @package App\Http\Controllers\API
 */

class pointerAPIController extends AppBaseController
{
    /** @var  pointerRepository */
    private $pointerRepository;

    public function __construct(pointerRepository $pointerRepo)
    {
        $this->pointerRepository = $pointerRepo;
    }

    /**
     * Display a listing of the pointer.
     * GET|HEAD /pointers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pointerRepository->pushCriteria(new RequestCriteria($request));
        $this->pointerRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pointers = $this->pointerRepository->all();

        return $this->sendResponse($pointers->toArray(), 'Pointers retrieved successfully');
    }

    /**
     * Store a newly created pointer in storage.
     * POST /pointers
     *
     * @param CreatepointerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepointerAPIRequest $request)
    {
        $input = $request->all();

        $pointers = $this->pointerRepository->create($input);

        return $this->sendResponse($pointers->toArray(), 'Pointer saved successfully');
    }

    /**
     * Display the specified pointer.
     * GET|HEAD /pointers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var pointer $pointer */
        $pointer = $this->pointerRepository->findWithoutFail($id);

        if (empty($pointer)) {
            return $this->sendError('Pointer not found');
        }

        return $this->sendResponse($pointer->toArray(), 'Pointer retrieved successfully');
    }

    /**
     * Update the specified pointer in storage.
     * PUT/PATCH /pointers/{id}
     *
     * @param  int $id
     * @param UpdatepointerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepointerAPIRequest $request)
    {
        $input = $request->all();

        /** @var pointer $pointer */
        $pointer = $this->pointerRepository->findWithoutFail($id);

        if (empty($pointer)) {
            return $this->sendError('Pointer not found');
        }

        $pointer = $this->pointerRepository->update($input, $id);

        return $this->sendResponse($pointer->toArray(), 'pointer updated successfully');
    }

    /**
     * Remove the specified pointer from storage.
     * DELETE /pointers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var pointer $pointer */
        $pointer = $this->pointerRepository->findWithoutFail($id);

        if (empty($pointer)) {
            return $this->sendError('Pointer not found');
        }

        $pointer->delete();

        return $this->sendResponse($id, 'Pointer deleted successfully');
    }
}
