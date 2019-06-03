<?php
/*------------------------------------------------------------------------
# SM Aloza - Version 1.0.0
# Copyright (c) 2016 YouTech Company. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: YouTech Company
# Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

namespace Sm\Aloza\Model\Config\Source;

class ListHomeStyles implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray()
	{
		return [
			['value' => 'home-1', 'label' => __('Home Style 1')]
			
		];
	}
}