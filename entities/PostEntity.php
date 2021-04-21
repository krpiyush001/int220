<?php

class PostEntity
{
	public $id;
	public $title;
	public $category;
	public $author;
	public $image;
	public $roast;
	public $content;


	function __construct($id, $title, $category, $author, $image, $roast, $content)
	{
		$this->id=$id;
		$this->title=$title;
		$this->category=$category;
		$this->author=$author;
		$this->image=$image;
		$this->roast=$roast;
		$this->content=$content;

	}

}













?>