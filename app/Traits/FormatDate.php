<?php
namespace App\Traits;

use Carbon\Carbon;

trait FormatDate {

	/**
	 * various formats that can be utilised
	 * 
	 * @var Array
	 */
	protected $formats = [
		'short'        => 'Y-m-d',
		'long'         => 'Y-m-d H:m:i',
		'formal_brief' => 'M j, Y',
		'formal_long'  => 'M j, Y H:m:i'
	];
	
	/**
	 * formats created_at date/time string
	 * 
	 * @param  String $value DateTime string
	 * @return String        formatted string
	 */
	public function getCreatedAtAttribute( $value ) {
		return Carbon::parse($value)->format( $this->formats['short'] );
	}

	/**
	 * formats updated_at date/time string
	 * 
	 * @param  String $value DateTime string
	 * @return String        formatted string
	 */
	public function getUpdatedAtAttribute( $value )
	{
		return Carbon::parse($value)->format( $this->formats['long']);
	}
}