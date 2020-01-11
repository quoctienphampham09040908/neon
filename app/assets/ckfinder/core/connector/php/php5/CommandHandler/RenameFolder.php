<?php
/*
 * CKFinder
 * ========
 * http://cksource.com/ckfinder
 * Copyright (C) 2007-2013, CKSource - Frederico Knabben. All rights reserved.
 *
 * The software, this file and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying or distribute this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
 */
if (!defined('IN_CKFINDER')) exit;

/**
 * @package CKFinder
 * @subpackage CommandHandlers
 * @copyright CKSource - Frederico Knabben
 */

/**
 * Include base XML command handler
 */
require_once CKFINDER_CONNECTOR_LIB_DIR . "/CommandHandler/XmlCommandHandlerBase.php";

/**
 * Handle RenameFolder command
 *
 * @package CKFinder
 * @subpackage CommandHandlers
 * @copyright CKSource - Frederico Knabben
 */
class CKFinder_Connector_CommandHandler_RenameFolder extends CKFinder_Connector_CommandHandler_XmlCommandHandlerBase
{
    /**
     * Command name
     *
     * @access private
     * @var string
     */
    private $command = "RenameFolder";


    /**
     * handle request and build XML
     * @access protected
     *
     */
    protected function buildXml()
    {
        if (empty($_POST['CKFinderCommand']) || $_POST['CKFinderCommand'] != 'true') {
            $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_INVALID_REQUEST);
        }

        if (!$this->_currentFolder->checkAcl(CKFINDER_CONNECTOR_ACL_FOLDER_RENAME)) {
            $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_UNAUTHORIZED);
        }

        if (!isset($_GET["NewFolderName"])) {
            $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_INVALID_NAME);
        }

        $str = $_GET['NewFolderName'];
        $unicode = array(
           'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
           'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
           'd'=>'đ',
           'D'=>'Đ',
           'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
           'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
           'i'=>'í|ì|ỉ|ĩ|ị',
           'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
           'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
           'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
           'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
           'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
           'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
           'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
       );
        foreach($unicode as $khongdau=>$codau) {
            $arr=explode("|",$codau);
            foreach ($arr as $value) {
                $str = str_replace($arr,$khongdau,$str);
            }

        }
        $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
        $str = preg_replace('/([^a-zA-Z0-9]+)/', ' ', $str);
        $str = preg_replace('/\s/', '-', trim($str));
        $_GET['NewFolderName'] = $str;

        $newFolderName = CKFinder_Connector_Utils_FileSystem::convertToFilesystemEncoding($_GET["NewFolderName"]);
        $_config =& CKFinder_Connector_Core_Factory::getInstance("Core_Config");
        if ($_config->forceAscii()) {
            $newFolderName = CKFinder_Connector_Utils_FileSystem::convertToAscii($newFolderName);
        }
        $resourceTypeInfo = $this->_currentFolder->getResourceTypeConfig();

        if (!CKFinder_Connector_Utils_FileSystem::checkFolderName($newFolderName) || $resourceTypeInfo->checkIsHiddenFolder($newFolderName)) {
            $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_INVALID_NAME);
        }

        // The root folder cannot be deleted.
        if ($this->_currentFolder->getClientPath() == "/") {
            $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_INVALID_REQUEST);
        }

        $oldFolderPath = $this->_currentFolder->getServerPath();
        $bMoved = false;

        if (!is_dir($oldFolderPath)) {
            $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_INVALID_REQUEST);
        }

        //let's calculate new folder name
        $newFolderPath = dirname($oldFolderPath).'/'.$newFolderName.'/';

        if (file_exists(rtrim($newFolderPath, '/'))) {
            $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_ALREADY_EXIST);
        }

        $bMoved = @rename($oldFolderPath, $newFolderPath);

        if (!$bMoved) {
            $this->_errorHandler->throwError(CKFINDER_CONNECTOR_ERROR_ACCESS_DENIED);
        } else {
            $newThumbsServerPath = dirname($this->_currentFolder->getThumbsServerPath()) . '/' . $newFolderName . '/';
            if (!@rename($this->_currentFolder->getThumbsServerPath(), $newThumbsServerPath)) {
                CKFinder_Connector_Utils_FileSystem::unlink($this->_currentFolder->getThumbsServerPath());
            }
        }

        $newFolderPath = preg_replace(",[^/]+/?$,", $newFolderName, $this->_currentFolder->getClientPath()) . '/';
        $newFolderUrl = $resourceTypeInfo->getUrl() . ltrim($newFolderPath, '/');

        $oRenameNode = new Ckfinder_Connector_Utils_XmlNode("RenamedFolder");
        $this->_connectorNode->addChild($oRenameNode);

        $oRenameNode->addAttribute("newName", CKFinder_Connector_Utils_FileSystem::convertToConnectorEncoding($newFolderName));
        $oRenameNode->addAttribute("newPath", CKFinder_Connector_Utils_FileSystem::convertToConnectorEncoding($newFolderPath));
        $oRenameNode->addAttribute("newUrl", CKFinder_Connector_Utils_FileSystem::convertToConnectorEncoding($newFolderUrl));
    }
}
