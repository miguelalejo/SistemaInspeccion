<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfWidgetFormI18nDate represents a date widget.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormI18nDate.class.php 9046 2008-05-19 08:13:51Z FabianLange $
 */
class sfWidgetFormI18nDateDefault extends sfWidgetFormDate
{

  /**
   * Constructor.
   *
   * Available options:
   *
   *  * culture:      The culture to use for internationalized strings (required)
   *  * month_format: The month format (name - default, short_name, number)
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetFormDate
   */
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);

    $this->addRequiredOption('culture');
    $this->addOption('month_format');
    $culture = isset($options['culture']) ? $options['culture'] : 'en';
    $monthFormat = isset($options['month_format']) ? $options['month_format'] : 'name';

    // format
    $this->setOption('format', $this->getDateFormat($culture));

    // months
    $this->setOption('months', $this->getMonthFormat($culture, $monthFormat));
	
  }

  protected function getMonthFormat($culture, $monthFormat)
  {
    switch ($monthFormat)
    {
      case 'name':
        return array_combine(range(1, 12), sfDateTimeFormatInfo::getInstance($culture)->getMonthNames());
      case 'short_name':
        return array_combine(range(1, 12), sfDateTimeFormatInfo::getInstance($culture)->getAbbreviatedMonthNames());
      case 'number':
        return $this->getOption('months');
      default:
        throw new InvalidArgumentException(sprintf('The month format "%s" is invalid.', $monthFormat));
    }
  }

  protected function getDateFormat($culture)
  {
    $dateFormat = sfDateTimeFormatInfo::getInstance($culture)->getShortDatePattern();

    if (false === ($dayPos = stripos($dateFormat, 'd')) || false === ($monthPos = stripos($dateFormat, 'm')) || false === ($yearPos = stripos($dateFormat, 'y')))
    {
      return $this->getOption('format');
    }

    return strtr($dateFormat, array(
      substr($dateFormat, $dayPos,   strripos($dateFormat, 'd') - $dayPos + 1)   => '%day%',
      substr($dateFormat, $monthPos, strripos($dateFormat, 'm') - $monthPos + 1) => '%month%',
      substr($dateFormat, $yearPos,  strripos($dateFormat, 'y') - $yearPos + 1)  => '%year%',
    ));
  }
  /**
   * @param  string $name        The element name
   * @param  string $value       The date displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
  
    $default = array('year' => date('Y'), 'month' => date('n'), 'day' => date('j'));
    if (is_array($value))
    {
      $value = array_merge($default, $value);
    }
    else
    {
      $value = (string) $value == (string) (integer) $value ? (integer) $value : strtotime($value);
      if (false === $value)
      {
        $value = $default;
      }
      else
      {
        $value = array('year' => date('Y', $value), 'month' => date('n', $value), 'day' => date('j', $value));
      }
    }

    $date = array();
    $emptyValues = $this->getOption('empty_values');

    // days
    $widget = new sfWidgetFormSelect(array('choices' => $this->getOption('can_be_empty') ? array('' => $emptyValues['day']) + $this->getOption('days') : $this->getOption('days')), array_merge($this->attributes, $attributes));
    $date['%day%'] = $widget->render($name.'[day]', $value['day']);

    // months
    $widget = new sfWidgetFormSelect(array('choices' => $this->getOption('can_be_empty') ? array('' => $emptyValues['month']) + $this->getOption('months') : $this->getOption('months')), array_merge($this->attributes, $attributes));
    $date['%month%'] = $widget->render($name.'[month]', $value['month']);

    // years
    $widget = new sfWidgetFormSelect(array('choices' => $this->getOption('can_be_empty') ? array('' => $emptyValues['year']) + $this->getOption('years') : $this->getOption('years')), array_merge($this->attributes, $attributes));
    $date['%year%'] = $widget->render($name.'[year]', $value['year']);

    return strtr($this->getOption('format'), $date);
  }
}
