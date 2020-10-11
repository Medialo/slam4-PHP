<?php

class File{
    
    const DS = DIRECTORY_SEPARATOR;
    const ROOT_FOLDER = __DIR__.self::DS."..";
    
    public static function build_path($path_array) {
        return self::ROOT_FOLDER.self::DS. join(self::DS, $path_array);
}
    
    
}