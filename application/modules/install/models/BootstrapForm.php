<?php

/**
 * Rubedo -- ECM solution
 * Copyright (c) 2012, WebTales (http://www.webtales.fr/).
 * All rights reserved.
 * licensing@webtales.fr
 *
 * Open Source License
 * ------------------------------------------------------------------------------------------
 * Rubedo is licensed under the terms of the Open Source GPL 3.0 license. 
 *
 * @category   Rubedo
 * @package    Rubedo
 * @copyright  Copyright (c) 2012-2012 WebTales (http://www.webtales.fr)
 * @license    http://www.gnu.org/licenses/gpl.html Open Source GPL 3.0 license
 */

/**
 * Form for bootstrap
 *
 * @author jbourdin
 * @category Rubedo
 * @package Rubedo
 */
class Install_Model_BootstrapForm
{

    protected static function setForm ($dbForm)
    {
        $submitButton = new Zend_Form_Element_Submit('Submit');
        $submitButton->setAttrib('class', 'btn btn-large btn-primary');
        $resetButton = new Zend_Form_Element_Reset('Reset');
        $resetButton->setAttrib('class', 'btn btn-large btn-warning');
        
        $dbForm->setMethod('post');
        $dbForm->setAttrib('id', 'installForm');
        
        $dbForm->addDisplayGroup(array(
            $resetButton,
            $submitButton
        ), 'buttons');
        $dbForm->getDisplayGroup('buttons')->setDecorators(array(
            
            'FormElements',
            array(
                'HtmlTag',
                array(
                    'tag' => 'div',
                    'class' => 'form-actions'
                )
            )
        ));
        foreach ($dbForm->getElements() as $element) {
            $element->removeDecorator('HtmlTag');
            if ($element->getDecorator('label')) {
                $element->removeDecorator('Label');
                $element->addDecorator('Label');
            }
        }
        foreach ($dbForm->getDisplayGroups() as $group) {
            foreach ($group->getElements() as $element) {
                $element->removeDecorator('HtmlTag');
                $element->removeDecorator('Label');
                $element->removeDecorator('Tooltip');
                $element->removeDecorator('DtDdWrapper');
            }
        }
        $dbForm->removeDecorator('HtmlTag');
        
        return $dbForm;
    }
}
