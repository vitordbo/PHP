<?php
    // PHP Date and Time => https://www.php.net/manual/en/datetime.format.php
    // The PHP date() function is used to format a date and/or a time.
    // The PHP date() function formats a timestamp to a more readable date and time.
    
    // date(format,timestamp)
    // format => Required => Specifies the format of the timestamp
    // timestamp =>	Optional => Specifies a timestamp. Default is the current date and time


    // Get a Date
    // The required format parameter of the date() function specifies how to format the date (or time).

    // Here are some characters that are commonly used for dates:

    // d - Represents the day of the month (01 to 31)
    // m - Represents a month (01 to 12)
    // Y - Represents a year (in four digits)
    // l (lowercase 'L') - Represents the day of the week
    // Other characters, like"/", ".", or "-" can also be inserted between the characters to add additional formatting.

    echo "Today is " . date("d/m/Y") . "<br>";
    echo "Today is " . date("d.m.Y") . "<br>";
    echo "Today is " . date("d-m-Y") . "<br>";
    echo "Today is the " . date("W") . "  week of the year <br>";
    echo "We are in " . date("F") . " <br>"; // month
    echo "Today is " . date("l") . "<br>"; // day of the week


    echo "<br>----- time -----<br>";
    // get a  time => will return the current date/time of the server
    // Here are some characters that are commonly used for times:

    // H - 24-hour format of an hour (00 to 23)
    // h - 12-hour format of an hour with leading zeros (01 to 12)
    // i - Minutes with leading zeros (00 to 59)
    // s - Seconds with leading zeros (00 to 59)
    // a - Lowercase Ante meridiem and Post meridiem (am or pm)
    
    echo date("H:i:sa") . "<br>";
    echo date('H') . "<br>";

    // Get Your Time Zone
    // If the time you got back from the code is not correct, it's probably because your server is in another country or set up for a different timezone

    echo "<br>----- Sao Paulo time -----<br>";
    date_default_timezone_set("America/Sao_Paulo");
    echo "The time is " . date("h:i:sa") . "<br>";

    echo "<br>---Create a Date With mktime()---<br>";
    // The optional timestamp parameter in the date() function specifies a timestamp. If omitted, the current date and time will be used (as in the examples above).

    // The PHP mktime() function returns the Unix timestamp for a date. The Unix timestamp contains the number of seconds between the Unix Epoch (January 1 1970 00:00:00 GMT) and the time specified.

    // Syntax
    // mktime(hour, minute, second, month, day, year)
    
    $d=mktime(12, 54, 14, 7, 21, 2022);
    echo "Created date is " . date("Y-m-d h:i:sa", $d) . "<br>";

    echo "<br>----- difference between dates -----<br>";
    $today = date('Y-m-d');
    $RandomDate = '2022-11-27';

    $difference = strtotime($RandomDate) - strtotime($today);
    $days = floor($difference / (60 * 60  * 24)); // convert to format 

    echo "Today: " . $today . "<br>";
    echo "Random date " . $RandomDate . "<br>";
    echo "The difference is " . $days . "  days" . "<br>";


    echo "<br>----- compare two dates -----<br>";
    $date1 = '2022-11-10';
    $date2 = '2022-11-27';
    
    echo "date 1: " . $date1 . "<br>";
    echo "date 2  " . $date2 . "<br>";

    // strtotime => string to time
    if (strtotime($date1) > strtotime($date2)){
        echo "the first one is more old than the second";
    } elseif (strtotime($date1) == strtotime($date2)){
        echo "the dates are equal";
    } else {
        echo "the first one is more recent than the second";
    }


?>