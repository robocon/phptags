<?php
class MyFile
{
    public $allFiles = array();
    public $base_path = '';
    public $rows = 0;

    public function __construct($path = null){
        $this->base_path = $path;
    }

    public function getPath(){
        return $this->base_path;
    }

    public function getItems($path = null){
        $lists = glob($path.'/*');
        return $lists;
    }

    public function updateFiles($path = null)
    {
        
        if( $path === null ){
            $path = $this->base_path;
        }
        
        $items = $this->getItems($path);
        foreach ($items as $item) {
            if (is_dir($item)) {
                $this->updateFiles($item);
            }else{
                
                if (preg_match('/.+(\.php)$/', $item)) {
                    $content = file_get_contents($item);
                    $pattern = '/\<\?(PHP)?\s?(?!php)+(?!\=)/mi';

                    // Check before replace
                    if (preg_match($pattern, $content) > 0) {
            			$new_content = preg_replace($pattern, '<?php ', $content);
            			if (file_put_contents($item, $new_content)) {
            			    $this->allFiles[] = $item;
                            $this->rows += 1;
            			}
                    }
                }
            }
        }
    }

    public function showUpdated(){
        $this->rows = count($this->allFiles);
        return $this->allFiles;
    }

    public function rowsUpdated(){
        return $this->rows;
    }
}
