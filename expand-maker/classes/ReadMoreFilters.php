<?php
use yrm\Tickbox;

class ReadMoreFilters
{
	private $isLoadedMediaData = false;

	public function isLoadedMediaData() {
		return $this->isLoadedMediaData;
	}

	public function setIsLoadedMediaData($isLoadedMediaData) {
		$this->isLoadedMediaData = $isLoadedMediaData;
	}

	public function __construct()
	{
		$this->init();
	}

	public function yrmMediaButton()
	{
		$isLoadedMediaData = $this->isLoadedMediaData();
		new Tickbox(true, $isLoadedMediaData);
	}

	public function init()
	{
		add_filter('mce_external_plugins', array($this, 'editorButton'));
		add_action('media_buttons', array($this, 'yrmMediaButton'), 11);
	}

	public function editorButton($buttons)
	{
		$buttons['readMoreButton'] = YRM_ADMIN_JAVASCRIPT.'yrm-tinymce-plugin.js';

		return $buttons;
	}
}

new ReadMoreFilters();