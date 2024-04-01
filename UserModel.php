<?php
namespace app\core;

use app\core\db\DbModel as DbDbModel;
use app\core\DbModel;

abstract class UserModel extends DbDbModel{

    abstract public function getDisplayName(): string;
}