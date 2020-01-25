<?php


namespace App\Modules\Programa\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssuntoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id_assunto' => $this->id_assunto,
            'no_assunto' => $this->no_assunto,
            'pai' => $this->pai,
            'filhos' => AssuntoResource::collection($this->filhos),
            'quantidade_questoes' => $this->questoes->count(),
        ];
    }
}