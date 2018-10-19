<?php

namespace Core;

class View {

    /*this function loads twig html template*/
    public static function render($sTemplate, $aData = []) {
        static $oTwig = null;
        if ($oTwig === null) {
            $oLoader = new \Twig_Loader_Filesystem('../App/Views');
            $oTwig = new \Twig_Environment($oLoader, [
                'debug' => true,
            ]);
            $oTwig->addExtension(new \Twig_Extension_Debug());
        } else {
            echo 'Couldn\'t load view.';
            exit;
        }
        echo $oTwig->render($sTemplate, $aData);
        unset($oTwig);
    }

    /*this function loads standard php template*/
    public static function renderPHP($sView, $aData = []) {
        //extract array to single variables
        // extract($aData);
        $sFile = '../App/Views/' . $sView;

        if (is_readable($sFile)) {
            require_once $sFile;
        } else {
            echo "View file: $sFile - not found.";
        }
    }
}