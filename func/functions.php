<?
function what_is_url() {

    // vars

    $http_host = $_SERVER['HTTP_HOST'];

    if ($http_host != "localhost") {

        //explode

        $boom = explode(".", $http_host);

        if ($boom == "www") {
            $url = $boom[1] . "." . $boom[2];
        } else {
            $url = $boom[0] . "." . $boom[1];
        }

    } else {

        $url = "localhost";

    }

    return $url;

}

function errors_set() {

    if (what_is_url() == "localhost") {

        return error_reporting(E_ALL);

    } else {

        return error_reporting(0);

    }

}

function get_trust() {

    if ($_SERVER['HTTP_EVE_TRUSTED'] == "No") {

        echo "<script type='text/javascript'>CCPEVE.requestTrust('http://" . $_SERVER['HTTP_HOST'] . "/')</script>";

    }

}

function set_header_info_aray() {

    global $headerinfo;

    if (strpos($_SERVER['HTTP_USER_AGENT'], 'EVE-IGB')) {

        $headerinfo['TRUSTED'] = $_SERVER['HTTP_EVE_TRUSTED'];

        $headerinfo['SERVERIP'] = $_SERVER['HTTP_EVE_SERVERIP'];

        $headerinfo['CHARNAME'] = $_SERVER['HTTP_EVE_CHARNAME'];

        $headerinfo['CHARID'] = $_SERVER['HTTP_EVE_CHARID'];

        $headerinfo['CORPNAME'] = $_SERVER['HTTP_EVE_CORPNAME'];

        $headerinfo['CORPID'] = $_SERVER['HTTP_EVE_CORPID'];

        $headerinfo['ALLIANCENAME'] = $_SERVER['HTTP_EVE_ALLIANCENAME'];

        $headerinfo['ALLIANCEID'] = $_SERVER['HTTP_EVE_ALLIANCEID'];

        $headerinfo['REGIONNAME'] = $_SERVER['HTTP_EVE_REGIONNAME'];

        $headerinfo['CONSTELLATIONNAME'] = $_SERVER['HTTP_EVE_CONSTELLATIONNAME'];

        $headerinfo['SOLARSYSTEMNAME'] = $_SERVER['HTTP_EVE_SOLARSYSTEMNAME'];

        $headerinfo['SOLARSYSTEMID'] = $_SERVER['HTTP_EVE_SOLARSYSTEMID'];

        $headerinfo['STATIONNAME'] = $_SERVER['HTTP_EVE_STATIONNAME'];

        $headerinfo['STATIONID'] = $_SERVER['HTTP_EVE_STATIONID'];

        $headerinfo['CORPROLE'] = $_SERVER['HTTP_EVE_CORPROLE'];

        $headerinfo['WARFACTIONID'] = $_SERVER['HTTP_EVE_WARFACTIONID'];

        $headerinfo['SHIPID'] = $_SERVER['HTTP_EVE_SHIPID'];

        $headerinfo['SHIPNAME'] = $_SERVER['HTTP_EVE_SHIPNAME'];

        $headerinfo['SHIPTYPEID'] = $_SERVER['HTTP_EVE_SHIPTYPEID'];

        $headerinfo['SHIPTYPENAME'] = $_SERVER['HTTP_EVE_SHIPTYPENAME'];

        $headerinfo['BROWSER'] = "igb";

    } else if ($_COOKIE['userid'] != "") {

        $link = db_conect();

        mysql_select_db("operationscalcu", $link) or die(mysql_error());

        $userid = $_COOKIE['userid'];

        $query = "SELECT * FROM users WHERE user_id='$userid' ";

        $result = mysql_query($query, $link);

        $row = mysql_fetch_array($result);

        $headerinfo['TRUSTED'] = "Yes";

        $headerinfo['CHARID'] = $row['user_id'];

        $headerinfo['CHARNAME'] = $row['name'];

        $headerinfo['CORPID'] = $row['corporation_id'];

        $headerinfo['ALLIANCEID'] = $row['alliance_id'];

        $headerinfo['BROWSER'] = "ogb";

        if (!$result) {

            $message = 'Invalid query: ' . mysql_error() . "\n";

            $message .= 'Whole query: ' . $query;

            die($message);

        }

    }

}

function get_eve_image($type, $id, $size) {

    // check for id

    if ($id != "") {

        //check for size

        if ($size != "") {

            //check for type

            if ($type != "") {

                //check type for aliance

                if ($type == "alliance") {

                    return "http://image.eveonline.com/Alliance/" . $id . "_" . $size . ".png";

                }

                //check type for Corporation

                if ($type == "corporation") {

                    return "http://image.eveonline.com/Corporation/" . $id . "_" . $size . ".png";

                }

                //check type for Character

                if ($type == "character") {

                    return "http://image.eveonline.com/Character/" . $id . "_" . $size . ".jpg";

                }

                //check type for inventory

                if ($type == "inventory") {

                    return "http://image.eveonline.com/Type/" . $id . "_" . $size . ".png";

                }

                //check type for render

                if ($type == "render") {

                    return "http://image.eveonline.com/Render/" . $id . "_" . $size . ".png";

                } else {
                    return "unrecgonised type";
                }

            } else {

                return "no type supplied";

            }

        } else {

            return "no size supplied";

        }

    } else {
        return "no id supplied";
    }

}

//funtion that gerates a random string of numbers and letters of a variable size difined by an input interger
function randgen($length) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;

}

//Function to create a blowfish hash from a string and a salt
function blowfish($salt, $string) {

    if (CRYPT_BLOWFISH == 1) {
        $encripted = crypt($string, '$2a$07$' . $salt . '$');
        $hash = explode('.', $encripted, 2);
        return $hash[1];
    }

}
?>