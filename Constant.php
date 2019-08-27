<?php

namespace contrib\workflow;

class Constant
{
    public const STATUS_ACTIVE = 0;
    public const STATUS_DRAFT = -1;
    public const STATUS_DELETE = 1;

    public const TASK = 'task';
    public const START = 'start';
    public const EXCLUSIVE = 'exclusive';
    public const PARALLEL = 'parallel';

    public const ASSIGN_OWNER = 'owner';
    public const ASSIGN_USER = 'user';
    public const ASSIGN_GROUP = 'group';
    public const ASSIGN_PERMISSION = 'permission';
}
