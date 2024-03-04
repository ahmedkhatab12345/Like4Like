<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
        'description' => 'required|string|max:255',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'link' => 'required|url|unique:works,link',
        ];
    }

    public function messages(): array
{
    return [
        'description.required' => 'حقل الوصف مطلوب',
        'description.string' => 'يجب أن يكون الوصف نصيًا',
        'description.max' => 'الوصف يجب ألا يتجاوز 255 حرفًا',
        'photo.required' => 'حقل الصورة مطلوب',
        'photo.image' => 'يجب أن يكون الملف المرفق صورة',
        'photo.mimes' => 'يجب أن تكون الصورة من نوع jpeg، png، jpg، أو gif',
        'photo.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميغابايت',
        'link.required' => 'حقل الرابط مطلوب',
        'link.url' => 'يجب أن يكون الرابط صالحًا',
        'link.unique' => 'الرابط موجود مسبقًا',
    ];
}
}
