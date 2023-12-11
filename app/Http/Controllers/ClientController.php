<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Ramsey\Uuid\Validator;

class ClientController extends Controller
{
    public function index()
    {
        $clientList = Client::all();

        return view('client.clientList', compact('clientList'));
    }

    public function create()
    {
        $client = Client::all();

        return view('client.client', compact('client'));
    }

    public function store(Request $request)
    {
        $cpfCnpj = $request->input('nu_cpf_cnpj');
        $cpfCnpjExist = Client::where('nu_cpf_cnpj', $cpfCnpj)->exists();

        if (!$cpfCnpjExist) {
            $request->validate([
                'ds_nome',
                'ds_nome_social',
                'nu_cpf_cnpj' => 'required|numeric|unique:clients,nu_cpf_cnpj',
                'dt_nascimento' => 'nullable',
                'ds_foto_path' => 'nullable|file|mimes:jpeg,jpg,png|max:2048'
            ], [
                'ds_foto_path.mimes' => 'Apenas arquivos jpg, jpeg ou png.',
                'nu_cpf_cnpj.unique' => 'CPF ou CNPJ já cadastrado em nossa base de dados.',
                'nu_cpf_cnpj.numeric' => 'O campo deve ser numérico.'
            ]);

            $clientData = $request->only([
                'ds_nome',
                'ds_nome_social',
                'nu_cpf_cnpj',
                'dt_nascimento',
                'ds_foto_path'
            ]);

            // Processo para armazenar a imagem
            if ($request->hasFile('ds_foto_path')) {
                $image = $request->file('ds_foto_path');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $clientData['ds_foto_path'] = 'images/'.$imageName;
            }

            $client = new Client($clientData);
            $client->save();

            return redirect()->route('clients.create')->with('success', 'Cliente cadastrado com sucesso.');
        }

        return redirect()->route('clients.create')->withInput()->with('error', 'CPF ou CNPJ já cadastrado em nossa base de dados.');
    }

    public function edit($nu_seq_client)
    {
        $client = Client::where('nu_seq_client', $nu_seq_client)->first();

        return view('client.clientEdit', compact('client'));
    }

    public function update(Request $request, $nu_seq_client)
    {
        $client = Client::findOrFail($nu_seq_client);

        if ($client) {
            $clientData = $request->validate([
                'ds_nome' => 'required',
                'ds_nome_social' => 'required',
                'nu_cpf_cnpj' => 'required',
                'dt_nascimento' => 'required',
                'ds_foto_path' => 'required'
            ]);

            $client->update($clientData);

            return redirect()->route('clients.index')->with('success', 'Cliente atualizado com sucesso.');
        }

        return redirect()->route('clients.index')->withInput()->with('error', 'Erro ao atualizar os dados.');
    }

    public function destroy($nu_seq_client)
    {
        $client = Client::where('nu_seq_client', $nu_seq_client)->first();

        if ($client) {
            $client->delete();

            return redirect()->route('clients.index')->with('success', 'Cliente deletado com sucesso.');
        }

        return redirect()->route('clients.index')->with('error', 'Erro ao deletar Cliente.');
    }

    public function show($nu_seq_client)
    {
        $client = Client::where('nu_seq_client', $nu_seq_client)->first();

        return view('client.clientShow', compact('client'));
    }
}
