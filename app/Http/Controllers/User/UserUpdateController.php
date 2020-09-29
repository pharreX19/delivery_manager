<?php
namespace App\Http\Controllers\User;

use Exception;
use App\Http\Controllers\Controller;
use App\Domain\Staff\StaffShowService;
use App\Domain\User\UserUpdateService;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

use function PHPSTORM_META\type;

class UserUpdateController extends Controller{
    
    public function __invoke(UserUpdateRequest $request)
    {
        try{
            $staff = (new UserUpdateService($request))->execute();
            return response()->json([
                'object' => 'user',
                'success_code' => '200',
                'success_message' => 'User Record Updated Success'
            ], 200);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'object' => 'user',
                'failure_code' => '404',
                'failure_message' => 'No record found'
            ], 404);
        
        }catch(Exception $e){
            return response()->json([
                'object' => 'user',
                'failure_code' => $e instanceof ValidationException ? 422 : 500,
                'failure_message' => $e instanceof ValidationException ? $e->errors() : 'Unexpected Error'
            ], $e instanceof ValidationException ? 422 : 500);
        }
    }
}