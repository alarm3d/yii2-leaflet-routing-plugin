<?php
/**
 */

namespace alarm3d\leaflet\plugins\routing;

use dosamigos\leaflet\Plugin;
use yii\web\JsExpression;

/**
 * GeoSearch adds geo routing capabilities to your leaflet maps
 * @package alarm3d\leaflet\plugins\routing
 *
 * @property string $pluginName
 */
class Routing extends Plugin
{

    public $token;
    public $start;
    public $end;
    public $service;
    public $styleLine=[];

    /**
     * Returns the plugin name
     * @return string
     */
    public function getPluginName()
    {
        return 'plugin:routing';
    }

    /**
     * Registers plugin asset bundle
     * @param \yii\web\View $view
     * @return mixed
     * @codeCoverageIgnore
     */
    public function registerAssetBundle($view)
    {
        RoutingAsset::register($view);
        return $this;
    }

    /**
     * Returns the javascript ready code for the object to render
     */
    public function encode()
    {
        $token = $this->token;
        //
        $options = '{
        language: \'en\',
	    routeWhileDragging: true,
        reverseWaypoints: true,
        router: L.routing.mapbox("' . $token . '"),
        waypoints: [
            L.latLng(' . implode(',', $this->start) . '),
            L.latLng(' . implode(',', $this->end) . ')
            ],
	    lineOptions: {
		styles: [
                {color: \'black\', opacity: 0.15, weight: 9},
                {color: \'white\', opacity: 0.8, weight: 6},
                {color: \'blue\', opacity: 0.5, weight: 2}
		      ]
	        }
        }';
        $name = $this->getName();
        $map = $this->map;

        $js = "L.Routing.control($options).addTo($map)";

        if (!empty($name)) {
            $js = "var $name = $js;";
        }

        return new JsExpression($js);
    }

}
