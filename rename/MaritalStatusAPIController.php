<?php

namespace App\Http\Controllers\API\Setting;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Setting\CreateMaritalStatusAPIRequest;
use App\Http\Requests\API\Setting\UpdateMaritalStatusAPIRequest;
use App\Models\Setting\MaritalStatus;
use App\Repositories\Setting\MaritalStatusRepository;
use Exception;
use Illuminate\Http\Request;
use Response;

/**
 * Class MaritalStatusController
 * @package App\Http\Controllers\API\Setting
 */
class MaritalStatusAPIController extends AppBaseController
{
    /** @var  MaritalStatusRepository */
    private $maritalStatusRepository;

    public function __construct(MaritalStatusRepository $maritalStatusRepo)
    {
        $this->maritalStatusRepository = $maritalStatusRepo;
    }

    /**
     * Display a listing of the MaritalStatus.
     * GET|HEAD /maritalStatuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $maritalStatuses = $this->maritalStatusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return view('setting.marital_statuses.index')->with('maritalStatuses', $maritalStatuses);
    }

    /**
     * Store a newly created MaritalStatus in storage.
     * POST /maritalStatuses
     *
     * @param CreateMaritalStatusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMaritalStatusAPIRequest $request)
    {
        $input = $request->all();

        $maritalStatus = $this->maritalStatusRepository->create($input);

        return back();
    }

    /**
     * Display the specified MaritalStatus.
     * GET|HEAD /maritalStatuses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MaritalStatus $maritalStatus */
        $maritalStatus = $this->maritalStatusRepository->find($id);

        if (empty($maritalStatus)) {
            return $this->sendError('Marital Status not found');
        }

        return $this->sendResponse($maritalStatus->toArray(), 'Marital Status retrieved successfully');
    }

    /**
     * Update the specified MaritalStatus in storage.
     * PUT/PATCH /maritalStatuses/{id}
     *
     * @param int $id
     * @param UpdateMaritalStatusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMaritalStatusAPIRequest $request)
    {
        $input = $request->all();

        /** @var MaritalStatus $maritalStatus */
        $maritalStatus = $this->maritalStatusRepository->find($id);

        if (empty($maritalStatus)) {
            return $this->sendError('Marital Status not found');
        }

        $maritalStatus = $this->maritalStatusRepository->update($input, $id);

        return back();
    }

    /**
     * Remove the specified MaritalStatus from storage.
     * DELETE /maritalStatuses/{id}
     *
     * @param int $id
     *
     * @return Response
     * @throws Exception
     *
     */
    public function destroy($id)
    {
        /** @var MaritalStatus $maritalStatus */
        $maritalStatus = $this->maritalStatusRepository->find($id);

        if (empty($maritalStatus)) {
            return $this->sendError('Marital Status not found');
        }

        $maritalStatus->delete();

        return back();
    }
}
