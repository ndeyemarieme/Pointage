<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateutilisateurRequest;
use App\Http\Requests\UpdateutilisateurRequest;
use App\Repositories\utilisateurRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class utilisateurController extends AppBaseController
{
    /** @var  utilisateurRepository */
    private $utilisateurRepository;

    public function __construct(utilisateurRepository $utilisateurRepo)
    {
        $this->utilisateurRepository = $utilisateurRepo;
    }

    /**
     * Display a listing of the utilisateur.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->utilisateurRepository->pushCriteria(new RequestCriteria($request));
        $utilisateurs = $this->utilisateurRepository->all();

        return view('utilisateurs.index')
            ->with('utilisateurs', $utilisateurs);
    }

    /**
     * Show the form for creating a new utilisateur.
     *
     * @return Response
     */
    public function create()
    {
        return view('utilisateurs.create');
    }

    /**
     * Store a newly created utilisateur in storage.
     *
     * @param CreateutilisateurRequest $request
     *
     * @return Response
     */
    public function store(CreateutilisateurRequest $request)
    {
        $input = $request->all();

        $utilisateur = $this->utilisateurRepository->create($input);

        Flash::success('Utilisateur saved successfully.');

        return redirect(route('utilisateurs.index'));
    }

    /**
     * Display the specified utilisateur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $utilisateur = $this->utilisateurRepository->findWithoutFail($id);

        if (empty($utilisateur)) {
            Flash::error('Utilisateur not found');

            return redirect(route('utilisateurs.index'));
        }

        return view('utilisateurs.show')->with('utilisateur', $utilisateur);
    }

    /**
     * Show the form for editing the specified utilisateur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $utilisateur = $this->utilisateurRepository->findWithoutFail($id);

        if (empty($utilisateur)) {
            Flash::error('Utilisateur not found');

            return redirect(route('utilisateurs.index'));
        }

        return view('utilisateurs.edit')->with('utilisateur', $utilisateur);
    }

    /**
     * Update the specified utilisateur in storage.
     *
     * @param  int              $id
     * @param UpdateutilisateurRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateutilisateurRequest $request)
    {
        $utilisateur = $this->utilisateurRepository->findWithoutFail($id);

        if (empty($utilisateur)) {
            Flash::error('Utilisateur not found');

            return redirect(route('utilisateurs.index'));
        }

        $utilisateur = $this->utilisateurRepository->update($request->all(), $id);

        Flash::success('Utilisateur updated successfully.');

        return redirect(route('utilisateurs.index'));
    }

    /**
     * Remove the specified utilisateur from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $utilisateur = $this->utilisateurRepository->findWithoutFail($id);

        if (empty($utilisateur)) {
            Flash::error('Utilisateur not found');

            return redirect(route('utilisateurs.index'));
        }

        $this->utilisateurRepository->delete($id);

        Flash::success('Utilisateur deleted successfully.');

        return redirect(route('utilisateurs.index'));
    }
}
