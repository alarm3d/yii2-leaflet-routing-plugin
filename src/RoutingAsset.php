<?php
/**
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace alarm3d\leaflet\plugins\routing;

use yii\web\AssetBundle;

/**
 * RoutingAsset
 *
 * @package alarm3d\leaflet\plugins\routing
 */
class RoutingAsset extends AssetBundle
{
    public $sourcePath = '@vendor/alarm3d/yii2-leaflet-routing-plugin/src/assets';

    public $css = [
        'css/leaflet-routing-machine.css'
    ];

    public $js = [
        'js/leaflet-routing-machine.js'
    ];

    public $depends = [
        'dosamigos\leaflet\LeafLetAsset'
    ];
}
