<?php

namespace App\Http\Controllers;
use Google\Client;
use Google_Client;
use Google_Service_Sheets;
use Revolution\Google\Sheets\Sheets;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;

class PostController extends Controller
{   
    private $sheetId = "1F3OsqyeFPvq6556-P0VyXOCHawVjAZmEbtl_dOs21HQ";
    private $sheetData;
    public function __construct()
    {
        $client = new Google_Client();
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);
        $client->setAuthConfig('credential.json');
        $client->setPrompt('select_account consent');

        $service = new Google_Service_Sheets($client);

        $sheets = new Sheets();
        $sheets->setService($service);
        $this->sheetData = $sheets->spreadsheet($this->sheetId)->sheet('A1:Z100')->all();
        array_shift($this->sheetData);

    }

    public function index(){

        $response['sheetData'] = $this->sheetData;
        return view('post.index', $response);
    }
}
