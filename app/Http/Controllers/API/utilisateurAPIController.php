<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateutilisateurAPIRequest;
use App\Http\Requests\API\UpdateutilisateurAPIRequest;
use App\Models\utilisateur;
use App\Repositories\utilisateurRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class utilisateurController
 * @package App\Http\Controllers\API
 */

class utilisateurAPIController extends AppBaseController
{
    /** @var  utilisateurRepository */
    private $utilisateurRepository;

    public function __construct(utilisateurRepository $utilisateurRepo)
    {
        $this->utilisateurRepository = $utilisateurRepo;
    }

    /**
     * Display a listing of the utilisateur.
     * GET|HEAD /utilisateurs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->utilisateurRepository->pushCriteria(new RequestCriteria($request));
        $this->utilisateurRepository->pushCriteria(new LimitOffsetCriteria($request));
        $utilisateurs = $this->utilisateurRepository->all();

        return $this->sendResponse($utilisateurs->toArray(), 'Utilisateurs retrieved successfully');
    }

    /**
     * Store a newly created utilisateur in storage.
     * POST /utilisateurs
     *
     * @param CreateutilisateurAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateutilisateurAPIRequest $request)
    {
        $input = $request->all();

        $utilisateurs = $this->utilisateurRepository->create($input);

        return $this->sendResponse($utilisateurs->toArray(), 'Utilisateur saved successfully');
    }

    /**
     * Display the specified utilisateur.
     * GET|HEAD /utilisateurs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var utilisateur $utilisateur */
        $utilisateur = $this->utilisateurRepository->findWithoutFail($id);

        if (empty($utilisateur)) {
            return $this->sendError('Utilisateur not found');
        }

        return $this->sendResponse($utilisateur->toArray(), 'Utilisateur retrieved successfully');
    }

    /**
     * Update the specified utilisateur in storage.
     * PUT/PATCH /utilisateurs/{id}
     *
     * @param  int $id
     * @param UpdateutilisateurAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateutilisateurAPIRequest $request)
    {
        $input = $request->all();

        /** @var utilisateur $utilisateur */
        $utilisateur = $this->utilisateurRepository->findWithoutFail($id);

        if (empty($utilisateur)) {
            return $this->sendError('Utilisateur not found');
        }

        $utilisateur = $this->utilisateurRepository->update($input, $id);

        return $this->sendResponse($utilisateur->toArray(), 'utilisateur updated successfully');
    }

    /**
     * Remove the specified utilisateur from storage.
     * DELETE /utilisateurs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var utilisateur $utilisateur */
        $utilisateur = $this->utilisateurRepository->findWithoutFail($id);

        if (empty($utilisateur)) {
            return $this->sendError('Utilisateur not found');
        }

        $utilisateur->delete();

        return $this->sendResponse($id, 'Utilisateur deleted successfully');
    }
}
