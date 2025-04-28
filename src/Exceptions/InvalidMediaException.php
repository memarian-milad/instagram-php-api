<?php
namespace InstagramAPI\Exceptions;

class InvalidMediaException extends \DomainException {
	protected $message = 'Invalid media content provided';
	protected $code = 422;
}