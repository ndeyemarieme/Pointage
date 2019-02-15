<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatefonctionRequest;
use App\Http\Requests\UpdatefonctionRequest;
use App\Repositories\fonctionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class fonctionController extends AppBaseController
{
    /** @var  fonctionRepository */
    private $fonctionRepository;

    public function __construct(fonctionRepository $fonctionRepo)
    {
        $this->fonctionRepository = $fonctionRepo;
    }

    /**
     * Display a listing of the fonction.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fonctionRepository->pushCriteria(new RequestCriteria($request));
        $fonctions = $this->fonctionRepository->all();

        return view('fonctions.index')
            ->with('fonctions', $fonctions);
    }

    /**
     * Show the form for creating a new fonction.
     *
     * @return Response
     */
    public function create()
    {
        return view('fonctions.create');
    }

    /**
     * Store a newly created fonction in storage.
     *
     * @param CreatefonctionRequest $request
     *
     * @return Response
     */
    public function store(CreatefonctionRequest $request)
    {
        $input = $request->all();

        $fonction = $this->fonctionRepository->create($input);

        Flash::success('Fonction saved successfully.');

        return redirect(route('fonctions.index'));
    }

    /**
     * Display the specified fonction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fonction = $this->fonctionRepository->findWithoutFail($id);

        if (empty($fonction)) {
            Flash::error('Fonction not found');

            return redirect(route('fonctions.index'));
        }

        return view('fonctions.show')->with('fonction', $fonction);
    }

    /**
     * Show the form for editing the specified fonction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fonction = $this->fonctionRepository->findWithoutFail($id);

        if (empty($fonction)) {
            Flash::error('Fonction not found');

            return redirect(route('fonctions.index'));
        }

        return view('fonctions.edit')->with('fonction', $fonction);
    }

    /**
     * Update the specified fonction in storage.
     *
     * @param  int              $id
     * @param UpdatefonctionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefonctionRequest $request)
    {
        $fonction = $this->fonctionRepository->findWithoutFail($id);

        if (empty($fonction)) {
            Flash::error('Fonction not found');

            return redirect(route('fonctions.index'));
        }

        $fonction = $this->fonctionRepository->update($request->all(), $id);

        Flash::success('Fonction updated successfully.');

        return redirect(route('fonctions.index'));
    }

    /**
     * Remove the specified fonction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fonction = $this->fonctionRepository->findWithoutFail($id);

        if (empty($fonction)) {
            Flash::error('Fonction not found');

            return redirect(route('fonctions.index'));
        }

        $this->fonctionRepository->delete($id);

        Flash::success('Fonction deleted successfully.');

        return redirect(route('fonctions.index'));
    }
}
