<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request with paginate information.
 *
 * @property int|null $page Page number
 * @property int|null $perPage Count of item per page
 * @property int|string $title Title to search
 */
class PaginateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'page' => ['int'],
            'perPage' => ['int'],
            'title' => ['string'],
        ];
    }
}
