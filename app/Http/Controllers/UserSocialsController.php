<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserSocialCreateRequest;
use App\Http\Requests\UserSocialUpdateRequest;
use App\Repositories\UserSocialRepository;
use App\Validators\UserSocialValidator;

/**
 * Class UserSocialsController.
 *
 * @package namespace App\Http\Controllers;
 */
class UserSocialsController extends Controller
{
    /**
     * @var UserSocialRepository
     */
    protected $repository;

    /**
     * @var UserSocialValidator
     */
    protected $validator;

    /**
     * UserSocialsController constructor.
     *
     * @param UserSocialRepository $repository
     * @param UserSocialValidator $validator
     */
    public function __construct(UserSocialRepository $repository, UserSocialValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $userSocials = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userSocials,
            ]);
        }

        return view('userSocials.index', compact('userSocials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserSocialCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserSocialCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $userSocial = $this->repository->create($request->all());

            $response = [
                'message' => 'UserSocial created.',
                'data'    => $userSocial->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userSocial = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userSocial,
            ]);
        }

        return view('userSocials.show', compact('userSocial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userSocial = $this->repository->find($id);

        return view('userSocials.edit', compact('userSocial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserSocialUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UserSocialUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $userSocial = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'UserSocial updated.',
                'data'    => $userSocial->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'UserSocial deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UserSocial deleted.');
    }
}
