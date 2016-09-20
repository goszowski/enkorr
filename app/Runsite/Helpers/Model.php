<?php
use App\Runsite\Libraries\Node;
use App\Runsite\Libraries\PH;

function Model($name)
{
  return Node::getU($name);
}

function ModelWithoutConditions($name)
{
  return Node::getUniversal($name);
}
