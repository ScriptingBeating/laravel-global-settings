<?php

namespace ScriptingBeating\GlobalSetting;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ScriptingBeating\GlobalSetting\Skeleton\SkeletonClass
 */
class GlobalSettingFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'global-setting';
    }
}
