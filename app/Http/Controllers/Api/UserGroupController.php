<?php

namespace App\Http\Controllers\Api;

use App\Http\Transformers\Api\UserGroupTransformer;
use App\Models\UserGroup;

/**
 * @resource UserGroup
 *
 * @package App\Http\Controllers\Api
 */
class UserGroupController extends ApiController
{
	/**
	 * UserGroup constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		// User group restrictions
		$this->middleware('verifyUserGroup:Developer,Support')->only('index');
	}

	/**
	 * Show User group list
	 *
	 * @return \Dingo\Api\Http\Response
	 */
	public function index()
	{
		$userGroups = UserGroup::applyRequestQueryString()->paginate();

		return $this->response->paginator($userGroups, new UserGroupTransformer);
	}
}