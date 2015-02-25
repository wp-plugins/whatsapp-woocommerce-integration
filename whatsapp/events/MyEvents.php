<?php
require 'AllEvents.php';

class MyEvents extends AllEvents
{

    /**
     * This is a list of all current events. Uncomment the ones you wish to listen to.
     * Every event that is uncommented - should then have a function below.
     * @var array
     */
	public $response;
    public $activeEvents = array(
//        'onClose',
        'onCodeRegister',
        'onCodeRegisterFailed',
        'onCodeRequest',
        'onCodeRequestFailed',
        'onCodeRequestFailedTooRecent',
        'onCodeRequestFailedToken',
        'onConnect',
        'onConnectError',
        'onCredentialsBad',
        'onCredentialsGood',
        'onDisconnect',
//        'onDissectPhone',
//        'onDissectPhoneFailed',
//        'onGetAudio',
//        'onGetBroadcastLists',
//        'onGetError',
//        'onGetExtendAccount',
//        'onGetGroupMessage',
//        'onGetGroupParticipants',
//        'onGetGroups',
//        'onGetGroupsInfo',
//        'onGetGroupsSubject',
//        'onGetImage',
//        'onGetLocation',
//        'onGetMessage',
//        'onGetNormalizedJid',
//        'onGetPrivacyBlockedList',
        'onGetProfilePicture',
//        'onGetReceipt',
        'onGetRequestLastSeen',
//        'onGetServerProperties',
//        'onGetServicePricing',
//        'onGetStatus',
//        'onGetSyncResult',
//        'onGetVideo',
//        'onGetvCard',
//        'onGroupCreate',
//        'onGroupisCreated',
//        'onGroupsChatCreate',
//        'onGroupsChatEnd',
//        'onGroupsParticipantsAdd',
//        'onGroupsParticipantsRemove',
        'onLogin',
        'onLoginFailed',
//        'onMediaMessageSent',
//        'onMediaUploadFailed',
//        'onMessageComposing',
//        'onMessagePaused',
//        'onMessageReceivedClient',
//        'onMessageReceivedServer',
//        'onPaidAccount',
//        'onPing',
//        'onPresence',
//        'onProfilePictureChanged',
//        'onProfilePictureDeleted',
//        'onSendMessage',
//        'onSendMessageReceived',
//        'onSendPong',
//        'onSendPresence',
        'onSendStatusUpdate',
//        'onStreamError',
//        'onUploadFile',
//        'onUploadFileFailed',
    );
    private function toObj($array){
        return json_decode(json_encode($array));
    }
    public function onConnect($mynumber, $socket){
		$params = $this->toObj(array(
			'mynumber' => $mynumber
		));
		
		$this->response = $params;
    }
	public function onConnectError( $mynumber, $socket ){
		$params = $this->toObj(array(
			'mynumber' => $mynumber
		));
		
		$this->response = $params;
	}

    public function onDisconnect($mynumber, $socket){
        //echo "<p>Booo!, Phone number $mynumber is disconnected!</p>";
    }
		
	public function onCodeRequest( $mynumber, $method, $length ){		
		$params = $this->toObj(array(
			'mynumber' => $mynumber,
			'method' => $method,
			'length' => $length
		));
		
		$this->response = $params;
	}
	   
	public function onCodeRequestFailed( $mynumber, $method, $reason, $param ){
		$params = $this->toObj(array(
			'mynumber' => $mynumber,
			'method' => $method,
			'reason' => $reason,
			'param' => $param
		));
		
		$this->response =  $params;
	}
		
	public function onCodeRequestFailedTooRecent( $mynumber, $method, $reason, $retry_after ){
		$params = $this->toObj(array(
			'mynumber' => $mynumber,
			'method' => $method,
			'reason' => $reason,
			'retry_after' => $retry_after
		));
		
		$this->response =  $params;
	}
	
	public function onCodeRequestFailedRoutes($mynumber, $method, $status, $reason, $retry_after){
		$params = $this->toObj(array(
			'mynumber' => $mynumber,
			'method' => $method,
			'status' => $status,
			'reason' => $reason,
			'retry_after' => $retry_after
		));
		
		$this->response =  $params;
	}
	
	public function onCodeRequestFailedToken( $mynumber, $method, $status, $reason ){
		$params = $this->toObj(array(
			'mynumber' => $mynumber,
			'method' => $method,
			'status' => $status,
			'reason' => $reason
		));

		$this->response =  $params;
	}
	
	public function onCodeRegister( $mynumber, $login, $password, $type, $expiration, $kind, $price, $cost, $currency, $price_expiration ){
		$params = $this->toObj(array(
			'mynumber' => $mynumber,
			'login' => $login,
			'password' => $password,
			'type' => $type,
			'expiration' => $expiration,
			'kind' => $kind,
			'price' => $price,
			'cost' => $cost,
			'currency' => $currency
		));
		
		$this->response =  $params;
	}
	
	public function onCodeRegisterFailed( $mynumber, $status, $reason, $retry_after ){
		$params = $this->toObj(array(
			'mynumber' => $mynumber,
			'status' => $status,
			'reason' => $reason,
			'retry_after' => $retry_after
		));
		
		$this->response = $params;
	}
	
    public function onLogin( $mynumber ){
    	
		$params = $this->toObj(array(
			'mynumber' => $mynumber
		));
		
		$this->response = $params;
    }
    public function onLoginFailed( $mynumber, $data ){
    	
		$params = $this->toObj(array(
			'mynumber' => $mynumber,
			'data' => $data
		));
		
		$this->response = $params;
    }
	
    public function onCredentialsBad( $mynumber, $status, $reason ){
    	
		$params = $this->toObj(array(
			'mynumber' => $mynumber,
			'status' => $status,
			'reason' => $reason
		));
		
		$this->response = $params;
    }
    public function onCredentialsGood( $mynumber, $login, $password, $type, $expiration, $kind, $price, $cost, $currency, $price_expiration ){
		
		$params = $this->toObj(array(
			'mynumber' => $mynumber,
			'login' => $login,
			'password' => $password,
			'type' => $type,
			'expiration' => $expiration,
			'kind' => $kind,
			'price' => $price,
			'cost' => $cost,
			'currency' => $currency,
			'expiration' => $price_expiration
		));
		
		$this->response = $params;
    }
	public function onSendStatusUpdate( $mynumber, $txt ){
		
		$params = $this->toObj(array(
			'mynumber' => $mynumber,
			'txt' => $txt
		));
		
		$this->response = $params;
	}
	public function onGetRequestLastSeen( $mynumber, $from, $id, $seconds ){
		
		$params = $this->toObj(array(
			'mynumber' => $mynumber,
			'from' => $from,
			'id' => $id,
			'seconds' => $seconds
		));
		
		$this->response = $params;
	}
	
	public function onGetProfilePicture( $mynumber, $from, $type, $data ){
		
		$params = array(
			'mynumber' => $mynumber,
			'from' => $from,
			'type' => $type,
			'data' => $data
		);
		
		$this->response = $params;
	}
}