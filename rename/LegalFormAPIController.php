<?php

namespace App\Http\Controllers\API\Setting;

use App\Http\Requests\API\Setting\CreateLegalFormAPIRequest;
use App\Http\Requests\API\Setting\UpdateLegalFormAPIRequest;
use App\Models\Setting\LegalForm;
use App\Repositories\Setting\LegalFormRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LegalFormController
 * @package App\Http\Controllers\API\Setting
 */

class LegalFormAPIController extends AppBaseController
{
    /** @var  LegalFormRepository */
    private $legalFormRepository;

    public function __construct(LegalFormRepository $legalFormRepo)
    {
        $this->legalFormRepository = $legalFormRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/legalForms",
     *      summary="Get a listing of the LegalForms.",
     *      tags={"Setting"},
     *      description="Get all LegalForms",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/LegalForm")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $legalForms = $this->legalFormRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($legalForms->toArray(), 'Legal Forms retrieved successfully');
    }

    /**
     * @param CreateLegalFormAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/legalForms",
     *      summary="Store a newly created LegalForm in storage",
     *      tags={"Setting"},
     *      description="Store LegalForm",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="LegalForm that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/LegalForm")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/LegalForm"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateLegalFormAPIRequest $request)
    {
        $input = $request->all();

        $legalForm = $this->legalFormRepository->create($input);

        return $this->sendResponse($legalForm->toArray(), 'Legal Form saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/legalForms/{id}",
     *      summary="Display the specified LegalForm",
     *      tags={"Setting"},
     *      description="Get LegalForm",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LegalForm",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/LegalForm"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var LegalForm $legalForm */
        $legalForm = $this->legalFormRepository->find($id);

        if (empty($legalForm)) {
            return $this->sendError('Legal Form not found');
        }

        return $this->sendResponse($legalForm->toArray(), 'Legal Form retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateLegalFormAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/legalForms/{id}",
     *      summary="Update the specified LegalForm in storage",
     *      tags={"Setting"},
     *      description="Update LegalForm",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LegalForm",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="LegalForm that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/LegalForm")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/LegalForm"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateLegalFormAPIRequest $request)
    {
        $input = $request->all();

        /** @var LegalForm $legalForm */
        $legalForm = $this->legalFormRepository->find($id);

        if (empty($legalForm)) {
            return $this->sendError('Legal Form not found');
        }

        $legalForm = $this->legalFormRepository->update($input, $id);

        return $this->sendResponse($legalForm->toArray(), 'LegalForm updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/legalForms/{id}",
     *      summary="Remove the specified LegalForm from storage",
     *      tags={"Setting"},
     *      description="Delete LegalForm",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LegalForm",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var LegalForm $legalForm */
        $legalForm = $this->legalFormRepository->find($id);

        if (empty($legalForm)) {
            return $this->sendError('Legal Form not found');
        }

        $legalForm->delete();

        return $this->sendResponse($id, 'Legal Form deleted successfully');
    }
}
