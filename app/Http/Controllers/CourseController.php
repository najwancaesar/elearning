<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = course::with('courseMaterials')->get();


        echo '<table border="1">
            <tr>
                <th>Mata Kuliah</th>
                <th>Materi</th>
                <th>Link</th>
            </tr>';

        foreach ($courses as $course) {
            foreach ($course->courseMaterials as $material) {
                echo '<tr>
                    <td>' . $course->title . '</td>
                    <td>' . $material->title . '</td>
                    <td>' . $material->file_url . '</td>
                </tr>';
            }
        }
        echo '</table>';
    }
}
