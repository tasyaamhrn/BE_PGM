<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $request->id,
            'customer_name' => $request->customer->name,
            'category_name' => $request->category->name,
            'type' => $request->type,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'bukti' => $request->bukti_url,
            'feedback_score' => $request->feedback_score,
            'feedback_deskripsi' => $request->feedback_deskripsi,
            'tindak_lanjut' => $request->tindak_lanjut_url,
        ];
    }
}
