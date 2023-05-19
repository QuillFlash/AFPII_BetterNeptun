<?php
    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StudentControllerRequest extends FormRequest
    {
        public function authorize(): bool
        {
            return true;
        }

        public function rules(): array
        {
            return
            [
                'name' => 'required|max:255',
                'neptunCode' => 'required|unique|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|max:255',
                'isAdmin' => 'required',
                'gradeId' => 'required|max:255'
            ];
        }
    }
?>