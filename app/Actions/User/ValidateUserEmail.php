<?php
declare(strict_types=1);
namespace App\Actions\User;

use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class ValidateUserEmail
{               private Model $user;
                public function __construct(\App\Models\User $user)
                {
                                $this->user = $user;
                }

                public function __invoke()
                {
                                $code = \App\Services\Utility::generateInteger();
                                $this->user->code = $code;
                                $this->user->save();
                                session(['current_time' => \Carbon\Carbon::now()]);
                                Mail::to($this->user->email)->send(new \App\Mail\VerifyUser($code));
                }
}