<?php
 
define('BOT_TOKEN', 'YOURBOTAPI');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
header("Content-Type: application/json");
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}
$messageFromGroup = isset($update['messageFromGroup']) ? $update['messageFromGroup'] : "";
$messageChatType = isset($update['message']['chat']['type']) ? $update['message']['chat']['type'] : "";
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
if(isset($update["callback_query"])) {
  $parameters["method"] = "answerCallbackQuery";
  $parameters["callback_query_id"] = $update["callback_query"]["id"];
  $parameters["url"] = "<url-html>";
  echo json_encode($parameters);
  
  die;
}
//$parameters = array('chat_id' => $chatId);
//$parameters["method"] = "sendGame";
//$parameters["game_short_name"] = "prova";
//echo json_encode($parameters);

$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}
$message = isset($update['message']) ? $update['message'] : "";
$userId = isset($update['userId']) ? $update['userId'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);
//WORK IN PROGRESS
function CreatoreChat($chatId,$token){
  $up = json_decode(file_get_contents('https://api.telegram.org/bot'.BOT_TOKEN.'/getChatAdministrators?chat_id='.$chatId),true);
  $result = $up['result'];
  foreach($result as $key=>$value){
    $found = array_search("creator",$result[$key]);
    if($found !== false){
      return $result[$key]['user'];
    }
  }
}
function NetBan(){

}
$token = 'YOURBOTAPI';
$creator = CreatoreChat($chatId,$token);

function Inoltra($chatId,$fromchatId,$messageId)
{
$parameters = array('chat_id' => $chatId, "from_chat_id" => $fromchatId, "message_id" => $messageId);
$parameters["method"] = "ForwardMessage";
}
//WORK IN PROGRESS
header("Content-Type: application/json");
$response = '';

//if(isset($message['text']))
//{
	//$response = "Ho ricevuto il seguente messaggio di testo: " . $message['text'];
//}
if($messageChatType=="supergroup"){
$Provenienza="Gruppo";
$Stato="1";
}else{
$Provenienza="Privato";
$Stato="0";
}
if($chatId=="-1001307386877"){
$Provenienza="Weared Group";
$StatoGroup="1";
}else{
$Provenienza="Another Group";
$StatoGroup="0";
}
if($message['text']=="ENRICO") //|| $message['text']=="ciao"
{
	$response = "".$Stato."";
}
if($Stato==0){
if($message['text']=="/start") //|| $message['text']=="ciao"
{
	$response = "\xF0\x9F\x91\x89Ciao, io sono Weared Service \xF0\x9F\x87\xAE\xF0\x9F\x87\xB9, attualmente sono in servizio per \xE2\x9C\x85Weared Anti-Scam, se ti serve un servizio anti-scam sicuro, aggiungimi ad un tuo gruppo/canale, e rendimi amministratore, in \xF0\x9F\x99\x8Cautomatico bannero tutti gli scammer segnalati dalla \xF0\x9F\x94\x89Weared Anti-Scam.\xF0\x9F\x91\x88";
}
}elseif(isset($message['audio']))
{
	$response = "Ho ricevuto un messaggio audio";
}
elseif(isset($message['document']))
{
	$response = "Ho ricevuto un messaggio document";
}
elseif(isset($message['photo']))
{
	//$response = "Ho ricevuto un messaggio photo";
    $response="https://i.imgur.com/OqE5UR4.jpg"; //path
}
elseif(isset($message['sticker']))
{
	$response = "Ho ricevuto un messaggio sticker";
}
elseif(isset($message['video']))
{
	$response = "Ho ricevuto un messaggio video";
}
elseif(isset($message['voice']))
{
	$response = "Ho ricevuto un messaggio voice";
}
elseif(isset($message['contact']))
{
	$response = "Ho ricevuto un messaggio contact";
}
elseif(isset($message['location']))
{
	$response = "Ho ricevuto un messaggio location";
}
elseif(isset($message['venue']))
{
	$response = "Ho ricevuto un messaggio venue";
}
elseif($message['text'] == '/keyboard')
{
	$response = "Questa è la tua tastiera";
}
else
{
	$response = "Ho ricevuto un messaggio ?";
}
if($Stato==1){
if($message['text']=="/versione") //|| $message['text']=="ciao"
{
	$response = "\xF0\x9F\x91\x89La versione del BOT è la V.1.\xF0\x9F\x91\x88";
} 
}
else
{
if($message['text']=="/start") //|| $message['text']=="ciao"
{
	$response = "".$Stato." tuo gruppo/canale, e rendimi amministratore, in \xF0\x9F\x99\x8Cautomatico bannero tutti gli scammer segnalati dalla \xF0\x9F\x94\x89Weared Anti-Scam.\xF0\x9F\x91\x88";
}
}
if($StatoGroup==1){
if($message['text']=="/netban") //|| $message['text']=="ciao"
{
	//$response = "\xF0\x9F\x91\x89L'utente TEST è stato netbannato con successo.\xF0\x9F\x91\x88";
    $response = "\xE2\x9A\xA0UTENTE BANNATO\xE2\x9A\xA0

Informazioni sull'utente \xF0\x9F\x95\xB5
\xF0\x9F\x93\xA7 Nome: USERNAME
\xF0\x9F\x93\x9A Cognome: COGNOME
\xF0\x9F\x86\x94 ID: ID BANNATO
\xF0\x9F\x8C\x90 Username: @USERNAMEBANNATO

Bannato da \xF0\x9F\x91\xA8\xE2\x80\x8D\xF0\x9F\x94\xA7
\xf0\x9f\x91\xae Admin: NOME ADMIN
\xF0\x9F\x86\x94 ID Admin: ID ADMIN

Motivazione \xF0\x9F\x93\x9D
Truffa tentata \xE2\x9C\x85";
}  
}
else
{
}
$keyboard = [['AB', 'BC'],
             ['C', 'D']];
$replykeyboardmarkup->keyboard = $keyboard;
$replykeyboardmarkup->resize_keyboard = true;
$replykeyboardmarkup->one_time_keyboard = true;

if(isset($message['photo']))
{
$parameters = array('chat_id' => $chatId, "photo" => $response);
$parameters["method"] = "sendPhoto";
}
elseif($message['text'] == '/keyboard')
{
$parameters = array('chat_id' => $chatId, "text" => $response, "reply_markup" => $replykeyboardmarkup);
$parameters["method"] = "sendMessage";
}
elseif($message['text'] == '/keyboard')
{
$parameters = array('chat_id' => $chatId, "action" => 'typing');
$parameters["method"] = "sendChatAction";
}
elseif($message['text'] == '/key')
{
$parameters = array('text' => 'Tasto', "callback_data" => 'pressed_btn1');
$parameters["method"] = "sendMessage";
}
else
{
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
}
echo json_encode($parameters);
?>