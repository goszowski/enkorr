<?php
use App\Runsite\Libraries\Node;

function Model($name, $defaultConditions=true)
{
  if($defaultConditions)
  {
    return Node::getU($name);
  }
  else
  {
    return Node::getUniversal($name);
  }
}
