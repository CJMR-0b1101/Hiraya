<?php
    /** DOCUMENTATION
     * Rules:
     * 1. Username - length is 8 to 30 characters
     *             - first character is ALPHABET
     *             - no special characters aside from UNDERSCORE
     *             - can contain NUMBERS
     *             - NO WHITE SPACES
     * 2. First name - ALPHABET ONLY (whiespaces are valid)
     * 3. Last name - ALPHABET ONLY (whitespaces are valid)
     * 4. Password - length is 8 or more characters
     *             - atleast 1 uppercase, 1 lowercase, 1 number, 1 special character
     *             - "<" or ">" symbol is NOT ALLOWED
     * 
     * Functions used:
     * 1. ord() - to ASCII
     * 2. chr() - to character
     * 
     * ASCII Codes:
     * 1. Uppercase letters: 65 - 90
     * 2. Lowercase letters: 97 - 122
     * 3. Numbers: 48 - 57
     * 4. Whitespace: 32
     * 5. Underscore: 95
     * 6. Special characters: 33 to 47
     *                      : 58 to 59
     *                      : 61 or 63
     *                      : 91 to 96
     *                      : 123 to 126
    */

    function isValidUsername($uname) {
        $unameLength = strlen($uname);

        // echo $uname."<br>";

        if($unameLength < 8 || $unameLength > 30) {
            echo "Username should contain 8 to 30 characters";
            return False;
        }

        for($i = 0; $i < $unameLength; $i++) {
            $currChar = ord($uname[$i]);

            // echo $uname[$i]."<br>".$currChar."<br>";
            if($i == 0) {
                if(($currChar >= 65 && $currChar <= 90) || ($currChar >= 97 && $currChar <= 122)) {
                    continue;
                }
                else {
                    echo "First character should be ALPHABET<br>";
                    return False;
                }
            }
            else {
                if($currChar == 32) {
                    echo "Username cannot contain WHITESPACES<br>";
                    return False;
                }
                elseif(($currChar >= 33 && $currChar <= 47) || ($currChar >= 58 && $currChar <= 64) || 
                ($currChar >= 91 && $currChar <= 94) || ($currChar >= 123 && $currChar <= 126) ||
                ($currChar >= 65 && $currChar == 96)) {
                    echo "Username cannot contain SPECIAL CHARACTERS<br>";
                    return False;
                }
                elseif(($currChar >= 65 && $currChar <= 90) || ($currChar >= 97 && $currChar <= 122) || ($currChar <= 95)) {
                    continue;
                }
            }
        }
        return True;
    }
    function isValidName($name) {
        $nameLength = strlen($name);

        // echo $name."<br>";

        for($i = 0; $i < $nameLength; $i++) {
            $currChar = ord($name[$i]);

            // echo $name[$i]."<br>".$currChar."<br>";
            if(($currChar >= 65 && $currChar <= 90) || ($currChar >= 97 && $currChar <= 122) || $currChar == 32) {
                continue;
            }
            else {
                echo "Name should only contain ALPHABET characters<br>";
                return False;
            }
        }
        return True;
    }
    function isValidPassword($psw) {
        $pwLength = strlen($psw);
        $uppercaseCount = 0;
        $lowercaseCount = 0;
        $numberCount = 0;
        $specialCharCount = 0;

        // echo $psw."<br>";

        if($pwLength < 8) {
            echo "Password should contain 8 or more characters<br>";
            return False;
        }
        else {
            for($i = 0; $i < $pwLength; $i++) {
                $currChar = ord($psw[$i]);

                // echo $psw[$i]."<br>".$currChar."<br>";
                if($currChar == 60 || $currChar == 62) {
                    echo 'Password cannot contain "<" or ">" symbol<br>';
                    return False;
                }
                elseif($currChar == 32) {
                    echo "Password cannot contain WHITESPACES<br>";
                    return False;
                }
                elseif($currChar >= 65 && $currChar <= 90) {
                    $uppercaseCount++;
                }
                elseif($currChar >= 97 && $currChar <= 122) {
                    $lowercaseCount++;
                }
                elseif($currChar >= 48 && $currChar <= 57) {
                    $numberCount++;
                }
                elseif(($currChar >= 33 && $currChar <= 47) || ($currChar >= 58 && $currChar <= 59) || 
                ($currChar == 61 || ($currChar >= 63 || ($currChar <= 64))) || ($currChar >= 91 && $currChar <= 96) ||
                ($currChar >= 123 && $currChar == 126)) {
                    $specialCharCount++;
                }
            }
            
            // echo "$uppercaseCount<br>$lowercaseCount<br>$numberCount<br>$specialCharCount<br>";

            if($uppercaseCount < 1) {
                echo "Password should contain atleast 1 uppercase character<br>";
                return False;
            }
            elseif($lowercaseCount < 1) {
                echo "Password should contain atleast 1 lowercase character<br>";
                return False;
            }
            elseif($numberCount < 1) {
                echo "Password should contain atleast 1 number<br>";
                return False;
            }
            elseif($specialCharCount < 1) {
                echo "Password should contain atleast 1 special character<br>";
                return False;
            }
            else
                return True;
        }
        return True;
    }
    function isValidAge($age) {
        return is_numeric($age);
    }
    // Sample data:
    // $un = "Samantha123";
    // $fn = "Samantha";
    // $ln = "Athnamas";
    // $pw = "P@ssword1";
?>