<?php
class My_File
{
    public $all_files = array();

    public function get_items($path = null){
        $lists = glob($path.'/*');
        return $lists;
    }

    public function list_file($path = null)
    {
        $items = $this->get_items($path);
        foreach ($items as $item) {
            if (is_dir($item)) {
                $this->list_file($item);
            }else{
                if (preg_match('/.+(\.php)$/', $item)) {
                    $content = file_get_contents($item);
                    $pattern = '/\<\?(?!php)+(?!\=)/m';
                    if (preg_match($pattern, $content) > 0) {
                        $new_content = preg_replace($pattern, '<?php ', $content);
                        if (file_put_contents($item, $new_content)) {
                            $this->all_files[] = $item;
                        }
                    }
                }
            }
        }
    }
}

$myfile = new My_File();
$myfile->list_file(dirname(__FILE__));

if (count($myfile->all_files) > 0) {
    echo '<h1>All files below has been change</h1>';
    echo '<pre>';
    print_r($myfile->all_files);
    echo '</pre>';
}else{
    echo '<h1>No files changed :)</h1>';
}
