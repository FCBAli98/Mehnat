<?php 

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Repositories\TextBlocksRepository;

class FooterRepository {

	public function getFooterTable()
	{
		return TextBlocksRepository::getTextBlockByAnchor('footerTable');
	}

	public function getFooterText()
	{
		return TextBlocksRepository::getTextBlockByAnchor('footerText');
	}

}