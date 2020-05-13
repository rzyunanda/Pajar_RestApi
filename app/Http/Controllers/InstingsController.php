<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInstingsRequest;
use App\Http\Requests\UpdateInstingsRequest;
use App\Repositories\InstingsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class InstingsController extends Controller
{
    /** @var  InstingsRepository */
    private $instingsRepository;

    public function __construct(InstingsRepository $instingsRepo)
    {
        $this->instingsRepository = $instingsRepo;
    }

    /**
     * Display a listing of the Instings.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $instings = $this->instingsRepository->all();

        return view('instings.index')
            ->with('instings', $instings);
    }

    /**
     * Show the form for creating a new Instings.
     *
     * @return Response
     */
    public function create()
    {
        return view('instings.create');
    }

    /**
     * Store a newly created Instings in storage.
     *
     * @param CreateInstingsRequest $request
     *
     * @return Response
     */
    public function store(CreateInstingsRequest $request)
    {
        $input = $request->all();

        $instings = $this->instingsRepository->create($input);

        Flash::success('Instings saved successfully.');

        return redirect(route('instings.index'));
    }

    /**
     * Display the specified Instings.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $instings = $this->instingsRepository->find($id);

        if (empty($instings)) {
            Flash::error('Instings not found');

            return redirect(route('instings.index'));
        }

        return view('instings.show')->with('instings', $instings);
    }

    /**
     * Show the form for editing the specified Instings.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $instings = $this->instingsRepository->find($id);

        if (empty($instings)) {
            Flash::error('Instings not found');

            return redirect(route('instings.index'));
        }

        return view('instings.edit')->with('instings', $instings);
    }

    /**
     * Update the specified Instings in storage.
     *
     * @param int $id
     * @param UpdateInstingsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInstingsRequest $request)
    {
        $instings = $this->instingsRepository->find($id);

        if (empty($instings)) {
            Flash::error('Instings not found');

            return redirect(route('instings.index'));
        }

        $instings = $this->instingsRepository->update($request->all(), $id);

        Flash::success('Instings updated successfully.');

        return redirect(route('instings.index'));
    }

    /**
     * Remove the specified Instings from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $instings = $this->instingsRepository->find($id);

        if (empty($instings)) {
            Flash::error('Instings not found');

            return redirect(route('instings.index'));
        }

        $this->instingsRepository->delete($id);

        Flash::success('Instings deleted successfully.');

        return redirect(route('instings.index'));
    }
}
