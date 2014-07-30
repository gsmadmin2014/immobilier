<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_service
{
	protected $em = null;
	
	public function __construct()
	{
		$CI =& get_instance();
		$CI->load->library('doctrine');
		$this->em = $CI->doctrine->em;	
	}
	
	/**
     * Send message 
     */
    public function send($data = array())
    {
        $message = new Entities\Message();
        if (array_key_exists('name', $data)) {
            $message->setName($data['name']);
        }
    	if (array_key_exists('email', $data)) {
            $message->setEmail($data['email']);
        }
    	if (array_key_exists('content', $data)) {
            $message->setContent($data['content']);
        }
    	if (array_key_exists('agent', $data)) {
    	    $agentId = $data['agent'];
    	    $agent = $this->em->getRepository('Entities\User')->find($agentId);
    	    if ($agent instanceof Entities\User) {
    	    	$message->setAgent($agent);
    	    }
        }
    	if (array_key_exists('immobilier', $data)) {
    	    $immobilierId = $data['immobilier'];
    	    $immobilier = $this->em->getRepository('Entities\Immobilier')->find($immobilierId);
    	    if ($immobilier instanceof Entities\Immobilier) {
    	    	$message->setImmobilier($immobilier);
    	    }
        }
        $message->setViewed(0);
        $message->setDeleted(0);
		$this->em->persist($message);
        $this->em->flush();
       
        if ($message->getId()) {
            return true;
        }
        return false;
    }
    
    /**
     * Lists of user's message
     */
    public function getUserMessage($idUser)
    {
    	$messages = $this->em->getRepository('Entities\Message')->listMessageByUser($idUser);
    	$result = array();
    	if (isset($messages) && count($messages)) {    		
    		$result['messages'] = array();
    		$count = 0;
    		foreach ($messages as $message) {
    			$id = $message->getId();
    			$sender = $message->getName();
    			$created = $message->getCreated();
    			$content = $message->getContent();
    			$viewed = $message->getViewed();
    			$time = $this->displayMoment($created);
				
    			array_push($result['messages'], array('id' => $id,
    									'sender' => $sender,
    									'created' => $created,
    									'content' => $content,
    									'viewed' => $viewed,
    									'time' => $time
    				)
    			);
    			if ($viewed === 0) {
    				$count++;
    			}
    		}
    		$result['count'] = $count;
    	}
    	return $result;
    }
    
	private function displayMoment($date)
	{
		$now = new \DateTime();
    	$interval = $now->diff($date);
    	$year = $interval->y;
    	$month = $interval->m;
    	$day = $interval->d;
    	$hour = $interval->h;
    	$minute = $interval->i;
    	$second = $interval->s;
    	$time = 'A moment ago';
    	if (!$year && !$month && !$day) {
    		if ($hour) {
    			$time = strval($hour) . ' hours ago';
    		} else {
    			if ($minute) {
    				$time = strval($minute) . ' minutes ago';
    			} else {
    				if ($second) {
    					$time = strval($second) . ' seconds ago';
    				}
    			}
    		}
    	} else {
    		if ($day) {
    			$time = strval($day) . ' days ago';
    		} else {
    			$time = utf8_encode(ucwords(strftime('%d %B %Y', $date)));
    		}
    	}
		return $time;
	}
    
}