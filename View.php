<?php
namespace app\core;
class View {
    
    public string $title = '';

    public function renderView($view, $params = [])
    {
        $viewContent = $this->renderOnlyView($view, $params);
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
    
    ///This isn't used for anything , but it can be used to render content instead of view
    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent(){
        $layout = Application::$app->layout;
        if(!empty(Application::$app->controller)) {
             $layout = Application::$app->controller->layout;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
        return ob_get_clean();
        

    }


    protected function renderOnlyView($view, $params){
        //Here variable is made from value stored in $key variable, example: $key = name so $($key) becames $name 
        foreach($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}

?>
