<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWorkEntryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        $user = $this->user();

        $employeeRule = Rule::exists('users', 'id')->where('role', 'employee');

        if ($user?->role === 'supervisor') {
            $employeeRule = Rule::exists('users', 'id')->where(function ($query) use ($user): void {
                $query->where('role', 'employee')
                    ->where('supervisor_id', $user->id);
            });
        }

        return [
            'employee_id' => ['required', 'integer', $employeeRule],
            'work_date' => ['required', 'date'],
            'hours_worked' => ['required', 'numeric', 'min:0', 'max:24'],
            'comment' => ['nullable', 'string'],
        ];
    }
}
