<?php

declare(strict_types=1);

namespace Ublaboo\DataGrid\Nette\Database\Tests\Files;

use Nette;
use Ublaboo\DataGrid\DataGrid;

final class XTestingPresenter extends Nette\Application\UI\Presenter
{

	/**
	 * @var bool
	 */
	public $action_handeled = false;

	public function handleDoStuff($id): void
	{
		$this->action_handeled = true;
	}


	public function link($destination, $args = [])
	{
		return $destination . '?' . http_build_query($args);
	}


	protected function createRequest($component, $destination, array $args, $mode)
	{
		return ucfirst($component->getName()) . $this->link($destination, $args);
	}

	protected function createComponentGrid($name)
	{
		return new DataGrid($this, $name);
	}

}
