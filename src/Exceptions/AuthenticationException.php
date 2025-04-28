<?php
namespace InstagramAPI\Exceptions;

class AuthenticationException extends InstagramAPIException {
	protected $code = 401;
}