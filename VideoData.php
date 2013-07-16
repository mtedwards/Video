<?php
class VideoData 
{
	private $apiLink,   
			$videoData,
			$DESCRIPTION_LENGTH = 300;

	// Constructor of the class
	function __construct($videoId){
		$this->apiLink = 'http://vimeo.com/api/v2/video/' . $videoId . '.xml';
		$this->getData();
	}
  
	// cURL helps to get data from Vimeo
	private function getData() {
		$curl = curl_init($this->apiLink);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		$this->videoData = simplexml_load_string(curl_exec($curl));
		curl_close($curl);
	}

	// Gets a video property by name
	public function getVideoProperty($videoProperty) {
		return $this->videoData->video->$videoProperty;
	}

	// Trancates a description to be shorter than the DESCRIPTION_LENGTH
	public function getShortDescription() {
		return preg_replace('/\s+?(\S+)?$/', '', substr($this->getVideoProperty('description'), 0, $this->DESCRIPTION_LENGTH)) . '...';
	}

	// Prints all properties of a video
	public function printAllProperties() {
		print '<pre>';
		print_r($this->videoData->video);
		print '</pre>';
	}

	// Prints video data in a specific layout 
	public function printVideoBlock() {	
		$this->getVideoProperty('thumbnail_medium');
	}

}?>