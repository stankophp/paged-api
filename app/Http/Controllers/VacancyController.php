<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use \Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View|Response
     */
    public function index(Request $request)
    {
        $perPage = 2;
        $vacancies = DB::table('vacancies')->paginate($perPage);

        return view('vacancies.index', compact(['vacancies']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response|View
     */
    public function create()
    {
        return view('vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response|RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => ['required', 'min:2', 'max:100',],
            'description' => ['required', 'min:2', 'max:100000',],
            'location' => ['required', 'min:2', 'max:100',],
            'salary' => ['required', 'min:2', 'max:100000', 'numeric'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $vacancy = Vacancy::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'salary' =>$request->input('salary'),
        ]);

        return redirect(route('vacancies.index'))->with('success', 'Vacancy created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response|View
     */
    public function show(int $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        return view('vacancies.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response|View
     */
    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('vacancies.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response|RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $rules = [
            'title' => ['required', 'min:2', 'max:100',],
            'description' => ['required', 'min:2', 'max:100000',],
            'location' => ['required', 'min:2', 'max:100',],
            'salary' => ['required', 'min:2', 'max:100000', 'numeric'],
        ];

        $validator = Validator::make($request->all(), $rules);
        dd($validator);

        if ($validator->fails())
        {
            dd($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $vacancy->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'salary' =>$request->input('salary'),
        ]);

        return redirect(route('vacancies.index'))->with('success', 'Vacancy updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response|RedirectResponse
     */
    public function destroy(int $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $vacancy->delete();

        return redirect(route('vacancies.index'))->with('info', 'Vacancy deleted successfully!');
    }
}
