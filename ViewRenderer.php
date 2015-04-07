<?php
/**
 * @link
 * @copyright Andriy Kravchenko
 * @license
 */

namespace exertis\handlebars;

use Yii;
use yii\base\View;
use yii\base\ViewRenderer as BaseViewRenderer;
use Handlebars;

/**
 * HandlebarsViewRenderer allows you to use Handlebar templates in views.
 *
 * @property
 *
 * @author
 * @since
 */
class ViewRenderer extends BaseViewRenderer
{

    /**
     * @var \Handlebars\Handlebars
     */
    public $handlebars;


    /**
     * @var string path alias pointing to where Handlebars cache will be stored. Set to false to disable
     * templates cache.
     */
    public $cache = '@app/runtime/handlebars';

    /**
     * @var array helpers to preload, can contain class names (strings).
     * If empty - only default helpers will be preloaded
     */
    public $helpers;

    /**
     * @var string a callable function to escape values
     */
    public $escape = 'htmlspecialchars';

    /**
     * @var array to pass as extra parameter to the escape function
     */
    public $escapeArgs = [
        ENT_COMPAT,
        'UTF-8'
    ];

    /**
     * @var string the file extension of Handlebars templates
     */
    public $extension = ".handlebars";

    public function init()
    {
        $options = [];

        if (!empty($this->escape)) {
            $options['escape'] = $this->escape;
            if (!empty($this->escapeArgs)) {
                $options['escapeArgs'] = $this->escapeArgs;
            }
        }

        if (!empty($this->helpers)) {
            foreach ($this->helpers as $helper) {
                $options['helpers'][] = new $helper;
            }
        }

        if (!empty($this->cache)) {
            $options['cache'] = new \Handlebars\Cache\Disk(Yii::getAlias($this->cache));
        }

        $this->handlebars = new \Handlebars\Handlebars($options);
    }

    /**
     * Renders a view file.
     *
     * This method is invoked by [[View]] whenever it tries to render a view.
     * Child classes must implement this method to render the given view file.
     *
     * @param View $view the view object used for rendering the file.
     * @param string $file the view file.
     * @param array $params the parameters to be passed to the view file.
     *
     * @return string the rendering result
     */
    public function render($view, $file, $params)
    {
        $this->handlebars->setLoader(new Handlebars\Loader\FilesystemLoader(dirname($file), ['extension' => $this->extension]));
        return $this->handlebars->render(pathinfo($file, PATHINFO_BASENAME), $params);
    }
}
