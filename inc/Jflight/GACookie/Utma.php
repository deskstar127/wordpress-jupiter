<?php namespace Jflight\GACookie;

use Jflight\GACookie\ParseInterface;

class Utma extends Cookie
{
	/**
	 * Constructor
	 * @param DateTimeImmutable $date
	 */
	public function __construct(\DateTime $date)
	{
		$this->date = $date;
	}

	/**
	 * Time of first visit
	 * @var string
	 */
	public $time_of_first_visit;

	/**
	 * Time of last visit
	 * @var string
	 */
	public $time_of_last_visit;

	/**
	 * Time of current visit
	 * @var string
	 */
	public $time_of_current_visit;

	/**
	 * Session count
	 * @var integer
	 */
	public $session_count;

	/**
	 * Parses the string from the cookie and assigns properties
	 * @param  string $cookie
	 * @return static
	 */
	public function parse($cookie)
	{
		$cookieBits = explode('.', $cookie);
		$this->time_of_first_visit = $this->date->createFromFormat('U', $cookieBits[2]);
		$this->time_of_last_visit = $this->date->createFromFormat('U', $cookieBits[3]);
		$this->time_of_current_visit = $this->date->createFromFormat('U', $cookieBits[4]);
		$this->session_count = (integer) $cookieBits[5];
		return $this;
	}
}