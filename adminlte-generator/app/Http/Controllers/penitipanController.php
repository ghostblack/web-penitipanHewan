<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepenitipanRequest;
use App\Http\Requests\UpdatepenitipanRequest;
use App\Repositories\penitipanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class penitipanController extends AppBaseController
{
    /** @var  penitipanRepository */
    private $penitipanRepository;

    public function __construct(penitipanRepository $penitipanRepo)
    {
        $this->penitipanRepository = $penitipanRepo;
    }

    /**
     * Display a listing of the penitipan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $penitipans = $this->penitipanRepository->all();

        return view('penitipans.index')
            ->with('penitipans', $penitipans);
    }

    /**
     * Show the form for creating a new penitipan.
     *
     * @return Response
     */
    public function create()
    {
        return view('penitipans.create');
    }

    /**
     * Store a newly created penitipan in storage.
     *
     * @param CreatepenitipanRequest $request
     *
     * @return Response
     */
    public function store(CreatepenitipanRequest $request)
    {
        $input = $request->all();

        $penitipan = $this->penitipanRepository->create($input);

        Flash::success('Penitipan saved successfully.');

        return redirect(route('penitipans.index'));
    }

    /**
     * Display the specified penitipan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penitipan = $this->penitipanRepository->find($id);

        if (empty($penitipan)) {
            Flash::error('Penitipan not found');

            return redirect(route('penitipans.index'));
        }

        return view('penitipans.show')->with('penitipan', $penitipan);
    }

    /**
     * Show the form for editing the specified penitipan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penitipan = $this->penitipanRepository->find($id);

        if (empty($penitipan)) {
            Flash::error('Penitipan not found');

            return redirect(route('penitipans.index'));
        }

        return view('penitipans.edit')->with('penitipan', $penitipan);
    }

    /**
     * Update the specified penitipan in storage.
     *
     * @param int $id
     * @param UpdatepenitipanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepenitipanRequest $request)
    {
        $penitipan = $this->penitipanRepository->find($id);

        if (empty($penitipan)) {
            Flash::error('Penitipan not found');

            return redirect(route('penitipans.index'));
        }

        $penitipan = $this->penitipanRepository->update($request->all(), $id);

        Flash::success('Penitipan updated successfully.');

        return redirect(route('penitipans.index'));
    }

    /**
     * Remove the specified penitipan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penitipan = $this->penitipanRepository->find($id);

        if (empty($penitipan)) {
            Flash::error('Penitipan not found');

            return redirect(route('penitipans.index'));
        }

        $this->penitipanRepository->delete($id);

        Flash::success('Penitipan deleted successfully.');

        return redirect(route('penitipans.index'));
    }
}
