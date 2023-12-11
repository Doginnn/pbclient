<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

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

            $clientData = $request->only([
                'ds_nome',
                'ds_nome_social',
                'nu_cpf_cnpj',
                'dt_nascimento',
                'ds_foto_path'
            ]);

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
