<?php
include_once "Console_Table.php";

$table = new Console_Table();
$table->lineNumbers(true);
$table->setLineNumbersWidth(8);
$table->addColumn(15);
$table->addColumn(15);
$table->addColumn(15);

$table->addHeader(array("Column1", "Column2", "Column3"));

$table->addRow(array( //Row2
        array("value" => "black", "align" => "r", "color" => "black"),
        array("value" => "black", "align" => "r", "color" => "black"),
        array("value" => "black", "align" => "r", "color" => "black"),
    )
);
$table->addRow(array( //Row2
        array("value" => "dark_gray", "align" => "r", "color" => "dark_gray"),
        array("value" => "dark_gray", "align" => "r", "color" => "dark_gray"),
        array("value" => "dark_gray", "align" => "r", "color" => "dark_gray"),
    )
);
$table->addRow(array( //Row2
        array("value" => "blue", "align" => "r", "color" => "blue"),
        array("value" => "blue", "align" => "r", "color" => "blue"),
        array("value" => "blue", "align" => "r", "color" => "blue"),
    )
);
$table->addRow(array( //Row2
        array("value" => "light_blue", "align" => "r", "color" => "light_blue"),
        array("value" => "light_blue", "align" => "r", "color" => "light_blue"),
        array("value" => "light_blue", "align" => "r", "color" => "light_blue"),
    )
);
$table->addRow(array( //Row2
        array("value" => "green", "align" => "r", "color" => "green"),
        array("value" => "green", "align" => "r", "color" => "green"),
        array("value" => "green", "align" => "r", "color" => "green"),
    )
);
$table->addRow(array( //Row2
        array("value" => "light_green", "align" => "r", "color" => "light_green"),
        array("value" => "light_green", "align" => "r", "color" => "light_green"),
        array("value" => "light_green", "align" => "r", "color" => "light_green"),
    )
);
$table->addRow(array( //Row2
        array("value" => "cyan", "align" => "r", "color" => "cyan"),
        array("value" => "cyan", "align" => "r", "color" => "cyan"),
        array("value" => "cyan", "align" => "r", "color" => "cyan"),
    )
);
$table->addRow(array( //Row2
        array("value" => "light_cyan", "align" => "r", "color" => "light_cyan"),
        array("value" => "light_cyan", "align" => "r", "color" => "light_cyan"),
        array("value" => "light_cyan", "align" => "r", "color" => "light_cyan"),
    )
);
$table->addRow(array( //Row2
        array("value" => "red", "align" => "r", "color" => "red"),
        array("value" => "red", "align" => "r", "color" => "red"),
        array("value" => "red", "align" => "r", "color" => "red"),
    )
);
$table->addRow(array( //Row2
        array("value" => "light_red", "align" => "r", "color" => "light_red"),
        array("value" => "light_red", "align" => "r", "color" => "light_red"),
        array("value" => "light_red", "align" => "r", "color" => "light_red"),
    )
);
$table->addRow(array( //Row2
        array("value" => "purple", "align" => "r", "color" => "purple"),
        array("value" => "purple", "align" => "r", "color" => "purple"),
        array("value" => "purple", "align" => "r", "color" => "purple"),
    )
);
$table->addRow(array( //Row2
        array("value" => "light_purple", "align" => "r", "color" => "light_purple"),
        array("value" => "light_purple", "align" => "r", "color" => "light_purple"),
        array("value" => "light_purple", "align" => "r", "color" => "light_purple"),
    )
);
$table->addRow(array( //Row2
        array("value" => "brown", "align" => "r", "color" => "brown"),
        array("value" => "brown", "align" => "r", "color" => "brown"),
        array("value" => "brown", "align" => "r", "color" => "brown"),
    )
);
$table->addRow(array( //Row2
        array("value" => "yellow", "align" => "r", "color" => "yellow"),
        array("value" => "yellow", "align" => "r", "color" => "yellow"),
        array("value" => "yellow", "align" => "r", "color" => "yellow"),
    )
);
$table->addRow(array( //Row2
        array("value" => "light_gray", "align" => "r", "color" => "light_gray"),
        array("value" => "light_gray", "align" => "r", "color" => "light_gray"),
        array("value" => "light_gray", "align" => "r", "color" => "light_gray"),
    )
);
$table->addRow(array( //Row2
        array("value" => "white", "align" => "r", "color" => "white"),
        array("value" => "white", "align" => "r", "color" => "white"),
        array("value" => "white", "align" => "r", "color" => "white"),
    )
);
$table->addRow(array( //Row2
        array("value" => "black", "align" => "r", "background" => "black"),
        array("value" => "black", "align" => "r", "background" => "black"),
        array("value" => "black", "align" => "r", "background" => "black"),
    )
);
$table->addRow(array( //Row2
        array("value" => "red", "align" => "r", "background" => "red"),
        array("value" => "red", "align" => "r", "background" => "red"),
        array("value" => "red", "align" => "r", "background" => "red"),
    )
);
$table->addRow(array( //Row2
        array("value" => "green", "align" => "r", "background" => "green"),
        array("value" => "green", "align" => "r", "background" => "green"),
        array("value" => "green", "align" => "r", "background" => "green"),
    )
);
$table->addRow(array( //Row2
        array("value" => "yellow", "align" => "r", "background" => "yellow"),
        array("value" => "yellow", "align" => "r", "background" => "yellow"),
        array("value" => "yellow", "align" => "r", "background" => "yellow"),
    )
);
$table->addRow(array( //Row2
        array("value" => "blue", "align" => "r", "background" => "blue"),
        array("value" => "blue", "align" => "r", "background" => "blue"),
        array("value" => "blue", "align" => "r", "background" => "blue"),
    )
);
$table->addRow(array( //Row2
        array("value" => "magenta", "align" => "r", "background" => "magenta"),
        array("value" => "magenta", "align" => "r", "background" => "magenta"),
        array("value" => "magenta", "align" => "r", "background" => "magenta"),
    )
);
$table->addRow(array( //Row2
        array("value" => "cyan", "align" => "r", "background" => "cyan"),
        array("value" => "cyan", "align" => "r", "background" => "cyan"),
        array("value" => "cyan", "align" => "r", "background" => "cyan"),
    )
);
$table->addRow(array( //Row2
        array("value" => "light_gray", "align" => "r", "background" => "light_gray"),
        array("value" => "light_gray", "align" => "r", "background" => "light_gray"),
        array("value" => "light_gray", "align" => "r", "background" => "light_gray"),
    )
);
$table->addRow(
    array( //Row1
        array("value" => "cyan", "align" => "r", "background" => "cyan"),
        "value2",
        array("value" => "value3", "align" => "r"),
    )
);

$table->addFooter(array("footer1", "", "footer3"));

echo $table->getTable();
