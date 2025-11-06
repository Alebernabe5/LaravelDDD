<?php

use App\Http\Controllers\Controller;
use Src\admin\user\application\GetUserByIdUseCase;
use Src\admin\user\application\CreateUserUseCase;
use Src\admin\user\infrastructure\validators\CreateUserRequest;

final class UserController extends Controller{

    private CreateUserUseCase $createUser;
    private GetUserByIdUseCase $getUser;

    public function __construct(
         CreateUserUseCase  $createUser,
         GetUserByIdUseCase  $getUser
    )
    {
        
       $this-> createUser = $createUSer;
       $this-> getUser = $getUser;
        
    }

     public function store(CreateUserRequest $request){
        $user = $this->createUser->execute(
            $request->id,
            $request->username,
            $request->email,
        );

        return response()->json('success');
     }

     public function show($id)
     {
        $user = $this->getUser($id);
     }
}