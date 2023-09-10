<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterMoviesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'date_published' => 'required',
            'genders' => 'required',
            'image' => 'required',
        ];
    }

    public function getDirectionImage()
    {
        // ! CREA UN ACCESO DIRECTO EN LA CARPETA PUBLIC PARA GUARDAR LA IMAGEN
        $image = $this->file('image')->store('public/movies');
        // ! REEMPLAZA Y GUARDA LA URL DE LA IMAGEN
        $url = Storage::url($image);

        return [
            'name' => $this->get('name'),
            'description' => $this->get('description'),
            'date_published' => $this->get('date_published'),
            'genders' => $this->get('genders'),
            'image' => $url,
        ];


        // $image = $this->get('image');
        // $file = Request::file($this->get('image'));
        // Storage::url($this->get('image'));
        // dd($image);
        // dd(Storage::disk('local')->put($image, 'Contents'));

        // $pathToSave = "/movies";

        // $nameImage = explode(".", $image);
        // $fileType = stristr($image, "/");
        // $fileExtension = str_replace( "/", ".", $fileType);
        // $fileUrl = "/movies" . "/" . $nameImage[0] . ".". $nameImage[1];
        // $nameSaved = $nameImage[0] . ".". $nameImage[1];

        // if (!file_exists($pathToSave)) mkdir($pathToSave, 0777);
        // move_uploaded_file($image, $pathToSave . '/' . $nameSaved);
    }
}
