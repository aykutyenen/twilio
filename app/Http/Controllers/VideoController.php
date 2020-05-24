<?php

namespace App\Http\Controllers;

use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use Twilio\Rest\Client;

class VideoController extends Controller
{
    private $sid;
    private $token;
    private $key;
    private $secret;

    private $room_name;

    public function __construct()
    {
        $this->sid = env('TWILIO_ACCOUNT_SID');
        $this->token = env('TWILIO_AUTH_TOKEN');
        $this->key = env('TWILIO_API_KEY');
        $this->secret = env('TWILIO_API_SECRET');
        $this->room_name = "P2P";
    }
    public function index($name)
    {
        $sid = $this->sid;
        $token = $this->token;
        $client = new Client($sid, $token);
        
        $this->room_name = $name;

        $room = $client->video->v1->rooms
            ->create([
                "enableTurn" => true,
                "statusCallback" => "http://cemabi.test/getAccessToken",
                "statusCallbackMethod" => "POST",
                "type" => "peer-to-peer",
                "uniqueName" => $this->room_name,
            ]
            );
        echo($room->sid);

    }
    public function getAccessToken($room_name)
    {
        $sid = $this->sid;
        $key = $this->key;
        $secret = $this->secret;

        // Required for Video grant
        $roomName = $room_name;
        // An identifier for your app - can be anything you'd like
        $identity = 'aykutyenen'.rand(1,100);

        // Create access token, which we will serialize and send to the client
        $token = new AccessToken(
            $sid,
            $key,
            $secret,
            3600,
            $identity
        );

        // Create Video grant
        $videoGrant = new VideoGrant();
        $videoGrant->setRoom($roomName);

        // Add grant to token
        $token->addGrant($videoGrant);

        // render token to string
        return view('join', ['token' => $token->toJWT(),'name' => $roomName,'identity' => $identity ]);

    }
    public function complete($room_id)
    {
        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($sid, $token);

        $room = $twilio->video->v1->rooms($room_id)
            ->update("completed");

        echo($room->sid);
    }
}
