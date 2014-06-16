<?php

/*
* rss.php - RSS reader class
*
* Help to featch data from an RSS feed and displays on the page
*
* https://github.com/shalintripathi/RSS 
*
*/

namespace Shalintripathi;

class Rss {

	var $feed;
	var $limit;
	var $content;
	var $html;

	function rss($feed, $limit=10) {
		$this->html = "";
		$this->feed = $feed;
		$this->limit = $limit;
		$this->content = array();
		$this->reader();
		return $this->display();
	}

	function reader() {
		$page = new \DOMDocument();
		$page->load($this->feed);

		$channels = $page->getElementsByTagName("channel");

		foreach ($channels as $channel) {
			$items = $channel->getElementsByTagName("item");
			foreach($items as $item) {
				array_push($this->content, $this->fetchElements($item));
			}
		}
	}

	function fetchElements($item) {
		$element = $item->getElementsByTagName("title");
		$element = $element->item(0);
		$title = $element->firstChild->textContent;

		$element = $item->getElementsByTagName("link");
		$element = $element->item(0);
		$link = $element->firstChild->textContent;

		$element = $item->getElementsByTagName("description");
		$element = $element->item(0);
		$description = $element->firstChild->textContent;

		$return = array(0 => $title, 1 => $link, 2 => $description);
		return $return;
	}


	function display() {
		for($i = 0; $i < $this->limit; $i++) {
			$this->html .=
			'
			<span class="rssTitle"><a href="'.$this->content[$i][1].'">'.$this->content[$i][0].'</a></span>
			<span class="rssDescription">'.trim($this->content[$i][2]).'</span>
			';
		}
		return $this->html;
	}
}

?>