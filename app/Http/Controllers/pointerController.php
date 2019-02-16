<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepointerRequest;
use App\Http\Requests\UpdatepointerRequest;
use App\Repositories\pointerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\employer;

class pointerController extends AppBaseController
{
    /** @var  pointerRepository */
    private $pointerRepository;

    public function __construct(pointerRepository $pointerRepo)
    {
        $this->pointerRepository = $pointerRepo;
    }

    /**
     * Display a listing of the pointer.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pointerRepository->pushCriteria(new RequestCriteria($request));
        $pointers = $this->pointerRepository->all();

        return view('pointers.index')
            ->with('pointers', $pointers);
    }

    /**
     * Show the form for creating a new pointer.
     *
     * @return Response
     */
    public function create()
    {
        
        $employers = employer::pluck('nom', 'id');
     //   return view('employers.create', compact('fonctions'));
   
        return view('pointers.create',compact('employers'));
    }

    /**
     * Store a newly created pointer in storage.
     *
     * @param CreatepointerRequest $request
     *
     * @return Response
     */
    public function store(CreatepointerRequest $request)
    {
        $input = $request->all();

        $pointer = $this->pointerRepository->create($input);

        Flash::success('Pointer saved successfully.');

        return redirect(route('pointers.index'));
    }

    /**
     * Display the specified pointer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pointer = $this->pointerRepository->findWithoutFail($id);

        if (empty($pointer)) {
            Flash::error('Pointer not found');

            return redirect(route('pointers.index'));
        }

        return view('pointers.show')->with('pointer', $pointer);
    }

    /**
     * Show the form for editing the specified pointer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pointer = $this->pointerRepository->findWithoutFail($id);

        if (empty($pointer)) {
            Flash::error('Pointer not found');

            return redirect(route('pointers.index'));
        }

        return view('pointers.edit')->with('pointer', $pointer);
    }

    /**
     * Update the specified pointer in storage.
     *
     * @param  int              $id
     * @param UpdatepointerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepointerRequest $request)
    {
        $pointer = $this->pointerRepository->findWithoutFail($id);

        if (empty($pointer)) {
            Flash::error('Pointer not found');

            return redirect(route('pointers.index'));
        }

        $pointer = $this->pointerRepository->update($request->all(), $id);

        Flash::success('Pointer updated successfully.');

        return redirect(route('pointers.index'));
    }

    /**
     * Remove the specified pointer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pointer = $this->pointerRepository->findWithoutFail($id);

        if (empty($pointer)) {
            Flash::error('Pointer not found');

            return redirect(route('pointers.index'));
        }

        $this->pointerRepository->delete($id);

        Flash::success('Pointer deleted successfully.');

        return redirect(route('pointers.index'));
    }
}
