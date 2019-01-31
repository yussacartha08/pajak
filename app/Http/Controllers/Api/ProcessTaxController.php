<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Processes\TaxProcess;
use App\Models\Employee;

class ProcessTaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function processAction(Request $request, TaxProcess $tax, Employee $employee)
    {
        $result = [];

        foreach ($request->get('employees') as $id) {
            $result['EmployeeId: ' . $id] = $tax->process($employee->getEmployee($id));
        }

        return response(['success' => true, 'result' => $result], 200);
    }
}
