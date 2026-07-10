<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Http\Controllers\Controller;
use App\Actions\Driver\RegisterDriverAction;
use App\Http\Requests\Driver\RegisterDriverRequest;
use App\Http\Resources\Driver\DriverResource;
use App\Core\Responses\ApiResponse;
use App\Actions\Driver\UploadDriverDocumentAction;
use App\Http\Requests\Driver\UploadDriverDocumentRequest;
use App\Http\Resources\Driver\DriverDocumentResource;
use App\Actions\Driver\ListDriverDocumentsAction;
use App\Actions\Driver\ReplaceDriverDocumentAction;
use App\Http\Requests\Driver\ReplaceDriverDocumentRequest;
use App\Actions\Driver\DeleteDriverDocumentAction;


class DriverController extends Controller
{
    public function register(
        RegisterDriverRequest $request,
        RegisterDriverAction $action
    ) {

        $result = $action->execute(
            $request->user()->id,
            $request->validated()
        );

        return ApiResponse::success(

            message: 'Driver registered successfully.',

            data: [

                'driver' => new DriverResource(
                    $result['driver']
                ),

            ]

        );
    }

    public function uploadDocument(

    UploadDriverDocumentRequest $request,

    UploadDriverDocumentAction $action

)
{

    $document = $action->execute(

        auth()->user(),

        $request->validated()

    );

    return ApiResponse::success(

        message: 'Document uploaded successfully.',

        data: [

            'document' => new DriverDocumentResource(

                $document

            )

        ]

    );

}

public function documents(
    ListDriverDocumentsAction $action
)
{

    $documents = $action->execute(
        auth()->user()
    );

    return ApiResponse::success(

        message: 'Documents fetched successfully.',

        data: [

            'documents' => DriverDocumentResource::collection(
                $documents
            )

        ]

    );

}

public function replace(
    ReplaceDriverDocumentRequest $request,
    ReplaceDriverDocumentAction $action
) {

    $document = $action->execute(
        auth()->user(),
        $request->validated()
    );

    return ApiResponse::success(

        message: 'Document replaced successfully.',

        data: [

            'document' => new DriverDocumentResource(
                $document
            )

        ]

    );
}

public function deleteDocument(
    string $uuid,
    DeleteDriverDocumentAction $action
) {

    $action->execute(

        auth()->user(),

        $uuid

    );

    return ApiResponse::success(

        message: 'Document deleted successfully.',

        data: []

    );

}


}
