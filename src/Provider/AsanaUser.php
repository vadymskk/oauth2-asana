<?php

namespace Worksection\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Tool\ArrayAccessorTrait;

class AsanaUser implements ResourceOwnerInterface
{
  use ArrayAccessorTrait;

  /**
   * @var array
   */
  protected $response;

  /**
   * @param array $response
   */
  public function __construct(array $response)
  {
    $this->response = $response;
  }

  public function getId()
  {
    return $this->getValueByKey($this->response, 'data.gid');
  }

  public function getEmail()
  {
    return $this->getValueByKey($this->response, 'data.email');
  }

  public function getName()
  {
    return $this->getValueByKey($this->response, 'data.name');
  }

  public function getPhoto()
  {
    return $this->getValueByKey($this->response, 'data.photo');
  }

  public function toArray()
  {
    return $this->response;
  }
}
