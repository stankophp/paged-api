<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = 2;
        $vacancies = DB::table('vacancies')->paginate($perPage);

        return response($vacancies, SymfonyResponse::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VacancyRequest $request
     * @return Response
     */
    public function store(VacancyRequest $request)
    {
        $vacancy = Vacancy::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'salary' =>$request->input('salary'),
        ]);

        return response($vacancy, SymfonyResponse::HTTP_ACCEPTED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(int $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        return response($vacancy, SymfonyResponse::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VacancyRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update(VacancyRequest $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'salary' =>$request->input('salary'),
        ]);

        return response($vacancy, SymfonyResponse::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $vacancy->delete();

        return response('Vacancy Deleted', SymfonyResponse::HTTP_NO_CONTENT);
    }
}
