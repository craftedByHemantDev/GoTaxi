<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;

use App\Actions\Admin\ApproveDriverDocumentAction;
use App\Actions\Admin\RejectDriverDocumentAction;

    use App\Http\Requests\Admin\ApproveDriverDocumentRequest;
use App\Models\DriverDocument;


use App\Http\Requests\Admin\RejectDriverDocumentRequest;
use Illuminate\Http\JsonResponse;

class DriverVerificationController extends Controller
{
    public function __construct(
        private readonly ApproveDriverDocumentAction $approveAction,
        private readonly RejectDriverDocumentAction $rejectAction
    ) {
    }
public function approve(
    ApproveDriverDocumentRequest $request,
    DriverDocument $document
): JsonResponse {

    $document = $this->approveAction->execute(

        auth()->user(),

        $document,

        $request->remarks

    );

    return response()->json([

        'success' => true,

        'message' => 'Document approved successfully.',

        'data' => [

            'document' => $document

        ],

        'errors' => null

    ]);

}


public function reject(
    RejectDriverDocumentRequest $request,
    DriverDocument $document
): JsonResponse {

    $document = $this->rejectAction->execute(

        auth()->user(),

        $document,

        $request->remarks

    );

    return response()->json([

        'success' => true,

        'message' => 'Document rejected successfully.',

        'data' => [

            'document' => $document

        ],

        'errors' => null

    ]);

}


}
