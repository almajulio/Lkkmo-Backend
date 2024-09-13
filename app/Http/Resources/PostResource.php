<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
     //define properti
    public $status;
    public $message;
    
    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $message
     * @return void
     */
    public function __construct($status, $message, ...$data)
    {
        parent::__construct($data);
        $this->status  = $status;
        $this->message = $message;
    }

    /**
     * Transform the data into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'status'   => $this->status,
            'message'   => $this->message,
            'data'      => $this->data
        ];
    }
}
