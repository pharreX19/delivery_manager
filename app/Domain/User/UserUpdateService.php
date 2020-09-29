<?php
namespace App\Domain\User;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Validation\ValidationException;

class UserUpdateService{

    private $user;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->user = User::where('id', Auth::user()->id)->firstOrFail();
    }

    
    public function execute() {
        if(! $this->request instanceof UserUpdateRequest) throw new Exception();
        $validatedRequest = $this->request->validated();
        // dd(Hash::check($validatedRequest['old_password'], $this->user->password));
        if(!Hash::check($validatedRequest['old_password'], $this->user->password)){
            throw ValidationException::withMessages(['old_password' => ['Password does not match our records']]);
        }else{
            return $this->user->update($validatedRequest);
        }
    }
}