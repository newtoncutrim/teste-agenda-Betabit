<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Contact();
    }

    public function index()
    {
        $data = $this->model->all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        Log::info($request->all());

        $data = $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email|unique:contacts',
                'address' => 'required|string',
                'telephone' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adicionando validação para a imagem
            ],
            [
                'name.required' => 'O campo nome é obrigatório.',
                'name.string' => 'O campo nome deve ser uma string.',
                'email.required' => 'O campo email é obrigatório.',
                'email.email' => 'O campo email deve ser um endereço de e-mail válido.',
                'email.unique' => 'O email já está sendo usado por outro contato.',
                'address.required' => 'O campo endereço é obrigatório.',
                'address.string' => 'O campo endereço deve ser uma string.',
                'telephone.required' => 'O campo telefone é obrigatório.',
                'telephone.string' => 'O campo telefone deve ser uma string.',
                'image.image' => 'O arquivo deve ser uma imagem.',
                'image.mimes' => 'A imagem deve estar em formato: jpeg, png, jpg, gif.',
                'image.max' => 'A imagem não pode ter mais de 2MB.',
            ]
        );

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('images', 'public');
            $data['image'] = $imageName;
        }

        $contact = Contact::create($data);

        return response()->json($contact, 201);
    }


    public function show($id)
    {
        $contact = $this->model->find($id);

        if (!$contact) {
            return response()->json(['error' => 'contato não existe ']);
        }

        return response()->json($contact);
    }

    public function update(Request $request, $id)
    {
        $contact = $this->model->find($id);


        $data = $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email|unique:contacts,email,' . $id,
                'address' => 'required|string',
                'telephone' => 'required|string',
            ],

            [
                'name.required' => 'O campo nome é obrigatório.',
                'name.string' => 'O campo nome deve ser uma string.',
                'email.required' => 'O campo email é obrigatório.',
                'email.email' => 'O campo email deve ser um endereço de e-mail válido.',
                'email.unique' => 'O email já está sendo usado por outro contato.',
                'address.required' => 'O campo endereço é obrigatório.',
                'address.string' => 'O campo endereço deve ser uma string.',
                'telephone.required' => 'O campo telefone é obrigatório.',
                'telephone.string' => 'O campo telefone deve ser uma string.',
            ]
        );

        $contact->update($data);

        return response()->json($contact, 200);
    }

    public function destroy($id)
    {
        $contact = $this->model->find($id);

        if (!$contact) {
            return response()->json(['error' => 'contato não existe ']);
        }
        $contact->delete();

        return response()->json(null, 204);
    }
}
