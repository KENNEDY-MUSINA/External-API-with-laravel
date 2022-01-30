<?php

namespace App\Http\Controllers;
use App\Models\Get;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class GetController extends Controller
{
    public function postRequest()
    {
        $response = Http::get("https://www.opensecrets.org/api/?method=candSector&cid=N00007360&cycle=2020&apikey=ba5669832c13962acbcbadd58c4ed0a2");

        $entry = json_decode($response->body());
        foreach($entry as $data)
        {
            $get = new Get();
            $get->cand_name = $data->cand_name;
            $get->cid = $data->cid;
            $get->cycle = $data->cycle;
            $get->state = $data->state;
            $get->party = $data->party;
            $get->chamber = $data->chamber;
            $get->first_elected = $data->first_elected;
            $get->next_election = $data->next_election;
            $get->total = $data->total;
            $get->spent = $data->spent;
            $get->cash_on_hand = $data->cash_on_hand;
            $get->debt = $data->debt;
            $get->origin = $data->origin;
            $get->source = $data->source;
            $get->save();
    
        }
        return response()->json([
            'status'=>200,
            'data'=>$response

        ]);

        

    }

    
}
