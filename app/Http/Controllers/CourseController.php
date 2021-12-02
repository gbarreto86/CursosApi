<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    use ApiResponser;

    //public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index()
    {
        return $this->successResponse(Course::all());
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'summary' => 'required|min:1',
            'imagen' => 'required|min:5',
            'author' => 'required|min:8',
            'calification' => 'required|min:1',
        ];

        $this->validate($request, $rules);

        $course = Course::create($request->all());

        return $this->successResponse($course, Response::HTTP_CREATED);
    }

    public function show($course)
    {
        return $this->successResponse(Book::findOrFail($course));
    }

    public function update(Request $request, $course)
    {
        $rules = [
            'name' => 'required|max:255',
            'summary' => 'required|min:1',
            'imagen' => 'required|min:5',
            'author' => 'required|min:8',
            'calification' => 'required|min:1',
        ];

        $this->validate($request, $rules);
        $course = Course::findOrFail($course);

        $course->fill($request->all());
        //verifica si algo cambio
        if($course->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $course->save();
        return $this->successResponse($course);
    }

    public function destroy($course)
    {
        $course = Course::findOrFail($course);
        $course->delete();
        return $this->successResponse($course);
    }
}
