<?php
use App\Runsite\Libraries\Node;
use App\Runsite\Libraries\PH;
use App\Runsite\Dynamic;

function Model($name)
{
  $model = new Dynamic('_class_'.$name);
  $model = $model->where('is_active', true)->where('language_id', PH::getActiveLocalId());
  return $model;
}

function ModelWithoutConditions($name)
{
  return Node::getUniversal($name);
}
