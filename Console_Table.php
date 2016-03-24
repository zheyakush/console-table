<?php

/**
 * Class Console_Table
 *
 * @category     Own
 * @package      Console_Table
 * @copyright    Copyright (c) 2015 (eyakushdev@gmail.com)
 * @author       Eugene Yakush (eyakushdev@gmail.com)
 * @license      http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Console_Table
{
    /**
     * array(
     *      array("mask" => XX, "size" => XX),
     *      ...
     * )
     *
     * @var array
     */
    protected $_columns = array();

    /**
     * array("titleCol1",..,"titleColN")
     *
     * @var array
     */
    protected $_header = array();

    /**
     * array("titleCol1",..,"titleColN")
     *
     * @var array
     */
    protected $_footer = array();

    /**
     * array(
     *      array( //Row1
     *          array("value" => XX, "align" => XX, "color" => XX), Coll1
     *          array("value" => XX, "align" => XX, "color" => XX), Coll2
     *      ),
     *      ...
     * )
     * @var array
     */
    protected $_data = array();

    /**
     * @var array
     */
    protected $_foregroundColors = array(
        'black' => '0;30',
        'dark_gray' => '1;30',
        'blue' => '0;34',
        'light_blue' => '1;34',
        'green' => '0;32',
        'light_green' => '1;32',
        'cyan' => '0;36',
        'light_cyan' => '1;36',
        'red' => '0;31',
        'light_red' => '1;31',
        'purple' => '0;35',
        'light_purple' => '1;35',
        'brown' => '0;33',
        'yellow' => '1;33',
        'light_gray' => '0;37',
        'white' => '1;37'
    );

    /**
     * @var array
     */
    protected $_backgroundColors = array(
        'black' => '40',
        'red' => '41',
        'green' => '42',
        'yellow' => '43',
        'blue' => '44',
        'magenta' => '45',
        'cyan' => '46',
        'light_gray' => '47'
    );

    /**
     * @var bool
     */
    protected $_lineNumbers = false;

    /**
     * @var int
     */
    protected $_lineNumbersWidth = 5;

    /**
     * @param int $size
     * @return $this
     */
    public function addColumn($size = 20)
    {
        array_push($this->_columns, array(
            "mask" => "%-{$size}.{$size}s",
            "size" => $size
        ));

        return $this;
    }

    /**
     * @param $data
     * @return $this
     */
    public function addHeader($data)
    {
        foreach ($data as $index => $title) {
            if ($index < count($this->_columns)) {
                array_push($this->_header, $this->padColumnValue($title, $this->_columns[$index]["size"], 'c'));
            }
        }

        return $this;
    }

    /**
     * @param $data
     * @return $this
     */
    public function addFooter($data)
    {
        foreach ($data as $index => $title) {
            if ($index < count($this->_columns)) {
                array_push($this->_footer, $this->padColumnValue($title, $this->_columns[$index]["size"], 'r'));
            }
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getRowMask()
    {
        $masks = array();
        foreach ($this->_columns as $colData) {
            array_push($masks, $colData["mask"]);
        }

        return "|" . join("|", $masks) . "|";
    }

    /**
     * @return string
     */
    public function getWrapperMask()
    {
        $masks = array();
        foreach ($this->_columns as $colData) {
            array_push($masks, $colData["mask"]);
        }

        return "+" . join("+", $masks) . "+";
    }

    /**
     * @param $row
     * @return string
     */
    public function wrapRow($row)
    {
        $mask = $this->getWrapperMask();
        $wrapContent = array();
        foreach ($this->_columns as $colData) {
            array_push($wrapContent, str_repeat("-", $colData["size"]));
        }
        $result = vsprintf($mask, $wrapContent) . "\n";
        if (!is_null($row)) {
            $result .= $row . "\n";
            $result .= vsprintf($mask, $wrapContent);
        }

        return $result;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        // HEADER
        if (count($this->_header)) {
            if ($this->_lineNumbers) {
                array_unshift($this->_columns, array(
                    "mask" => "%-{$this->_lineNumbersWidth}.{$this->_lineNumbersWidth}s",
                    "size" => $this->_lineNumbersWidth
                ));
                array_unshift($this->_header, "#");
            }
            $mask = $this->getRowMask();
            $table[] = $this->wrapRow(vsprintf($mask, $this->_header));
        }

        // DATA
        if (count($this->_data)) {
            foreach ($this->_data as $index => $row) {
                if ($this->_lineNumbers) {
                    array_unshift($row, $this->padColumnValue($index + 1, $this->_lineNumbersWidth, 'r'));
                }
                $maskData = '|';
                foreach ($row as $index => $ceilData) {
                    if (preg_match("/\\[.+\\[.+\\[0m/", $ceilData)) {
                        $maskData .= '%-' . ($this->_columns[$index]['size'] + 16) .
                            '.' . ($this->_columns[$index]['size'] + 16) . 's|';
                    } else if (preg_match("/\\[[0-1]+.+\\[0m/", $ceilData)) {
                        $maskData .= '%-' . ($this->_columns[$index]['size'] + 11) .
                            '.' . ($this->_columns[$index]['size'] + 11) . 's|';
                    } else if (preg_match("/\\[[4]+.+\\[0m/", $ceilData)) {
                        $maskData .= '%-' . ($this->_columns[$index]['size'] + 9) .
                            '.' . ($this->_columns[$index]['size'] + 9) . 's|';
                    } else {
                        $maskData .= '%-' . $this->_columns[$index]['size'] . '.' .
                            $this->_columns[$index]['size'] . 's|';
                    }
                }

                $table[] = vsprintf($maskData, $row);
            }
        }
        $mask = $this->getRowMask();
        // FOOTER
        if (!count($this->_footer)) {
            $table[] = $this->wrapRow(null);
        } else {
            if ($this->_lineNumbers) {
                array_unshift($this->_footer, " ");
            }
            $table[] = $this->wrapRow(vsprintf($mask, $this->_footer));
        }

        return join(PHP_EOL, $table) . PHP_EOL;
    }

    /**
     * @param $data
     */
    public function addRow($data)
    {
        $row = array();
        foreach ($data as $index => $rowData) {
            if (is_array($rowData)) {
                $rowValue = $rowData['value'];
                if (isset($rowData['color']) || isset($rowData['background'])) {
                    $color = isset($rowData['color']) ? $rowData['color'] : null;
                    $background = isset($rowData['background']) ? $rowData['background'] : null;
                    $rowData = $this->padColumnValue(
                        $rowData['value'],
                        $this->_columns[$index]['size'],
                        $rowData['align']
                    );
                    $rowValue = $this->colorizeRow($rowData, $color, $background);
                }
            } else {
                $rowValue = $rowData;
            }
            array_push($row, $rowValue);
        }

        array_push($this->_data, $row);
    }

    /**
     * @param $title
     * @param $size
     * @param $align
     * @return string
     */
    public function padColumnValue($title, $size, $align)
    {
        switch ($align) {
            case "l":
                $type = STR_PAD_RIGHT;
                break;
            case "c":
            case "m":
                $type = STR_PAD_BOTH;
                break;
            default:
                $type = STR_PAD_LEFT;
        }
        $result = str_pad($title, $size, " ", $type);

        return $result;
    }

    /**
     * @param $string
     * @param string|null $foregroundColor
     * @param string|null $backgroundColor
     * @return string
     */
    public function colorizeRow($string, $foregroundColor = null, $backgroundColor = null)
    {
        $coloredString = "";

        // Check if given foreground color found
        if (isset($this->_foregroundColors[$foregroundColor])) {
            $coloredString .= "\033[" . $this->_foregroundColors[$foregroundColor] . "m";
        }
        // Check if given background color found
        if (isset($this->_backgroundColors[$backgroundColor])) {
            $coloredString .= "\033[" . $this->_backgroundColors[$backgroundColor] . "m";
        }

        // Add string and end coloring
        $coloredString .= $string . "\033[0m";

        return $coloredString;
    }

    /**
     * Returns all foreground color names
     *
     * @return array
     */
    public function getForegroundColors()
    {
        return array_keys($this->_foregroundColors);
    }

    /**
     * Returns all background color names
     *
     * @return array
     */
    public function getBackgroundColors()
    {
        return array_keys($this->_backgroundColors);
    }

    /**
     * @param bool $status
     * @return $this
     */
    public function lineNumbers($status = false)
    {
        $this->_lineNumbers = $status;

        return $this;
    }

    /**
     * @param int $width
     * @return $this
     */
    public function setLineNumbersWidth($width = 5)
    {
        $this->_lineNumbersWidth = (int)$width;

        return $this;
    }
}
