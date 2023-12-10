<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Crypt;
use App\Models\Email;
class SendExpirytCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "verificationcode"  => Crypt::decryptString($this->verificationcode),
            "email"             => $this->email,            
        ];
    }
}
