<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Http\Resources\Admin\PacienteResource;
use App\Paciente;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PacienteApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('paciente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PacienteResource(Paciente::all());
    }

    public function store(StorePacienteRequest $request)
    {
        $paciente = Paciente::create($request->all());

        return (new PacienteResource($paciente))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Paciente $paciente)
    {
        abort_if(Gate::denies('paciente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PacienteResource($paciente);
    }

    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        $paciente->update($request->all());

        return (new PacienteResource($paciente))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Paciente $paciente)
    {
        abort_if(Gate::denies('paciente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paciente->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
