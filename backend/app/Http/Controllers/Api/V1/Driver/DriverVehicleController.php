<?php

namespace App\Http\Controllers\Api\V1\Driver;

use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;

use App\Actions\Driver\RegisterVehicleAction;

use App\Http\Requests\Driver\RegisterVehicleRequest;
use App\Actions\Driver\ListVehiclesAction;
use App\Actions\Driver\UpdateVehicleAction;
use App\Http\Requests\Driver\UpdateVehicleRequest;
use App\Actions\Driver\DeactivateVehicleAction;
use App\Actions\Driver\DeleteVehicleAction;

class DriverVehicleController extends Controller
{
public function __construct(

    private readonly RegisterVehicleAction $registerAction,

    private readonly ListVehiclesAction $listAction,

    private readonly UpdateVehicleAction $updateAction,

    private readonly DeleteVehicleAction $deleteAction,
    private readonly DeactivateVehicleAction $deactivateAction

)  {
}

    public function store(
        RegisterVehicleRequest $request
    ): JsonResponse {

        $vehicle = $this->registerAction->execute(

            auth()->user(),

            $request->validated()

        );

        return response()->json([

            'success' => true,

            'message' => 'Vehicle registered successfully.',

            'data' => [

                'vehicle' => $vehicle

            ],

            'errors' => null,

        ]);

    }

    public function index(): JsonResponse
{

    $vehicles = $this->listAction->execute(

        auth()->user()

    );

    return response()->json([

        'success' => true,

        'message' => 'Vehicles fetched successfully.',

        'data' => [

            'vehicles' => $vehicles

        ],

        'errors' => null,

    ]);

}

public function update(
    UpdateVehicleRequest $request,
    string $uuid
): JsonResponse {

    $vehicle = $this->updateAction->execute(

        auth()->user(),

        $uuid,

        $request->validated()

    );

    return response()->json([

        'success' => true,

        'message' => 'Vehicle updated successfully.',

        'data' => [

            'vehicle' => $vehicle

        ],

        'errors' => null,

    ]);

}

public function destroy(
    string $uuid
): JsonResponse {

    $this->deleteAction->execute(

        auth()->user(),

        $uuid

    );

    return response()->json([

        'success' => true,

        'message' => 'Vehicle deleted successfully.',

        'data' => [],

        'errors' => null,

    ]);

}

public function deactivate(
    string $uuid
): JsonResponse {

    $vehicle = $this->deactivateAction->execute(

        auth()->user(),

        $uuid

    );

    return response()->json([

        'success' => true,

        'message' => 'Vehicle deactivated successfully.',

        'data' => [

            'vehicle' => $vehicle

        ],

        'errors' => null,

    ]);

}
}
