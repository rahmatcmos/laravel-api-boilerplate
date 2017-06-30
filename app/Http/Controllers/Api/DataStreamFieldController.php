<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\StoreDataStreamFieldRequest;
use App\Http\Requests\UpdateDataStreamFieldRequest;
use App\Http\Transformers\Api\DataStreamFieldTransformer;
use App\Models\DataStreamField;
use Dingo\Api\Exception\ValidationHttpException;
use Dingo\Api\Routing\UrlGenerator;
use Dingo\Api\Transformer\Factory;

/**
 * @resource DataStreamField
 *
 * @package App\Http\Controllers\Api
 */
class DataStreamFieldController extends ApiController
{
	/**
	 * DataStreamFieldController constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		// @todo authorize End-User via owned/administerd projects !

		// User group restrictions
		$this->middleware('verifyUserGroup:Developer,Support', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
	}

	/**
	 * Show data stream field list
	 *
	 * @return \Dingo\Api\Http\Response
	 */
	public function index()
	{
		$dataStreamFields = DataStreamField::applyRequestQueryString()->paginate();

		return $this->response->paginator($dataStreamFields, new DataStreamFieldTransformer);
	}

	/**
	 * Get specified data stream field
	 *
	 * @param $dataStreamFieldId string Data stream field UUID
	 * @return \Dingo\Api\Http\Response|void
	 */
	public function show($dataStreamFieldId)
	{
		$dataStreamField = DataStreamField::find($dataStreamFieldId);

		if (!$dataStreamField)
			return $this->response->errorNotFound();

		return $this->response->item($dataStreamField, new DataStreamFieldTransformer);
	}

	/**
	 * Create and store new data stream field
	 *
	 * @ApiDocsNoCall
	 *
	 * @param StoreDataStreamFieldRequest $request
	 * @return \Dingo\Api\Http\Response|void
	 * @throws ValidationHttpException
	 */
	public function store(StoreDataStreamFieldRequest $request)
	{
		$dataStreamField = DataStreamField::create($request->all(), $request->getRealMethod());

		if ($dataStreamField) {
			// Register model transformer for created/accepted responses
			// @link https://github.com/dingo/api/issues/1218
			app(Factory::class)->register(
				DataStreamField::class,
				DataStreamFieldTransformer::class
			);

			return $this->response->created(
				app(UrlGenerator::class)
					->version('v1')
					->route('dataStreamField.show', $dataStreamField->id),
				$dataStreamField);
		}

		return $this->response->errorBadRequest();
	}

	/**
	 * Update a data stream field
	 *
	 * @ApiDocsNoCall
	 *
	 * @param UpdateDataStreamFieldRequest $request
	 * @param $dataStreamFieldId string Data stream field UUID
	 * @return \Dingo\Api\Http\Response|void
	 */
	public function update(UpdateDataStreamFieldRequest $request, $dataStreamFieldId)
	{
		$dataStreamField = DataStreamField::find($dataStreamFieldId);

		if (!$dataStreamField)
			return $this->response->errorNotFound();

		$dataStreamField->fill($request->all(), $request->getRealMethod());
		$dataStreamField->save();

		return $this->response->item($dataStreamField, new DataStreamFieldTransformer);
	}

	/**
	 * Delete specified data stream field
	 **
	 * @ApiDocsNoCall
	 *
	 * @param $dataStreamFieldId string Data stream field UUID
	 * @return \Dingo\Api\Http\Response|void
	 */
	public function destroy($dataStreamFieldId)
	{
		$dataStreamField = DataStreamField::find($dataStreamFieldId);

		if (!$dataStreamField)
			return $this->response->errorNotFound();

		$dataStreamField->delete();

		return $this->response->noContent();
	}
}